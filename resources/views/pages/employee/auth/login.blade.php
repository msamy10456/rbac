<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Jobie : jobie Job Portal Admin  Bootstrap 5 Template" />
	<meta property="og:title" content="Jobie : jobie Job Portal Admin  Bootstrap 5 Template" />
	<meta property="og:description" content="Jobie : Job Portal  Admin  Bootstrap 5 Template" />
	<meta property="og:image" content="https://jobie.dexignzone.com/xhtml/social-image.png" />
	<meta name="format-detection" content="telephone=no">
    <title>{{gs()->title}}</title>
    <!-- Favicon icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/toastr.min.css') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front/') }}/images/favicon.png">
    <link href="{{ asset('front/') }}/css/style.css" rel="stylesheet">


</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                    <form  method="post" action="{{route('login')}}">@csrf
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control" value="{{old('email')}}" >
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control">
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('front/') }}/vendor/global/global.min.js"></script>
	<script src="{{ asset('front/') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('front/') }}/js/custom.min.js"></script>
    <script src="{{ asset('front/') }}/js/deznav-init.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

            @include('addions.alert')

</body>

</html>
