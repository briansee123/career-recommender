@extends('layouts.app')

@section('title', 'Sign Up')

@push('styles')
<style>
    body {
        background: linear-gradient(135deg, #FFDEE9 0%, #B5FFFC 100%);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .signup-container {
        width: 420px;
        padding: 30px;
        margin: 70px auto;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        position: relative;
        z-index: 2;
    }

    .signup-title {
        text-align: center;
        font-size: 26px;
        margin-bottom: 20px;
        font-weight: bold;
        color: #333;
    }

    .input-box {
        margin-bottom: 18px;
    }

    .input-box label {
        font-weight: 600;
        color: #444;
    }

    .input-box input {
        width: 100%;
        padding: 12px;
        margin-top: 6px;
        border-radius: 8px;
        border: 1px solid #ccc;
        outline: none;
        transition: 0.3s;
    }

    .input-box input:focus {
        border-color: #6c63ff;
        box-shadow: 0px 0px 5px rgba(108,99,255,0.3);
    }

    .btn-signup {
        width: 100%;
        padding: 12px;
        background: #6c63ff;
        border: none;
        color: white;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
        margin-top: 10px;
    }

    .btn-signup:hover {
        background: #554fff;
    }

    .login-link {
        text-align: center;
        margin-top: 15px;
        font-size: 14px;
    }

    .login-link a {
        color: #6c63ff;
        font-weight: bold;
        text-decoration: none;
    }

    .login-link a:hover {
        text-decoration: underline;
    }

    /* Background circles */
    .circle1, .circle2, .circle3 {
        position: absolute;
        border-radius: 50%;
        opacity: 0.35;
        z-index: 1;
    }

    .circle1 {
        width: 260px;
        height: 260px;
        background: #ff9a9e;
        top: -80px;
        left: -80px;
    }

    .circle2 {
        width: 300px;
        height: 300px;
        background: #a1c4fd;
        bottom: -100px;
        right: -120px;
    }

    .circle3 {
        width: 180px;
        height: 180px;
        background: #fbc2eb;
        top: 300px;
        left: -60px;
    }
</style>
@endpush

@section('content')
<div class="circle1"></div>
<div class="circle2"></div>
<div class="circle3"></div>

<div class="signup-container">
    <div class="signup-title">Create Account</div>

    <form action="{{ route('signup.post') }}" method="POST">
        @csrf

        <div class="input-box">
            <label>Full Name</label>
            <input type="text" name="name" placeholder="Enter your full name" required>
        </div>

        <div class="input-box">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="input-box">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>
        </div>

        <div class="input-box">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="Confirm your password" required>
        </div>

        <button class="btn-signup">Sign Up</button>

        <div class="login-link">
            Already have an account?
            <a href="{{ route('login') }}">Login</a>
        </div>
    </form>
</div>
@endsection
