@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('ส่ง Verify ไปยัง Email แล้ว') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('ถ้าคุณยังไม่ได้รับ Email') }}, <a href="{{ route('verification.resend') }}">{{ __('กดที่นี่เพื่อส่งอีกครั้งไปยัง ') }}</a><b>{{ Auth::user()->email }}</b> .
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
