@extends('layouts.admin')

@section('title', 'Admin Profile')

@push('styles')
<style>

    .profile-container {
        width: 90%;
        max-width: 650px;
        background: white;
        padding: 30px;
        border-radius: 16px;
        margin: 20px auto;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .profile-title {
        font-size: 26px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }

    .profile-photo {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        background: #6c63ff;
        display:flex;
        align-items:center;
        justify-content:center;
        color:white;
        font-size: 40px;
        margin: 0 auto 20px;
    }

    .input-box {
        margin-bottom: 20px;
    }

    .input-box label {
        font-weight:bold;
        display:block;
        margin-bottom:5px;
    }

    .input-box input {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #aaa;
    }

    .save-btn {
        width: 100%;
        padding: 14px;
        border:none;
        border-radius: 10px;
        background: #6c63ff;
        font-size: 18px;
        color:white;
        cursor:pointer;
        transition: 0.3s;
    }

    .save-btn:hover {
        background:#554fff;
    }

    .level-box {
        text-align:center;
        background:#f1f1f1;
        padding: 10px;
        border-radius:8px;
        margin-bottom:20px;
        font-weight:bold;
        color:#444;
    }

</style>
@endpush


@section('content')

<div class="profile-container">

    <div class="profile-title">Admin Profile</div>

    {{-- Admin circle icon --}}
    <div class="profile-photo">
        👤
    </div>

    {{-- Admin level --}}
    <div class="level-box">
        Admin Level: <span style="color:#6c63ff;">Super Admin</span>
    </div>

    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="input-box">
            <label>Full Name</label>
            <input type="text" value="Admin Master">
        </div>

        <div class="input-box">
            <label>Email</label>
            <input type="email" value="admin@example.com">
        </div>

        <div class="input-box">
            <label>Change Profile Photo</label>
            <input type="file">
        </div>

        <button class="save-btn">Save Changes</button>

    </form>

</div>

@endsection
