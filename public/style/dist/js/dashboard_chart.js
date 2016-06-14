
      var areaChartData = {
      labels: [@for($i=date("Y")-5; $i<=date("Y"); $i++)
                    {{$i.","}}
            @endfor       ],
      datasets: [
        {
          label: "Akademik",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "#00C0EF",
          pointColor: "#00C0EF",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [25, 29, 10, 21, 16 ]
        },
        {
          label: "Penelitian",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "#00A65A",
          pointColor: "#00A65A",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [2, 8, 16, 27, 20]
        },
        {
          label: "Pengabdian Masyarakat",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "#DD4B39",
          pointColor: "#DD4B39",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [16, 4, 16, 7, 9]
        },
        {
          label: "Kegiatan Penunjang",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "#F39C12",
          pointColor: "#F39C12",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [18, 5, 15, 2, 12]
        }
      ]
    };

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: true,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    var ctx=$("#statistik").get(0).getContext("2d");
    var statistikChart=new Chart(ctx);
    var lineChartOptions = areaChartOptions;
    lineChartOptions.datasetFill = false;
    statistikChart.Line(areaChartData, lineChartOptions);