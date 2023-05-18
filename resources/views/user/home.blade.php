@extends('user.include_user.master_user')    
@push('style')
    
@endpush
@section('content_user')
    

    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured Products</span></h2>
        <div class="row px-xl-5">
            @foreach ($products as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{asset('template/img/products/'.$item->img)}}" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="{{route('order.action',$item->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="{{route('details',$item->id)}}"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">{{$item->name}}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            @if($item->price_sale == 0 && $item->price_sale < $item->price)
                            <h5>$ {{$item->price}}</h5><h6 class="text-muted ml-2">
                            @else
                            <h5>$ {{$item->price_sale}}</h5><h6 class="text-muted ml-2"><del>$ {{$item->price}}</del></h6>
                            @endif
                        </div>
                    </div>
                </div>
             
            </div>   
        @endforeach
        </div>
    </div>
    <!-- Products End -->
@endsection
@push('script')
    
@endpush