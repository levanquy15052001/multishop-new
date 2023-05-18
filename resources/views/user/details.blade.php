@extends('user.include_user.master_user')    
@push('style')
    
@endpush
@section('content_user')
    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{asset('template/img/products/'.$products->img)}}" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{asset('template/img/product-2.jpg')}}" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{asset('template/img/product-3.jpg')}}" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{asset('template/img/product-4.jpg')}}" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>{{$products->name}}</h3>
                  
                    <h3 class="font-weight-semi-bold mb-4">
                        @if($products->price_sale == 0 && $products->price_sale < $products->price)
                         $ {{$products->price}}
                            @else
                        $ {{$products->price_sale}} <del>$ {{$products->price}}</del>
                        @endif
                    </h3>
                    <div class="d-flex mb-3">
                        <strong class="text-dark mr-3">Brand: {{$products->brand_name}}</strong>
                        
                    </div>
                    <div class="d-flex mb-4">
                        <strong class="text-dark mr-3">Categories: {{$products->categories_name}}</strong>
                    </div>
                
                        <a href="{{route('order.action',$products->id)}}" class="btn btn-primary px-3" type="submit"><i class="fa fa-shopping-cart mr-1"></i> Add To
                            Cart</a>
        
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Product Description</h4>
                            <p>{{$products->desc}}</p>    
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Additional Information</h4>
                            <p>{{$products->content}}</p>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">You May Also Like</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach ($product_like as $item)
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('template/img/products/'.$item->img)}}"  alt="">
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

                    @endforeach
                 
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
@endsection
@push('script')
    
@endpush