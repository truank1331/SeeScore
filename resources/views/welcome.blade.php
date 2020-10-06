<!DOCTYPE html>
@extends('layouts.nav')

<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
    @if ($errors->any())
		    <div class="alert alert-danger">
		    	<strong>Whoops!</strong> กรุณาลองกรอกข้อมูลใหม่อีกครั้ง!
						<br/>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

        <!-- Icon Divider-->
        <img class="img-fluid" src="assets/img/portfolio/cpsu.ss.gif" alt="Log Cabin" />
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>


        <!-- Masthead Heading-->
        <h1 class="masthead-heading mb-0">SEESCORE</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="pre-wrap masthead-subheading font-weight-light mb-0"> Student - Teacher - Seescore</p>
    </div>
</header>



<section class="page-section portfolio" id="student">
    <div class="container">
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Section Heading-->
        <div class="text-center">
            <h2 class="page-section-heading text-secondary mb-0 d-inline-block">STUDENT</h2>
        </div>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center">
            <!-- Portfolio Items-->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal0">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white"><i
                                class="fas fa-plus fa-3x"></i></div>
                    </div><img class="img-fluid" src="assets/img/portfolio/student_register.png" alt="Log Cabin" />

                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white"><i
                                class="fas fa-plus fa-3x"></i></div>
                    </div><img class="img-fluid" src="assets/img/portfolio/student_login.png" alt="Tasty Cake" />
                </div>
            </div>


        </div>
    </div>
</section>

<!-- Portfolio Modal-->
<div class="portfolio-modal modal fade" id="portfolioModal0" tabindex="-1" role="dialog"
    aria-labelledby="#portfolioModal0Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                        class="fas fa-times"></i></span></button>
            <div class="modal-body text-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <!-- Portfolio Modal - Title-->
                            <h2 class="portfolio-modal-title text-secondary mb-0">Student Register</h2>
                            <!-- Icon Divider-->
                            <div class="divider-custom">
                                <div class="divider-custom-line"></div>
                                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                <div class="divider-custom-line"></div>
                            </div>
                            <div class="card-body">

                                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="studentid"
                                            class="col-md-4 col-form-label text-md-right">{{ __('รหัสนักศึกษา') }}</label>

                                        <div class="col-md-6">
                                            <input id="studentid" type="text"
                                                class="form-control @error('studentid') is-invalid @enderror"
                                                name="studentid" value="{{ old('studentid') }}" required
                                                autocomplete="studentid" autofocus>

                                            @error('studentid')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="thainame"
                                            class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ(ภาษาไทย)') }}</label>

                                        <div class="col-md-6">
                                            <input id="thainame" type="text"
                                                class="form-control @error('thainame') is-invalid @enderror"
                                                name="thainame" value="{{ old('thainame') }}" required
                                                autocomplete="thainame" autofocus>

                                            @error('thainame')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="thailastname"
                                            class="col-md-4 col-form-label text-md-right">{{ __('นามสกุล(ภาษาไทย)') }}</label>

                                        <div class="col-md-6">
                                            <input id="thailastname" type="text"
                                                class="form-control @error('thailastname') is-invalid @enderror"
                                                name="thailastname" value="{{ old('thailastname') }}" required
                                                autocomplete="thailastname" autofocus>

                                            @error('thailastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ(ภาษาอังกฤษ)') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lastname"
                                            class="col-md-4 col-form-label text-md-right">{{ __('นามสกุล(ภาษาอังกฤษ)') }}</label>

                                        <div class="col-md-6">
                                            <input id="lastname" type="text"
                                                class="form-control @error('lastname') is-invalid @enderror"
                                                name="lastname" value="{{ old('lastname') }}" required
                                                autocomplete="lastname" autofocus>

                                            @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address (@silpakorn.edu)') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Portfolio Modal - Text-->

                            <button class="btn btn-primary" href="#" data-dismiss="modal"><i
                                    class="fas fa-times fa-fw"></i>Close Window</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog"
    aria-labelledby="#portfolioModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                        class="fas fa-times"></i></span></button>
            <div class="modal-body text-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <!-- Portfolio Modal - Title-->
                            <h2 class="portfolio-modal-title text-secondary mb-0">STUDENT LOGIN</h2>
                            <!-- Icon Divider-->
                            <div class="divider-custom">
                                <div class="divider-custom-line"></div>
                                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                <div class="divider-custom-line"></div>
                            </div>

                            <!-- Portfolio Modal - Text-->

                            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                @csrf
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>

                                    <input id="email" placeholder="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input id="password" placeholder="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="row align-items-center remember">
                                    <input type="checkbox">Remember Me
                                </div>
                                <div class="col-md-8 offset-md-4">
                                    <input type="submit" value="Login" class="btn btn-primary">

                                </div>
                            </form>
                            <button class="btn btn-primary" href="#" data-dismiss="modal"><i
                                    class="fas fa-times fa-fw"></i>Close Window</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<section class="page-section portfolio bg-primary" id="teacher">
    <div class="container">
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Section Heading-->
        <div class="text-center">
            <h2 class="page-section-heading text-secondary mb-0 d-inline-block">TEACHER</h2>
        </div>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center">
            <!-- Portfolio Items-->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal11">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white"><i
                                class="fas fa-plus fa-3x"></i></div>
                    </div><img class="img-fluid" src="assets/img/portfolio/teacher_login.png" alt="Log Cabin" />
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Portfolio Modal-->
<div class="portfolio-modal modal fade" id="portfolioModal11" tabindex="-1" role="dialog"
    aria-labelledby="#portfolioModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i
                        class="fas fa-times"></i></span></button>
            <div class="modal-body text-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <!-- Portfolio Modal - Title-->
                            <h2 class="portfolio-modal-title text-secondary mb-0">TEACHER LOGIN</h2>
                            <!-- Icon Divider-->
                            <div class="divider-custom">
                                <div class="divider-custom-line"></div>
                                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                <div class="divider-custom-line"></div>
                            </div>

                            <form method="POST" action='{{ url("login/teacher") }}' aria-label="{{ __('Login') }}">

                                @csrf

                                <div class="form-group row">
                                    <label for="username"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                    <div class="col-md-6">
                                        <input id="username" type="text"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username') }}" required autocomplete="username" autofocus>

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                    </div>
                                </div>
                            </form>
                            <!-- Portfolio Modal - Text-->

                            <button class="btn btn-primary" href="#" data-dismiss="modal"><i
                                    class="fas fa-times fa-fw"></i>Close Window</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<section class="page-section" id="contact">
    <div class="container">
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Heading-->
        <div class="text-center">
            <h2 class="page-section-heading text-secondary d-inline-block mb-0">CONTACT</h2>
        </div>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Content-->
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="d-flex flex-column align-items-center">
                    <div class="icon-contact mb-3"><i class="fas fa-mobile-alt"></i></div>
                    <div class="text-muted">Phone</div>
                    <div class="lead font-weight-bold">08X-XXX-XXXX</div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex flex-column align-items-center">
                    <div class="icon-contact mb-3"><i class="far fa-envelope"></i></div>
                    <div class="text-muted">Email</div><a class="lead font-weight-bold"
                        href="mailto:name@example.com">cpsu.classroom@gmail.com</a>
                </div>
            </div>
        </div>
    </div>
</section>

@extends('layouts.footer')
