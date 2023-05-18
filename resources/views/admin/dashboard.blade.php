@extends('admin.include_admin.master_admin')    
@push('style_admin')
    <style>
     .list-function{
        font-size: 30px
     }
    </style>
@endpush
@section('content_admin')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Dashboard</h3>
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
            <div class="col-md-12 col-sm-12  ">
              <div class="x_panel">
                <div class="x_title">
                  <h2> Dashboard</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  
                        <div class="row">
    
                          <div class="col-md-12">
    
    
                            <!-- price element -->
                            <div class="col-md-3 col-sm-6  ">
                              <div class="pricing ui-ribbon-container">
                                {{-- <div class="ui-ribbon-wrapper">
                                  <div class="ui-ribbon">
                                    30% Off
                                  </div>
                                </div> --}}
                                <div class="title">
                                  <h1> Product</h1>
                                </div>
                                <div class="x_content">
                                  <div class="">
                                    <div class="pricing_features">
                                      <ul class="list-unstyled text-left">
                                       <a href="{{route('admin.all_products')}}" class="list-function"> <li><i class="fa fa-check text-success"></i>All Product</li></a>
                                       
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- price element -->
    
                       
                          </div>
                        </div>
                      </div>
               
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->
 
@endsection
@push('script_admin')
    
@endpush
       