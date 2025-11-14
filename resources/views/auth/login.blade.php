<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Saasbiz</title>

    <link rel="stylesheet" href="{{ asset('admin_assets/css/venobox/venobox.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/responsive.css') }}">
</head>
<body>

<section class="login-section">
    <div class="map"></div>
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-4 offset-lg-4">
                <div class="login-box">
                    <div class="section-heading mb-30">
                        <h2>Login To Your Account</h2>
                        <p>Multipurpose Saas Startup Template.</p>
                    </div>

                    {{-- Session Status --}}
                    @if(session('status'))
                        <div class="alert alert-success mb-4">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Validation Errors --}}
                    @if($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control"
                                placeholder="Email address"
                                value="{{ old('email') }}"
                                required autofocus autocomplete="username">
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="form-control"
                                placeholder="Password"
                                required autocomplete="current-password">
                        </div>

                        <div class="form-group form-check mb-3">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:underline">
                                    Forgot your password?
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="default-btn btn-blue w-100">Login Now</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('admin_assets/js/vendor/plugins.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/main.js') }}"></script>
</body>
</html>
