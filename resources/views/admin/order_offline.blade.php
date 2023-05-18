@extends('admin.include_admin.master_admin')    
@push('style_admin')
    
@endpush
@section('content_admin')
 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Order Details </h3>
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
      <div class="row" style="display: block;">

        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">
        
            <div class="x_title">
             
              <div class="clearfix">
               
                <div class="card">
                    
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$Information->name}}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$Information->email}}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$Information->phone}}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$Information->address}}
                            </div>
                        </div>
                        <div class="row">
                            <h3> Product Details</h3>
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>Name Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                   @foreach ($Information->Order_offline as $item)
                                    <tr>
                                        <td>{{$item->product_name}}</td>
                                        <td>$ {{$item->price}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td>$ {{$item->price * $item->qty}}</td>
                                        <td>
                                          <a href="{{route('admin.confirm.order.offline',['id'=>$item->id,'action'=>'delete'])}}" class="btn btn-danger">Delete</a>
                                        </td>
                                       
                                      </tr>
                                      @endforeach
                                 <tr>
                                    <td colspan="5"> Total Order: $  {{$Information->total_order}} </td>
                                 </tr>

                                </tbody>
                              </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 text-secondary">
                                
                            </div>
                            <div class="col-sm-3 text-secondary">
                              <a href="{{route('admin.order.offline.history')}}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Back </a>
                            
                            </div>
                            <div class="col-sm-3 text-secondary">
                              <a href="{{route('admin.confirm.order.offline',['id'=>$Information->id,'action'=>'confirm'])}}" class="btn btn-primary px-4">Order confirm </a>
                            </div>
                        </div>
                    </div>
                  
                </div>
                <h3>Product </h3>
                <div class="row" role="main">
                    @foreach ($product as $item)
                    <div class="col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats style_product">
                            <div class="icon"> <img width="70px" src="{{asset('template/img/products/'.$item->img)}}" alt=""></div>
                            <div class="count">
                                @if($item->price_sale == 0 && $item->price_sale < $item->price)
                                <h5>$ {{$item->price}}</h5><h6 class="text-muted ml-2">
                                @else
                                <h5>$ {{$item->price_sale}}</h5><h6 class="text-muted ml-2"><del>$ {{$item->price}}</del></h6>
                                @endif
                            </div>
                         
                            <p>{{$item->name}}</p>
                            <a href="{{route('admin.add.order.offline',["id_product"=>$item->id,"id_information"=>$Information->id])}}" class="btn btn-primary">Add Order </a>

                        </div>
                    </div>
                    @endforeach
                   
                </div>
              </div>
             
            </div>
           
          </div>
      
  </div>
  <!-- /page content -->


@endsection
@push('script_admin')
    
@endpush
       