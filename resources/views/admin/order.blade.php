@extends('admin.include_admin.master_admin')    
@push('style_admin')
    <style>
        .me-2 {
            margin-right: .5rem!important;
        }
    </style>
@endpush
@section('content_admin')
<div class="row">
</div>
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
        @foreach ($Information as  $Infor)
        @if(!empty($Infor['order']))
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
                                {{$Infor['name']}}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$Infor['email']}}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$Infor['phone']}}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$Infor['address']}}
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
                                    @foreach ($Infor['order'] as $value)
                                    <tr>
                                        <td> {{$value['product_name']}}</td>
                                        <td> $ {{$value['price']}}</td>
                                        <td>{{$value['qty']}}</td>
                                        <td>$ {{$value['qty'] * $value['price']}}</td>
                                        <td>
                                          <a href="{{route('admin.store',['id'=>$value['id'],'action'=>'delete'])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                        </td>
                                      </tr>
                                    @endforeach
                                 <tr>
                                    <td colspan="5"> Total Order: $ {{$Infor['total']}}  </td>
                                 </tr>

                                </tbody>
                              </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 text-secondary">
                                
                            </div>
                            <div class="col-sm-3 text-secondary">
                              <a href="{{route('admin.order.confirm',['id'=>$Infor['user_id'],'action'=>'update'])}}" class="btn btn-primary px-4">Update Order </a> 
                            </div>
                            <div class="col-sm-3 text-secondary">
                              <a href="{{route('admin.order.confirm',['id'=>$Infor['user_id'],'action'=>'confirm'])}}" class="btn btn-primary px-4">Order confirmation </a>
                            </div>
                        </div>
                    </div>
                   
                </div>
               
              </div>
             
            </div>
           
          </div>
        
        @endif

        @endforeach  
  </div>
  <!-- /page content -->

@endsection
@push('script_admin')
    
@endpush
       