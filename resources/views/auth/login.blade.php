@extends('auth.master')

@section('title', 'Login')

@section('content')
    <div class="d-flex flex-center flex-column flex-column-fluid">
        <!--begin::Wrapper-->
        <div class="w-lg-500px p-10 p-lg-15 mx-auto">

            <!--begin::Form-->
            <form class="form w-100" method="POST" action="{{ route('login') }}">
                @csrf
                <!--begin::Heading-->
                <div class="text-center mb-10">
                    <!--begin::Title-->
                    <h1 class="text-dark mb-3">
                        Sign In to Craft </h1>
                    <!--end::Title-->

                    <!--begin::Link-->
                    <div class="text-gray-400 fw-semibold fs-4">
                        New Here?

                        <a href="{{ route('register') }}" class="link-primary fw-bold">
                            Create an Account
                        </a>
                    </div>
                    <!--end::Link-->
                </div>
                <!--begin::Heading-->

                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <!--begin::Label-->
                    <label class="form-label fs-6 fw-bold text-dark">Email</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input id="email" type="email"
                        class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <!--end::Input-->
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack mb-2">
                        <!--begin::Label-->
                        <label class="form-label fw-bold text-dark fs-6 mb-0">Password</label>
                        <!--end::Label-->

                        <!--begin::Link-->
                        <a href="{{ route('password.request') }}" class="link-primary fs-6 fw-bold">
                            Forgot Password ?
                        </a>
                        <!--end::Link-->
                    </div>
                    <!--end::Wrapper-->
                    <input id="password" type="password"
                        class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!--end::Input group-->

                <!--begin::Actions-->
                <div class="text-center">
                    <!--begin::Submit button-->
                    <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                        <span class="indicator-label">
                            Continue
                        </span>

                        <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                    <!--end::Submit button-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
    </div>
@endsection
