@extends('admin.include_admin.master_admin')    
@push('style_admin')
    <style>
        .error{
            color: red;
        }
    </style>
@endpush
@section('content_admin')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
       
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form class="form" id="form" action="{{route('admin.store.product')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <span class="section">Add Product</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Product Name<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="name" value="{{old('name')}}" id="name"/>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif  
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Image<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control"  name="img" type="file" id="img" />
                                    @if ($errors->has('img'))
                                        <span class="text-danger">{{ $errors->first('img') }}</span>
                                    @endif  
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Brand<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="brand" id="brand">
                                        <option  value="">Open this select menu</option>
                                        @foreach ($brands as $item)
                                            <option value="{{$item->id}}"{{($item->id == old('categories')) ? "selected" : ""}}>{{$item->name}}</option>
                                        @endforeach
                                      </select>
                                    @if ($errors->has('brand'))
                                        <span class="text-danger">{{ $errors->first('brand') }}</span>
                                    @endif  
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Categories<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="categories" id="categories" >
                                        <option value="" >Open this select menu</option>
                                        @foreach ($categories as $item)
                                                <option value="{{$item->id}}" {{($item->id == old('categories')) ? "selected" : ""}}>{{$item->name}}</option>
                                        @endforeach
                                      </select>
                                    @if ($errors->has('categories'))
                                      <span class="text-danger">{{ $errors->first('categories') }}</span>
                                    @endif  
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Price <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" id="price" name="price" value="{{old('price')}}"  >
                                    @if ($errors->has('price'))
                                        <span class="text-danger">{{ $errors->first('price') }}</span>
                                    @endif  
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Price Sale<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" id="price_sale" name="price_sale" value="{{old('price_sale')}}"  type="text" name="text" >
                                    @if ($errors->has('price_sale'))
                                        <span class="text-danger">{{ $errors->first('price_sale') }}</span>
                                    @endif  
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Description<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea  class="form-control" name="desc" id="desc" cols="30" rows="10">{{old('desc')}}</textarea>
                                    @if ($errors->has('desc'))
                                        <span class="text-danger">{{ $errors->first('desc') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Content<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea  class="form-control" name="content" id="content" cols="30" rows="10">{{old('content')}}</textarea>
                                    @if ($errors->has('content'))
                                        <span class="text-danger">{{ $errors->first('content') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type='submit' class="btn btn-primary">Submit</button>
                                        <button type='reset' class="btn btn-success">Reset</button>
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
<!-- /page content -->


@endsection
@push('script_admin')
<script src="{{asset('admin_master/src/js/jquery.validate.min.js')}}"></script>
<script>
        $(document).ready(function () {

                $('#form').validate({ 
                    rules: {
                        name: {
                            required: true,
                        },
                        img: {
                            required: true, 
                        }, name: {
                            required: true,
                        }, 
                        brand: {
                            required: true,
                        },
                        categories:{
                            required: true,
                        }   ,
                        price: {
                            required: true,
                            number:true,
                        }, 
                        price_sale: {
                            number:true,
                        }, 
                        desc: {
                            required: true,
                        }, 
                        content: {
                            required: true,
                        },
                    },
                    submitHandler: function(form) { 
                        form.submit(); return true;
                    }
                });

            });
</script>
@endpush
       