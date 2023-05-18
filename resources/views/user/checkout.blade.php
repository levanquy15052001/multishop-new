@extends('user.include_user.master_user')    
@push('style')
    <style>
      .action_information{
        text-align: center;
      }
    </style>
@endpush
@section('content_user')
 <!-- Breadcrumb Start -->
 <div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Checkout</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Checkout Start -->
<form action="{{route('payment')}}" method="POST">
    @csrf
<div class="container-fluid">
    <div class="row px-xl-5">       
        <div class="col-lg-8">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
            <div class="bg-light p-30 mb-5">
                @if($Information != null)
                <section style="background-color: #eee;">
                    <div class="container py-5">
                      <div class="row">
                        <div class="col">
                          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                            <ol class="breadcrumb mb-0">
                              <li class="breadcrumb-item active" aria-current="page">Information</li>
                            </ol>
                          </nav>
                        </div>
                      </div>
                  
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="card mb-4">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$Information->name}}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$Information->email}}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$Information->phone}}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$Information->address . " " . $Information->ward ." ". $Information->district ." ". $Information->city}}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-12 action_information">
                                    <button class="btn btn-primary"> Edit</button>
                                    <button class="btn btn-primary"> Delete</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                @else
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" name="name" value="{{old('name') ?? Auth::user()->name}}">
                            @if($errors->has('name'))
                                <div class="text-danger" >{{ $errors->first('name') }}</div>
                            @endif
                    </div>
                    <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input class="form-control" type="text" name="email" value="{{old('email') ?? Auth::user()->email}}">
                            @if($errors->has('email'))
                                <div class="text-danger" >{{ $errors->first('email') }}</div>
                            @endif
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Mobile No</label>
                        <input class="form-control" type="text" name="phone" value="{{old('phone')  }}">
                            @if($errors->has('phone'))
                                <div class="text-danger" >{{ $errors->first('phone') }}</div>
                            @endif 
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address</label>
                        <input class="form-control" type="text" name="address"  value="{{old('address')}}">
                            @if($errors->has('address'))
                                <div class="text-danger" >{{ $errors->first('address') }}</div>
                            @endif 
                    </div>
                 
                    <div class="col-md-6 form-group">
                        <label>City</label>
                        <select id="city" class="form-control address_new" name="city">
                            <option value="" selected>Select City</option>           
                        </select>
                            @if($errors->has('city'))
                                <div class="text-danger" >{{ $errors->first('city') }}</div>
                            @endif 
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Districts</label>
                        <select id="district" class="form-control address_new" name="district">
                            <option value="" selected>Select district</option>
                        </select>
                            @if($errors->has('district'))
                                <div class="text-danger" >{{ $errors->first('district') }}</div>
                            @endif 
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Ward</label>
                        <select id="ward" class="form-control address_new" name="ward">
                            <option value="" selected>Select ward</option>
                        </select> 
                            @if($errors->has('ward'))
                                <div class="text-danger" >{{ $errors->first('ward') }}</div>
                            @endif 
                    </div>
                </div>
                @endif
            </div>
        
        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom">   
                    <h6 class="mb-3">Products</h6>
                    @foreach ($order_item as $item)
                 
                    <div class="d-flex justify-content-between">
                        <p>{{$item->name}}</p>
                        <p>$
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
                        </p>
                    </div>

                    @endforeach
                  
                </div>
                <div class="border-bottom pt-3 pb-2">
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
                </div>
            </div>
            <div class="mb-5">
                   
                    <button class="btn btn-block btn-primary font-weight-bold py-3" type="submit">Place Order</button>
                    <a href="{{route('order')}}" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<!-- Checkout End -->


@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
    url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
    method: "GET", 
    responseType: "application/json", 
    };
    var promise = axios(Parameter);
    promise.then(function (result) {
    renderCity(result.data);
    });

    function renderCity(data) {
    for (const x of data) {
    var opt = document.createElement('option');
    opt.value = x.Name;
    opt.text = x.Name;
    opt.setAttribute('data-id', x.Id);
    citis.options.add(opt);
    }
    citis.onchange = function () {
    district.length = 1;
    ward.length = 1;
    if(this.options[this.selectedIndex].dataset.id != ""){
    const result = data.filter(n => n.Id === this.options[this.selectedIndex].dataset.id);

    for (const k of result[0].Districts) {
        var opt = document.createElement('option');
        opt.value = k.Name;
        opt.text = k.Name;
        opt.setAttribute('data-id', k.Id);
        district.options.add(opt);
    }
    }
    };
    district.onchange = function () {
    ward.length = 1;
    const dataCity = data.filter((n) => n.Id === citis.options[citis.selectedIndex].dataset.id);
    if (this.options[this.selectedIndex].dataset.id != "") {
    const dataWards = dataCity[0].Districts.filter(n => n.Id === this.options[this.selectedIndex].dataset.id)[0].Wards;

    for (const w of dataWards) {
        var opt = document.createElement('option');
        opt.value = w.Name;
        opt.text = w.Name;
        opt.setAttribute('data-id', w.Id);
        wards.options.add(opt);
    }
    }
    };
    }
</script>
@endpush