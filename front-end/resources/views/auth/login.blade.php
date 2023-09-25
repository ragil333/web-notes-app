<!doctype html>
<html lang="en">

@include('layout.header')

<body class=" ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->

    <div class="wrapper">
        <section class="login-content">
            <div class="container h-100">
                <div class="row justify-content-center align-items-center height-self-center">
                    <div class="col-lg-6 col-md-10 col-sm-12 col-12 align-self-center">
                        <div class="sign-user_card">
                            <div class="logo-detail">
                                <div class="d-flex align-items-center"><img src="../assets/images/logo.png"
                                        class="img-fluid rounded-normal light-logo logo" alt="logo">
                                    <h4 class="logo-title ml-3">NotePlus</h4>
                                </div>
                            </div>
                            <h3 class="mb-2">Sign In</h3>
                            <p>Login to stay connected.</p>
                            <form action="{{ route('auth.login') }}" method="POST">
                                @csrf
                                <div class="row">
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $err)
                                            <div class="col-lg-12">
                                                <div class="alert  bg-warning" role="alert">
                                                    <div class="iq-alert-icon">
                                                        <i class="ri-alert-line"></i>
                                                    </div>
                                                    <div class="iq-alert-text">{{ $err }}
                                                    </div>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <i class="ri-close-line"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    @if (Session::has('success'))
                                        <div class="col-lg-12">
                                            <div class="alert  bg-primary" role="alert">
                                                <div class="iq-alert-icon">
                                                    <i class="ri-alert-line"></i>
                                                </div>
                                                <div class="iq-alert-text">{{ Session::get('success') }}
                                                </div>
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <i class="ri-close-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-lg-12">
                                        <div class="floating-label form-group">
                                            <input class="floating-input form-control" name="email" required
                                                type="email" placeholder=" ">
                                            <label>Email</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="floating-label form-group">
                                            <input class="floating-input form-control" name="password" required
                                                type="password" placeholder=" ">
                                            <label>Password</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <a href="auth-recoverpw.html" class="text-primary float-right">Forgot
                                            Password?</a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Sign In</button>
                                <p class="mt-3 mb-0">
                                    Create an Account <a href="{{ route('register') }}" class="text-primary"><b>Sign
                                            Up</b></a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('layout.footer')
</body>

</html>
