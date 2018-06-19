$(document).ready(function () {

    console.log(all_data);
    var run = {
        Datum: "",
        Dauer: "",
        Distanz: "",
        ID: ""
    };

    run = all_data[0];
    console.log(run);
    console.log(run.Distanz);


    // draw coordinate system
    var svg = d3.select('#chart');

    var margin = { top: 15, left: 40, bottom: 40, right: 15 };

    var width = 500;
    var height = 500;

    function maxDistance() {
        var maxDistance = 0;
        for (var i = 0; i < all_data.length; i++) {
            run = all_data[i];
            if (run.Distanz > maxDistance) {
                maxDistance = run.Distanz;
            }
        }
        return maxDistance;
    }

    function maxSpeed() {
        var maxSpeed = 0;
        for (var i = 0; i < all_data.length; i++) {
            run = all_data[i];
            var speed = 60 / run.Dauer * run.Distanz;
            console.log(speed);
            if (speed > maxSpeed) {
                maxSpeed = speed;
            }
        }
        return maxSpeed;
    }

    function setCircle() {
        var speedSet = [];
        var distanceSet = [];
        for (var i = 0; i < all_data.length; i++) {
            run = all_data[i];
            speedSet[i] = 60 / run.Dauer * run.Distanz;
            distanceSet[i] = run.Distanz;
        }
        var dataSet = [];
        for (var i = 0; i < speedSet.length; i++) {
            dataSet[i] = new Array(distanceSet[i], speedSet[i]);
            console.log(dataSet);
        }
        return dataSet;
    }




    var xAxisScale = d3.scaleLinear().domain([0, maxDistance()]).range([0, width - margin.left - margin.right]);
    var yAxisScale = d3.scaleLinear().domain([0, maxSpeed() + 10]).range([height - margin.top - margin.bottom, 0]);

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
        .data(setCircle())
        .enter().append("svg:circle")
        .attr("cx", function (d, i) { return xAxisScale(d[0]); })
        .attr("cy", function (d) { return yAxisScale(d[1]); })
        .attr("r", 4);

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
