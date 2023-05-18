@extends('admin.include_admin.master_admin')    
@push('style_admin')

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
                        <form class="form" id="form" action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <span class="section">Add Categories</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Categoris Name<span class="required">*</span></label>
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
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Status<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="status" id="status" >
                                        <option value="" >-------</option>
                                        <option value="0" {{old('status')!=null && old('status') == 0 ? "selected" : ''}} >UnActive</option>
                                        <option value="1" {{old('status')!=null && old('status') == 1 ? "selected" : ''}}>Active</option>
                                      </select>
                                    @if ($errors->has('status'))
                                      <span class="text-danger">{{ $errors->first('status') }}</span>
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
    
@endpush