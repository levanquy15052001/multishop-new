@extends('admin.include_admin.master_admin')    
@push('style_admin')
    <style>
      .style_icon{
        font-size: 30px;
      }
      table thead tr th{
        text-align: center;
      }
      table tbody tr td{
        text-align: center;
      }
     
    </style>
@endpush
@section('content_admin')

   <!-- page content -->
   <div class="right_col" role="main">
    <div class="">

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
              <h3> All Product</h3>
              <a href="{{route('admin.add_products')}}" class="btn btn-primary"> Add Products</a>
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr >
                    <th class="bulk_action">Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Price Sale</th>
                    <th>Categories</th>
                    <th>Brands</th>
                    <th class="action_style">Action</th>
                  </tr>
                </thead>


                <tbody>

                  @foreach ($products as $item)
                  <tr>
                    <td><img src="{{asset('template/img/products/'.$item->img)}}" alt="" style="width: 50px;"></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->price_sale}}</td>
                    <td>{{$item->categories_name}}</td>
                    <td>{{$item->brand_name}}</td>
                    <td> 
                      <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                      <a href="{{route('admin.edit',$item->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                      <a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                    </td>
                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
            </div>
            </div>
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
       