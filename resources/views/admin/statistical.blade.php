@extends('admin.include_admin.master_admin')    
@push('style_admin')
    
@endpush
@section('content_admin')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Echarts <small>Some examples to get you started</small></h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>
      </div>
      
      <div class="clearfix"></div>

      <div class="row">


        <div class="col-md-6 col-sm-6  ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Categories</h2>
             
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div id="categories_chart" style="height: 370px; width: 100%;"></div>

            </div>
          </div>
        </div>

        <div class="col-md-6 col-sm-6  ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Brand</h2>
             
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <div id="brand_chart" style="height:350px;"></div>

            </div>
          </div>
        </div>



      </div>
    </div>
  </div>
  <!-- /page content -->

@endsection
@push('script_admin')
<script src="{{asset('js/canvasjs.min.js')}}"></script>
<script>

    window.onload = function() {

    var categories_chart = @json($categories_chart);

    var brand_chart = @json($brand_chart);

    var categories_chart = new CanvasJS.Chart("categories_chart", {
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        exportEnabled: true,
        animationEnabled: true,
        title: {
            text: "Category Statistics"
        },
        data: [{
            type: "pie",
            startAngle: 25,
            toolTipContent: "<b>{label}</b>: {y}%",
          
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - {y}%",
            dataPoints:categories_chart,
        }]
    });

    var brand_chart = new CanvasJS.Chart("brand_chart", {
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        exportEnabled: true,
        animationEnabled: true,
        title: {
            text: "Brand Statistics"
        },
        data: [{
            type: "pie",
            startAngle: 25,
            toolTipContent: "<b>{label}</b>: {y}%",
          
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - {y}%",
            dataPoints:brand_chart,
        }]
    });

    categories_chart.render();

    brand_chart.render();

}
</script>
   
@endpush
       