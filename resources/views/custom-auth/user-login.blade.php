<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Task managment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="GetAppui" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/techui/layouts/assets/favicon-3ab1de74.ico">
    <!-- Font Family -->
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@900,700,500,300,400&display=swap" rel="stylesheet">
    <script type="module" crossorigin src="{{ asset('backend/app-22784e3d.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('backend/app-0f19a312.css') }}">
</head>

<body class="authentication-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="row g-0 align-items-center justify-content-center">
                        <div class="col-xl-5 col-lg-6">
                            <div class="d-flex flex-column p-4">
                                <div class="flex-shrink-0">
                                    <div class="auth-brand mb-5">
                                        <a href="" class="logo-dark">
                                            <span><img src="{{ asset('backend/assets/logo-light-e9fb2c1a.png') }}"
                                                    alt="" height="32"></span>
                                        </a>
                                        <a href=" " class="logo-light">
                                            <span><img src="{{ asset('backend/assets/logo-dark-3d833aea.png') }}"
                                                    alt="" height="32"></span>
                                        </a>
                                    </div>
                                </div>

                                <div class="flex-grow-1 d-flex flex-column align-items-center justify-content-center">
                                    <div class="w-100">
                                        <div class="">
                                            <h4 class="font-20">Sign In</h4>
                                            <p class="text-muted mb-3">Enter your email address and password to access
                                                account.</p>
                                        </div>
                                        <p class=""> Admin: admin@gmail.com</p>
                                        <p class=""> Password: 11111111</p>

                                        <form method="POST" action="{{ route('custom.login') }}" class="mb-3">
                                            @csrf

                                            <div class="form-group mb-3">
                                                <label class="form-label" for="emailaddress">Email address</label>
                                                <input class="form-control @error('email') is-invalid @enderror"
                                                    type="email" name="email" id="emailaddress" required
                                                    placeholder="Enter your email">
                                                @error('email')
                                                    <div class="invalid-feedback text-danger-emphasis">{{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" name="password" id="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        placeholder="Enter your password">
                                                </div>
                                                @error('password')
                                                    <div class="invalid-feedback text-danger-emphasis">{{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <div class="d-flex gap-2">
                                                    <input class="form-check-input" type="checkbox" id="checkbox-signin"
                                                        checked>
                                                    <label class="form-check-label" for="checkbox-signin">Remember
                                                        me</label>
                                                </div>
                                            </div>

                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-blue w-100" type="submit"><i
                                                        class="mdi mdi-login me-1"></i> Log In </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end card-body -->
                        </div>
                    </div>
                </div>
                <!-- end card -->
                <p class="text-muted text-center font-16 mb-5">Don't have an account? <a
                        href="{{ url('user-register') }}" class="text-dark ms-1">Sign Up</a></p>

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->

    <footer class="footer footer-alt fw-medium bg-transparent">
        <span class="text-muted">
            <script>
                document.write(new Date().getFullYear())
            </script> © <a href="https://webguro.com/">webguro</a> - Template by webguro
        </span>
    </footer>

    <script src="{{ asset('backend/index.js') }}"></script>
</body>

</html>
