@extends('user.include_user.master_user')    
@push('style')
    
@endpush
@section('login_user')
<div class="container-fluid pb-5">
    <div class="row px-xl-5 d-flex justify-content-center">
        <div class="col-lg-5 mb-30">
          <form method="post" action="{{ route('register.perform') }}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            
            <h1 class="h3 mb-3 fw-normal">Register</h1>
            <div class="form-group form-floating mb-3">
              <label for="floatingEmail">Name</label>
              <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" placeholder="Name"  >
            
              @if ($errors->has('name'))
                  <span class="text-danger text-left">{{ $errors->first('name') }}</span>
              @endif
            </div>
            <div class="form-group form-floating mb-3">
                <label for="floatingEmail">Email address</label>
                <input type="text" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="name@example.com"  >
              
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>
    
            <div class="form-group form-floating mb-3">
                <label for="floatingName">Username</label>
                <input type="text" class="form-control" name="username" value="{{ old('username') }}" id="username" placeholder="Username"  >
               
                @if ($errors->has('username'))
                    <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                @endif
            </div>
            
            <div class="form-group form-floating mb-3">
                <label for="floatingPassword">Password</label>
                <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" >
                
                @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>
    
            <div class="form-group form-floating mb-3">
                <label for="floatingConfirmPassword">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" >
               
                @if ($errors->has('password_confirmation'))
                    <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
    
            <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
            
        </form>
        </div>
    </div>
</div>
        
@endsection
@push('script')
      <script>
        $("#email").on('change',function(){
            var email = $(this).val();
            var username = email.split('@',1);
            $('#username').val(username);
            
        });
      </script>
@endpush