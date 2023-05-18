@extends('admin.include_admin.master_admin')    
@push('style_admin')
    <style>
        .style_product{
            height: 150px;
        }
        .error{
            color: red;
        }
    </style>
@endpush
@section('content_admin')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Create Order</h3>
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

          <div class="x_panel">
        
            <div class="x_title">
             
              <div class="clearfix">
               
                <div class="card">
                    <form action="{{route('admin.order.information.save')}}" id="insert_data" method="POST">
                        @csrf
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" name="name" id="name">
                            <input type= "hidden" name="user_id" value="" id="user_id">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="email" id="email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="phone" id="phone">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="address" id="address">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">City</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <select id="city" class="form-control address_new" name="city">
                                    <option value="" selected>Select City</option>           
                                </select>
                                    @if($errors->has('city'))
                                        <div class="text-danger" >{{ $errors->first('city') }}</div>
                                    @endif 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Districts</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <select id="district" class="form-control address_new" name="district">
                                    <option value="" selected>Select district</option>
                                </select>
                                    @if($errors->has('district'))
                                        <div class="text-danger" >{{ $errors->first('district') }}</div>
                                    @endif 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Ward</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <select id="ward" class="form-control address_new" name="ward">
                                    <option value="" selected>Select ward</option>
                                </select> 
                                    @if($errors->has('ward'))
                                        <div class="text-danger" >{{ $errors->first('ward') }}</div>
                                    @endif 
                            </div>
                        </div>
                        <div class="row">
                                                
                        </div>
                        <div class="row">
                            <div class="col-sm-6 text-secondary" id="update_orders">
                               
                            </div>
                           
                            <div class="col-sm-3 text-secondary" >
                              <button type="submit" class="btn btn-primary px-4" name="create" id="button">Create Information</button>
                             
                            </div>
                        </div>
                    </div>
                </form>
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@endsection
@push('script_admin')
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
<script>    
 $("#insert_data").validate({  
                rules: {
                    name: {
                        required: true,
                        minlength:3,
                    },
                    phone: {
                        required: true,
                        number:true,
                        digits:true,
                        minlength:10,
                        maxlength:11,

                    },
                    address:{
                        required: true,
                    },
                    email:{
                        required: true,
                        email:true,
                    },
                },
                submitHandler: function (form, e) {
                    $form.submit();
                }
       
        });

    $(document).on('change','#email',function(){
        email = $(this).val();
    
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "{{ route('admin.order.information') }}",
            data : {
                'email' : email,
            },
            type : 'POST',
            success : function(data){
              if(data)
              {
                console.log(data.user_id);
                $('#name').val(data.name);
                $('#user_id').val(data.user_id);
                $('#phone').val(data.phone);
                $('#address').val(data.address);
                $('#city').val(data.city);
                $('#district').html('<option value="'+data.district+'" selected>'+data.district+'</option>');
                $('#ward').html('<option value="'+data.ward+'" selected>'+data.ward+'</option>');
                $('#update_orders').html('<button type="submit" class="btn btn-primary px-4" name="update" id="button">Update Order</button>');
              }

            
            }
        });
    });
</script>
@endpush
       