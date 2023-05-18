@extends('admin.include_admin.master_admin')    
@push('style_admin')
    <style>
      table thead tr th{
        text-align: center
      }
      table tbody tr td{
        text-align:  center;
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
              <h3> History Order Offline</h3>
              <a href="{{route('admin.order.create')}}" class="btn btn-primary"> Create Order Offline</a>
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr >
                    <th>Name</th>
                    <th>Quantity Product</th>
                    <th>Total Order</th>
                    <th class="action_style">Action</th>
                  </tr>
                </thead>


                <tbody>
                @foreach ($Information as $item)
                <tr>
                  <td> {{$item->name}}</td>
                  <td>{{$item->qty_prodyuct}}</td>
                  <td> $ {{$item->total_order}}</td>
                  <td> 
                      <a href="{{route('admin.order.offline',$item->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
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
       