@extends('layout.app')
@push('css')
    
@endpush
@section('content')

<div class="row">
  <div class="col-md-12">

    <form class="form-horizontal" method="post" action="/user/gantipass">
      @csrf
    <div class="box-body">
      <div class="form-group">
          <label class="col-sm-2 control-label">Masukkan Password Lama</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="password_lama" required>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-2 control-label">Password Baru</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="password1" required>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-2 control-label">Masukkan Lagi</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="password2" required>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-2 control-label"></label>
          <div class="col-sm-10">
            <button type="submit" class="btn btn-block btn-flat btn-primary pull-right"><i class="fa fa-save"></i> Update</button>
          </div>
      </div>
    </div>
    </form>
  </div>
</div>
@endsection
@push('js')

<script src="/assets/bower_components/chart.js/Chart.js"></script>
<script>
    $(function () {
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */
      
      var areaChartData = {
        labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
          {
            label               : 'Surat Kematian',
            fillColor           : 'rgba(210, 214, 222, 1)',
            strokeColor         : 'rgba(210, 214, 222, 1)',
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : [65, 59, 80, 81, 56, 55, 40]
          },
          {
            label               : 'Surat Pernyataan',
            fillColor           : 'rgba(60,141,188,0.9)',
            strokeColor         : 'rgba(60,141,188,0.8)',
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : [28, 48, 40, 19, 86, 27, 90]
          }
        ]
      }
      //-------------
      //- BAR CHART -
      //-------------
      var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
      var barChart                         = new Chart(barChartCanvas)
      var barChartData                     = areaChartData
      barChartData.datasets[1].fillColor   = '#00a65a'
      barChartData.datasets[1].strokeColor = '#00a65a'
      barChartData.datasets[1].pointColor  = '#00a65a'
      var barChartOptions                  = {
        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
        scaleBeginAtZero        : true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines      : true,
        //String - Colour of the grid lines
        scaleGridLineColor      : 'rgba(0,0,0,.05)',
        //Number - Width of the grid lines
        scaleGridLineWidth      : 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines  : true,
        //Boolean - If there is a stroke on each bar
        barShowStroke           : true,
        //Number - Pixel width of the bar stroke
        barStrokeWidth          : 2,
        //Number - Spacing between each of the X value sets
        barValueSpacing         : 5,
        //Number - Spacing between data sets within X values
        barDatasetSpacing       : 1,
        //String - A legend template
        legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        //Boolean - whether to make the chart responsive
        responsive              : true,
        maintainAspectRatio     : true
      }
  
      barChartOptions.datasetFill = false
      barChart.Bar(barChartData, barChartOptions)
    })
</script>
@endpush
