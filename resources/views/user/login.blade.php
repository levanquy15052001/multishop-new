@extends('user.include_user.master_user')    
@push('style')
    
@endpush
@section('login_user')
<div class="container-fluid pb-5">
    <div class="row px-xl-5 d-flex justify-content-center">
        <div class="col-lg-5 mb-30">
          <form method="post" action="{{ route('login.perform') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <h3 class="d-flex justify-content-center">Login</h3>
                <!-- Email input -->
                <div class="form-outline mb-4">
                  
                  <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username">
                  <label for="floatingName">Email or Username</label>
                  <label class="form-label" for="form2Example1">Email address</label>
                </div>
              
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password">
                  <label for="floatingPassword">Password</label>
                </div>
              

              
                <!-- Submit button -->
                <div class="d-flex justify-content-center mr-4">
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                  </div>
               
              </form>
        </div>
        @if(isset ($errors) && count($errors) > 0)
            <div class="alert alert-warning" role="alert">
                <ul class="list-unstyled mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(Session::get('success', false))
            <?php $data = Session::get('success'); ?>
            @if (is_array($data))
                @foreach ($data as $msg)
                    <div class="alert alert-warning" role="alert">
                        <i class="fa fa-check"></i>
                        {{ $msg }}
                    </div>
                @endforeach
            @else
                <div class="alert alert-warning" role="alert">
                    <i class="fa fa-check"></i>
                    {{ $data }}
                </div>
            @endif
        @endif
    </div>
</div>
        
@endsection
@push('script')
    
@endpush