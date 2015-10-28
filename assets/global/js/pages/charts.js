$(function () {
      /**** Line Charts: ChartJs ****/
      var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
      var lineChartData = {
        labels : ["January","February","March","April","May","June","July"],
        datasets : [
          {
            label: "Inbox",
            fillColor : "rgba(220,220,220,0.2)",
            strokeColor : "rgba(220,220,220,1)",
            pointColor : "rgba(220,220,220,1)",
            pointStrokeColor : "#fff",
            pointHighlightFill : "#fff",
            pointHighlightStroke : "rgba(220,220,220,1)",
            data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
          },
          {
            label: "Outbox",
            fillColor : "rgba(49, 157, 181,0.2)",
            strokeColor : "#319DB5",
            pointColor : "#319DB5",
            pointStrokeColor : "#fff",
            pointHighlightFill : "#fff",
            pointHighlightStroke : "#319DB5",
            data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
          }
        ]
      }
      var ctx = document.getElementById("line-chart").getContext("2d");
      window.myLine = new Chart(ctx).Line(lineChartData, {
        responsive: true,
        tooltipCornerRadius: 0
      });
});