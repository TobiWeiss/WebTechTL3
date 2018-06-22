$(document).ready(function () {

    console.log(all_data);
    
    // draw coordinate system
    var svg = d3.select('#chart');

    var margin = { top: 15, left: 40, bottom: 40, right: 15 };

    var width = 500;
    var height = 500;



    var maxY = d3.max(all_data, function(d) {return  +(d.Distanz)/(d.Dauer/60)+1;} );
    var maxX = d3.max(all_data, function(d) {return  +d.Distanz;} );

    var xAxisScale = d3.scaleLinear().domain([0, maxX]).range([0, width - margin.left - margin.right]);
    var yAxisScale = d3.scaleLinear().domain([0, maxY]).range([height - margin.top - margin.bottom, 0]);

    var opacity = d3.scaleLinear().domain([0, all_data.length -1]).range([0.2, 1]);


    var xAxis = d3.axisBottom().scale(xAxisScale);
    var yAxis = d3.axisLeft().scale(yAxisScale);


    svg.append("g")
        .attr("transform", "translate(" + [margin.left, height - margin.bottom] + ")")
        .call(xAxis);

    svg.append("g")
        .attr("transform", "translate(" + [margin.left, margin.top] + ")")
        .call(yAxis);
    var g = svg.append("svg:g");
    g.selectAll("scatter-dots")
        .data(all_data)
        .enter().append("svg:circle")
        .attr("cx", function (d) { return xAxisScale(d.Distanz+0.5); })
        .attr("cy", function (d) { return yAxisScale((d.Distanz)/(d.Dauer/60)); })
        .attr("r", 15)
        .style("fill", "blue")
        .style("fill-opacity", function(d, i) {return opacity(i);})


    // text labels for axes
    svg.append("text")
        .attr("transform",
        "translate(" + (width / 2) + " ," +
        (height - margin.top + 10) + ")")
        .style("text-anchor", "middle")
        .text("Distanz in Km");

    svg.append("text")
        .attr("transform",
        "translate(" + 15 + " ," +
        (height / 2) + "), rotate(-90)")
        .style("text-anchor", "middle")
        .text("Geschwindigkeit in Km/h");

});
