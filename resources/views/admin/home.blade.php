@extends('layouts.nav_admin')


<!DOCTYPE html>
<html>
<main class="py-4">
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image--><img class="masthead-avatar mb-5" src="assets/img/avataaars_admin.svg" alt="">
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Heading-->
            <h1 class="masthead-heading mb-0">Welcome Admin</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="pre-wrap masthead-subheading font-weight-light mb-0">Classroom Assessment Information System for
                Lecturers and Students&nbsp;<br>Case Study: Department of Computing, Faculty of Science, Silpakorn
                University</p>
        </div>
    </header>
    <section class="page-section portfolio" id="manageteacher">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="text-center">
                <h2 class="page-section-heading text-secondary mb-0 d-inline-block">MANAGE TEACHER</h2>
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

                @for($i=0;$i<$count;$i++) <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Teacher</div>
                                <div class="card-body">
                                    <h6>อาจารย์ {{$data[$i]->name}}  {{$data[$i]->sname}}</h6><br>
                                    Username : {{$data[$i]->username}}<br>
                                    CreateBy : {{$data[$i]->createby}}<br>
                                    <th>
                                    </th>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            @endfor
        </div>
        </div>
    </section>
    <section class="page-section bg-primary text-white mb-0" id="addteacher">
        <div class="container">
            <!-- About Section Heading-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="text-center">
                <h2 class="page-section-heading d-inline-block text-white">ADD TEACHER</h2>
            </div>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Content-->
            <div class="row justify-content-center">
            <form method="POST" action='{{ route("admin.add") }}' aria-label="{{ __('Register') }}">

@csrf

<div class="form-group row md-12">
<label for="name" class="col-md-8 col-form-label text-md-right">{{ __('Name') }}</label>

<div class="col-md-12">
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>

<div class="form-group row">
<label for="sname" class="col-md-8 col-form-label text-md-right">{{ __('SurName') }}</label>

<div class="col-md-12">
    <input id="sname" type="text" class="form-control @error('sname') is-invalid @enderror" name="sname" value="{{ old('sname') }}" required autocomplete="sname" autofocus>

    @error('sname')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>

<div class="form-group row">
<label for="username" class="col-md-8 col-form-label text-md-right">{{ __('Email') }}</label>

<div class="col-md-12">
    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

    @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>

<div class="form-group row">
<label for="password" class="col-md-8 col-form-label text-md-right">{{ __('Password') }}</label>

<div class="col-md-12">
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>

<div class="form-group row">
<label for="password-confirm" class="col-md-8 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

<div class="col-md-12">
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
</div>
</div>

<div class="form-group row mb-0">
<div class="col-md-12 offset-md-4">
    <button type="submit" class="btn btn-primary">
        {{ __('ADD') }}
    </button>
</div>
</div>
</form>
            </div>
        </div>
    </section>

    @extends('layouts.footer')

</main>

</html>
