 <!-- Vendor Start -->
 <div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                @foreach ($brands as $item)
                <div class="bg-light p-4">
                    <img src="{{asset('img/logo/'.$item->img)}}" alt="">
                </div>
                @endforeach
               
            </div>
        </div>
    </div>
</div>
<!-- Vendor End -->
