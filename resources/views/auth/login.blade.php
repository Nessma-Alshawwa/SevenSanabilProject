@extends('Website.layouts.main')
@section('MainContent')
<!-- ----------------------------------------------------------------------------------------- -->
<div class="container-fluid">
    <h1 class="text-center mt-4 mb-4 color1">
        تسجيل الدخول
    </h1>

    @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

    <form class="shadow mx-auto mb-4 p-4 text-right w-50" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-4">
            <h6 for="exampleInputEmail1"
                    class="form-label color1">
            * البريد الالكتروني
            </h6>
            <input type="email" name="email" :value="old('email')" required autofocus class="form-control">
        </div>
        <div class="mb-4">
            <h6 for="exampleInputPassword1"
                    class="form-label color1">
                كلمة السر*
            </h6>
            <input type="password" name="password" required autocomplete="current-password"
                    class="form-control"
                    id="Password">
        </div>
        <div class="mb-4 form-check">
            <input
                    id="remember_me" name="remember"
                    type="checkbox"
                    class="form-check-input">
            <label class="form-check-label color1 px-4">
                    تذكرني
            </label>
        </div>
        <div class="mb-4">
            @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('هل نسيت كلمة المرور؟!!') }}
                    </a>
                @endif
        </div>
        <div class="mb-4 text-center">
            
            <button type="submit"
                        class="btn text-white bgColor1 w-50 ">
                        {{ __('تسجيل الدخول') }}
            </button>
        </div>
    </form>
</div>
<!-- ----------------------------------------------------------------------------------------- -->
@stop

