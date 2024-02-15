@extends('layouts.app')

@section('title', "Roles")

@section('content')
    <div class="custom-datatable">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __('Roles') }}                    
                        <a class="btn btn-rounded btn-sm px-2" style="margin-left:1em;border-color: white;" href="{{ url('/roles/add')}}">
                            <i class="fa fa-plus"></i>
                        </a>

                        <div class="col-md-3 float-right">
                            <input class="form-control dt-search" type="text" placeholder="Search..." aria-label="Search">
                        </div>

                    </div>

                    <div class="card-body">  
                        <div class="col-md-12 mt-4">
                            <table id="rolesList" class="table table-bordered table-striped table-layout-fixed"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('bottom-scripts')

    <script type="text/javascript">

        $(document).ready(function() {

            disbleWidgets = {'lengthChange':true,'info':true,'searching':true,"dom":"lfr<\"table-responsive\"t>pi"};
  

            createDataTable( baseUrl+"/roles/list", "#rolesList", function (data) {
                columns = data.columns;
                
                $.each(columns, function(index,value) {
                    var columnName  = value.data;

                    if(columnName == "id"){
                        data.columns[index].render = function(data, type, row){
                            var cellData = '<a class=\"text-theme\" href=\"'+ '/role/edit/'+ btoa(data)+'"><i class=\"fa fa-pencil\" title="Edit"></i></a> / ';
                                cellData += '<a class=\"text-theme btn-delete-role\" href=\"'+ '/role/delete/'+ btoa(data)+'"><i class=\"fa fa-trash\" title="Delete"></i></a>';

                            return cellData;
                        };
                        data.columns[index].class = "text-center";
                        data.columns[index].orderable = false;
                    }

                });

                return data;

            }, {},[],[], [],[], disbleWidgets  );
        })

        $(document).on('click', '.btn-delete-role', function(e){
            var conf = confirm('Are you sure you want to delete this Role?');
            if(!conf){
                e.preventDefault();
            }
        });
  
    </script>
@endsection