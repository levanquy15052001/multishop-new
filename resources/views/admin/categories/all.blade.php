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
  .action
  {
    width: 350px    ;
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
              <h3> All Categories</h3>
              <a href="" class="btn btn-primary"> Add Categories</a>
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr >
                    <th class="bulk_action">Image</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>    
                <tbody>
                  @foreach ($categories as $item)
                    <tr>
                      <td><img src="{{asset('img/logo/'.$item->img)}}" alt="" style="width: 50px;"></td>
                      <td>{{$item->name}}</td>
                      <td class="action">
                        @if($item->status == 0)
                        <a href=""><i class="fa fa-times-circle style_icon px-2"></i></a>
                        @else
                        <a href=""><i class=" fa fa-check-circle style_icon"></i></a>
                        @endif
                      </td>
                      <td class="action"> 
                        <a href="{{route('admin.categories.show',$item->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
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
       