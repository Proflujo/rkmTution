@extends('layouts.app')

@section('title', "Yearly Report")

@section('styles')
    <style type="text/css">
        table{
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="custom-datatable">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header text-black">{{ __('Yearly Report') }}                    
                       <div class="col-md-3 float-right">
                            <input class="form-control dt-search" type="text" placeholder="Search..." aria-label="Search">
                        </div>
                    </div>

                    <div class="card-body">  
                            
                        <form id="filterForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="year" class="form-label text-md-end">{{ ('Choose Year') }}</label>
                                    <select name="year" id="year" class="form-select @error('year') is-invalid @enderror selectpicker" aria-label="Default select example">
                                    @error('year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </select>
                                </div>
                                <div class="col-md-3 align-center" style="margin: 32px;">
                                    <button id="filter" name="filter" class="btn btn-primary form-button">Filter</button>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-12">
                            <table id="yearReportsList" class="table table-bordered table-striped">
                                <tfoot><tr><th></th><th></th><th class="text-right">Total</th><th id="total"></th></tr></tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('bottom-scripts')
	<script type="text/javascript">
    var year = $('#year').val();
    getYear(year);
    
    $(document).ready(function() {
        var qntYears = 4;   
        var selectYear = $("#year");
        
        var currentYear = new Date().getFullYear();
        year=null?year = currentYear:year = $('#year').val(); 

        for (var y = 0; y < qntYears; y++) {
          let date = new Date(currentYear);
          var yearElem = document.createElement("option");
          yearElem.value = currentYear
          yearElem.textContent = currentYear;
          

          selectYear.append(yearElem);
          currentYear--;
        }

	});

   $(document).on('click', '#filter', function(e){
        e.preventDefault();
        $('#yearReportsList').DataTable().clear().destroy();
        year = $('#year').val();
        getYear(year);
   });

    function getYear(year)
    {   
        $.ajax({
            url: baseUrl+'/reports/year/list',
            type: "GET",
            data: 'year='+year,
            dataType: 'json',
            success:function(data){
                $('#yearReportsList').DataTable({
                    fixedHeader: {
                                    footer: true,
                                },  
                    "footerCallback": function (row, data, start, end, display) {
                        
                        var totalAmount = 0;
                        for (var i = 0; i < data.length; i++) {
                            totalAmount += parseFloat(data[i].payment);
                        }
                        $('#total').html(totalAmount+'.00');
                    },
                    data: data.data,
                    columns: data.columns
                });
                //$('#reportsList').DataTable().column( 3 ).data().sum();
            }
        });
    }

</script>
@endsection