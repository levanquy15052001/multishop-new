@extends('user.include_user.master_user')    
@push('style')
    
@endpush
@section('content_user')

 <!-- Breadcrumb Start -->
 <div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Shopping Cart</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach($order_item as $item)
                    <tr>
                        <td class="align-middle"><img src="{{asset('template/img/products/'.$item->img)}}" alt="" style="width: 50px;">{{$item->name}}</td>
                        <td class="align-middle">
                            @if($item->price_sale == 0 && $item->price_sale < $item->price)
                            <h5>$ {{$item->price}}</h5><h6 class="text-muted ml-2">
                            @else
                            <h5>$ {{$item->price_sale}}</h5><h6 class="text-muted ml-2"><del>$ {{$item->price}}</del></h6>
                            @endif
                        </td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <a href="{{route('action',['id'=>$item->id_order,'action'=>'down'])}}" class="btn btn-sm btn-primary"> <i class="fa fa-minus"></i></a>
                                    {{-- <button class="btn btn-sm btn-primary" id="action" data-action="down" data-id="{{$item->id}}"> --}}
                                    {{-- <i class="fa fa-minus"></i> --}}
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="{{$item->order_qty}}">
                                <div class="input-group-btn">
                                <a href="{{route('action',['id'=>$item->id_order,'action'=>'up'])}}" class="btn btn-sm btn-primary">  <i class="fa fa-plus"></i></a>
                        
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">$
                            @php
                            $total=0;
                                 if($item->price_sale == 0 && $item->price_sale < $item->price)
                                 {
                                   $total = $item->price * $item->order_qty;
                                 }
                                 else {
                                    $total = $item->price_sale * $item->order_qty;
                                 }
                            @endphp
                            {{$total}}
                        </td>
                        <td class="align-middle"><button class="btn btn-sm btn-danger" id="delete_order" data-id="{{$item->id_order}}"><i class="fa fa-times"></i></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-30" action="">
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6>$ {{$total_order}}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5>$ {{$total_order+10}}</h5>
                    </div>
                    <a href="{{route('checkout')}}" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</a>
                    <a href="{{route('index')}}" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->

@endsection
@push('script')
    <script>
        $(document).ready(function(){
        $(document).on('click','#delete_order',function(){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url : "{{ route('action') }}",
                            type : 'GET',
                            data:{
                                'id':$(this).data('id'),
                                'action':'delete',
                            },
                            success : function(result){
                                if(result==true)
                                {
                                    swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                    });
                                    window.setTimeout( function() {
                                        window.location.reload();
                                        }, 3000);
                                }
                                 
                            }
                        });
                    
                }
                });
        });
    });
   
    </script>
@endpush