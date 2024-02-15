@extends('layouts.app')

@section('title', "Donations")

@section('content')
    <div class="custom-datatable">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __('Donations') }}
                        <a class="btn btn-rounded btn-sm px-2" style="margin-left:1em;border-color: white;"  href="{{ url('/payments/user/add') }}">
                            <i class="fa fa-plus"></i>
                        </a>

                        <div class="col-md-3 float-right">
                            <input class="form-control dt-search" type="text" placeholder="Search..." aria-label="Search">
                        </div>
                    </div>

                    <div class="card-body">
                         <div class="col-md-12 mt-4">
                            <table id="paymentList" class="table table-bordered table-striped table-layout-fixed"></table>
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

            createDataTable( baseUrl+"/payments", "#paymentList", function (data) {

                columns = data.columns;
                
                $.each(columns, function(index,value) {
                    var columnName  = value.data;
                    
                    if(columnName == "payment_id"){
                        data.columns[index].render = function(data, type, row){
                            var cellData = '<a class=\"text-theme\" href=\"'+ baseUrl +'/payments/user/edit/'+row.account_id+'\"><i class=\"fa fa-pencil\"></i></a>';
                            return cellData;
                        };
                        data.columns[index].class = "text-center";
                        data.columns[index].orderable = false;
                    }

                });

                return data;

            }, {},[],[], [],[], disbleWidgets  );
        })
    </script>

@endsection