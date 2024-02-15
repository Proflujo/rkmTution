@extends('layouts.app')

@php

@endphp

@section('content')
<style>
    div.tooltip {   
    position: absolute;         
    text-align: center;         
    width: 60px;                    
    height: 28px;                   
    padding: 2px;               
    font: 15px sans-serif;      
    background: lightblue; 
    border: 0px;        
    border-radius: 8px;         
    pointer-events: none;           
}
</style>
    <div class="row justify-content-center">

            <div class="row mt-4">
                <center>
                    <h1>Welcome {{ Auth::user()->username }} </h1>
                </center>
            </div> 

        <!-- <div class="col-md-11">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Yearly Report') }}</div>
                        <div class="card-body">
                            <select name="yearpicker" class="selectpicker" id="yearpicker"></select>
                            <center>
                                <div id="barChart"><div>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header">{{ __('Monthly Report') }}</div>
                        <div class="card-body">                            
                            <input type="month" id="pieChartDate" name="pieChartDate" value="<?php echo date("Y-m"); ?>">
                            <center>
                                <div id="pieChart"><div>
                            </center>
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
        
            for (i = new Date().getFullYear(); i > 1900; i--)
            {
                $('#yearpicker').append($('<option />').val(i).html(i));
            }

            var currentYear = (new Date).getFullYear();
               
            getPaymentsBarchartData(currentYear);

            $('#yearpicker').on('change', function() {

                var year = this.value;
                
                getPaymentsBarchartData(year)
            });

            getPaymentsPiechartData($("#pieChartDate").val());
        });

        $('#pieChartDate').on('input', function() { 
            getPaymentsPiechartData($(this).val());
        });

        function getPaymentsPiechartData(date) {

            var processResult = function(data){
                console.log(data);
                pieChart(data);
            };

            sendAjaxRequest(baseUrl + '/payments/pieChart/report', 'GET', processResult,{ date:date });
        }

        function pieChart(data)
        {
            $("#pieChart svg").remove();

            if (data.length === 0) {

               $("#pieChart").append('<h6 id="noData">No data found</h6>');

            }else{

                $("#noData").remove();

                var svg = d3.select("#pieChart").append('svg'),
                width = svg.attr("width",800),
                height = svg.attr("height",500),
                radius = 190;

                var g = svg.append("g")
                    .attr("transform", "translate(" + 400 + "," + 260 + ")");
                
                var ordScale = d3.scaleOrdinal()
                                    .domain(data)
                                    .range(['skyblue','blue','green','lightgreen','deeppink']);

              
                var pie = d3.pie().value(function(d) { 
                        return d.amount; 
                    });

                var arc = g.selectAll("arc")
                           .data(pie(data))
                           .enter();

                var div = d3.select("body").append("div")   
                        .attr("class", "tooltip")               
                        .style("opacity", 0);

                var path = d3.arc()
                             .outerRadius(radius)
                             .innerRadius(0);

                arc.append("path")
                   .attr("d", path)
                   .attr("fill", function(d) { 
                        return ordScale(d.data.codelist_description);
                    })
                   .on("mouseover", function(d ,n) {
                    const x = d.pageX;
                    const y = d.pageY;

                    div.transition()        
                        .duration(200)      
                        .style("opacity", 100); 

                    div.html(n.data.amount)  
                        .style("left", (x) + "px")     
                        .style("top", (y - 28) + "px");    
                    })

                     .on("mouseout", function(d) {       
                        div.transition()        
                            .duration(500)      
                            .style("opacity", 0);   
                     });

                var label = d3.arc()
                              .outerRadius(radius)
                              .innerRadius(0);
                    
                arc.append("text")
                   .attr("transform", function(d) { 
                            return "translate(" + label.centroid(d) + ")"; 
                    })
                   .text(function(d) { return d.data.codelist_description; })
                   .style("font-family", "arial")
                   .style("font-size", 20);
            }
        }

        function getPaymentsBarchartData(year)
        {
            var processResult = function(data){

                barChart(data);
            };

            sendAjaxRequest(baseUrl + '/payments/report', 'GET', processResult,{ year:year });
        }

        function barChart(data)
        {
            $("#barChart svg").remove();

            if (data.length === 0) {

               $("#barChart").append('<h6 id="noData">No data found</h6>');

            }else{

                $("#noData").remove();

                var margin = {top: 20, right: 20, bottom: 70, left: 40},
                width  = 500 - margin.left - margin.right,
                height = 400 - margin.top - margin.bottom;

                var svg = d3.select("#barChart").append('svg')
                            .attr("width", width + margin.left + margin.right)
                            .attr("height", height + margin.top + margin.bottom)


                var xScale = d3.scaleBand().range([0, width]).padding(0.5),
                    yScale = d3.scaleLinear().range([height, 0]);

                var colorScema = d3.scaleOrdinal()
                                    .domain(data)
                                    .range(['#cc00ff', 'grey', '#33cccc', 'blue', 'yellow', '#66ff33', 'deeppink', 'lightgreen', '#0099cc','skyblue','#cc0066', 'orange']);


                var g = svg.append("g")
                    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");


                // Define the div for the tooltip
                var div = d3.select("body").append("div")   
                    .attr("class", "tooltip")               
                    .style("opacity", 0);
                    
                xScale.domain(data.map(function(d) { return d.monthName; }));
                yScale.domain([0, d3.max(data, function(d) { return d.monthlyAmount; })]);

                g.append("g")
                 .attr("transform", "translate(0," + height + ")")        
                 .call(d3.axisBottom(xScale).tickFormat(function(d){
                   return d;
                  }))
                 .append("text")
                 .attr("y", 30)
                 .attr("x", 220)
                 .attr("text-anchor", "middle") 
                 .attr("stroke", "black") 
                 .attr("font-size", "15px") 
                 .text("Month");

                // g.append("g")
                //  // .call(d3.axisLeft(yScale).tickFormat(function(d){
                //  //    return d;
                //  //  }))         
                //  .append("text")
                //  .attr("transform", "rotate(-90)")
                //  .attr("y", 46)
                //  .attr("x", -150)
                //  .attr("dy", "-5.1em")
                //  .attr("text-anchor", "middle") 
                //  .attr("stroke", "black") 
                //  .attr("font-size", "15px") 
                //  .text("Amount");
             
                var tooltip = d3.select("body")
                    .append("div")
                    .style("position", "absolute")
                    .style("z-index", "10")
                    .style("visibility", "hidden")
                    .style("background", "#000")
                    .text("a simple tooltip");

                g.selectAll(".bar")
                 .data(data)
                 .enter().append("rect")
                 .attr("class", "bar")
                 .attr("fill", function(d){
                        return colorScema(d.monthName);
                    })
                 .attr("x", function(d) {
                    return xScale(d.monthName);
                  })
                 .attr("y", function(d) { return yScale(d.monthlyAmount); })
                 .attr("width", xScale.bandwidth())
                 .attr("height", function(d) { return height - yScale(d.monthlyAmount); })
                 .on("mouseover", function(d ,n) {

                    const x = d.pageX;
                    const y = d.pageY;

                    div.transition()        
                        .duration(200)      
                        .style("opacity", 100); 

                    div.html(n.monthlyAmount)  
                        .style("left", (x) + "px")     
                        .style("top", (y - 68) + "px");    
                    })

                 .on("mouseout", function(d) {       
                    div.transition()        
                        .duration(500)      
                        .style("opacity", 0);   
                });
            }            
        }
    </script>
@endsection
