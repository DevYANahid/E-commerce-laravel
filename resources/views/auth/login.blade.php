<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- app favicon -->
    <link rel="shortcut icon" href="/client-assets/images/favicon.png">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link href="{{ asset('css/lite-purple.min.css') }}" rel="stylesheet">

    <style>
        .auth-layout-wrap{
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-image: url('{{ asset('upload/images/defoult_image/160139872824jo7a.DAC-cash-desk-panel-bg.jpg') }}');
        }
    </style>
</head>
<body>
<div class="auth-layout-wrap">
    <div class="auth-content" style="min-width: 300px;">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-4">
                        <div class="auth-logo text-center mb-4">
                            <img src="{{ asset('upload/images/defoult_image/logo-icon.png') }}" alt=""></div>
                        <h1 class="mb-3 text-18">Sign In</h1>
                        <!-- Notification -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Success Message -->
                                @if (session('message'))
                                    <div class="alert border-0 alert-primary bg-gradient m-b-30 alert-dismissible fade show border-radius-none" role="alert">

                                        {{ session('message') }}

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            &times;
                                        </button>
                                    </div>
                                @endif
                            <!-- Error Message -->
                                @if ($errors->any())
                                    <div class="alert border-0 alert-danger m-b-30 alert-dismissible fade show border-radius-none" role="alert">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="i-Close"></i>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- end row -->
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control form-control-rounded @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control form-control-rounded @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input type="submit" name="signin" id="signin" value="Sign In" class="btn btn-rounded btn-primary btn-block mt-2">
                        </form>
                        <div class="mt-3 text-center"><a class="text-muted" href="{{ route('password.request') }}">
                                <u>Forgot Password?</u></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Scripts-->
<script src="{{ asset('client-assets/js/jQuery_v3.1.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

