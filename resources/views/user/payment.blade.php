@extends('user.include_user.master_user')    
@push('style')
    <style>
        table tbody tr td {
            text-align: center;
        }
        table thead tr th {
            text-align: center;
        }
        .action_style{
            width: 25%;
        }
    </style>
@endpush
@section('content_user')
 <!-- page content -->
 <div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
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
                    <h3> PayMent</h3>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr >
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th class="action_style">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($payment as $item)
                        <tr>
                            <td><img src="{{asset('template/img/products/'.$item->product_img)}}" alt="" style="width: 50px;"></td>
                            <td>{{$item->product_name}}</td>
                            <td>{{$item->price}}</td>
                            <td>
                                @if($item->status == 2)
                                Waiting for progressing                                 
                                @else
                                Order Processed
                                @endif
                            </td>
                            <td> 
                                @if($item->status == 2)
                                <a href="{{route('action',['id'=>$item->id,'action'=>'delete_payment'])}}"><i class="fa fa-times-circle style_icon px-2"></i></a>
                                @else
                                Processed Orders Can't Be Canceled
                                @endif
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
                <a href="{{route('pdf_bill',Auth::user()->id)}}" style="display: inline-block;background:green;color:#fff;padding:7px 25px;font-weight:bold;margin-top:10px">DownloadPDF</a>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- /page content -->

@endsection
@push('script')
    
@endpush