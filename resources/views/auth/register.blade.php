<x-guest-layout>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                        <!-- <img src="../../assets/images/logo-dark.svg"> -->
                        </div>
                        <center>
                        <b><p class="red-text" >
                            {{trans_choice('general.appName',0)}}
                            {{trans_choice('general.register',2)}} 
                            {{trans_choice('general.user',2)}}
                        </p></b>  
                        </center>
                        @if ($errors -> any())
                        <div  class="alert alert-danger" style="width: 100% !important;" role="alert">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        @endif
                        <br>
                        <form class="pt-3" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="email"  name="email" class="form-control form-control-lg" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password"name="password" class="form-control form-control-lg" id="password" autocomplete="new-password" placeholder="Password">
                        </div>
                        
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control form-control-lg" autocomplete="new-password" id="password" placeholder="Confirm Password">
                        </div>
                        
                        <div class="mt-3">
                            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                        </div>
                        <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{url('/login')}}" class="text-primary">Login</a>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    
</x-guest-layout>
