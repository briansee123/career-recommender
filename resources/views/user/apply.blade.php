@extends('layouts.app')

@section('title', 'Apply Job')

@push('styles')
<style>

    body {
        background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
        font-family: 'Segoe UI', sans-serif;
    }

    .navbar {
        width: 100%;
        padding: 15px 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: white;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .navbar .title {
        font-size: 22px;
        font-weight: bold;
        color: #333;
    }

    .nav-links a {
        margin: 0 15px;
        font-size: 16px;
        color: #333;
        text-decoration: none;
    }

    .nav-links a:hover {
        color: #6c63ff;
    }

    .user-dropdown {
        position: relative;
        display: inline-block;
    }

    .user-icon {
        width: 40px;
        height: 40px;
        background: #6c63ff;
        color: white;
        border-radius: 50%;
        display:flex;
        justify-content:center;
        align-items:center;
        cursor:pointer;
    }

    .dropdown-menu {
        display:none;
        position:absolute;
        right:0;
        margin-top:10px;
        background:white;
        width:150px;
        border-radius:8px;
        padding:10px;
        box-shadow:0px 4px 15px rgba(0,0,0,0.15);
    }

    /* Main Apply Container */
    .apply-container {
        width: 90%;
        max-width: 900px;
        margin: 40px auto;
        background: white;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.12);
    }

    .section-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
        text-align:center;
    }

    .form-section {
        margin-bottom: 40px;
    }

    .input-box {
        margin-bottom: 18px;
    }

    .input-box label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    .input-box input, .input-box textarea {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #aaa;
    }

    .submit-btn {
        width: 100%;
        padding: 14px;
        background: #6c63ff;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 18px;
        margin-top: 20px;
        transition: 0.3s;
    }

    .submit-btn:hover {
        background: #554fff;
    }

    .resume-box {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
    }

    .resume-link {
        color: #6c63ff;
        font-weight:bold;
        text-decoration:none;
    }

</style>
@endpush


@section('content')

{{-- Navigation --}}
<div class="navbar">
    <div class="title">Career Path Recommender</div>

    <div class="nav-links">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('jobs.list') }}">More Jobs</a>
        <a href="{{ route('test.show') }}">Test Now</a>
    </div>

    <div class="user-dropdown">
        <div class="user-icon" onclick="toggleDropdown()">👤</div>

        <div id="dropdownMenu" class="dropdown-menu">
            <a href="{{ route('profile.show') }}">Profile</a>

<form action="/user/login" method="GET">
    <button type="submit" style="width:100%; padding:10px; background:none; border:none;">Logout</button>
</form>

        </div>
    </div>
</div>



<div class="apply-container">

    <div class="section-title">Job Application Form</div>

    {{-- Job Summary (future dynamic) --}}
    <div class="resume-box">
        <strong>Applying for:</strong><br>
        <span style="color:#333;">Selected Job Title (Dynamic Later)</span>
    </div>

    {{-- Resume section --}}
    <div class="resume-box">
        <strong>Your Resume:</strong><br>
        <span>No resume uploaded yet.</span><br><br>
        <a href="{{ route('resume.builder') }}" class="resume-link">Build Resume Now</a>
    </div>


    {{-- Apply Form --}}
    <form action="{{ route('job.submitApplication', 1) }}" method="POST">
        @csrf

        <div class="form-section">

            <div class="input-box">
                <label>Full Name</label>
                <input type="text" name="fullname" placeholder="Enter your name" required>
            </div>

            <div class="input-box">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email address" required>
            </div>

            <div class="input-box">
                <label>Phone Number</label>
                <input type="text" name="phone" placeholder="Your phone number" required>
            </div>

            <div class="input-box">
                <label>Short Introduction</label>
                <textarea name="summary" rows="4" placeholder="Tell us about yourself..."></textarea>
            </div>

        </div>

        <button class="submit-btn">Submit Application</button>

    </form>

</div>

@endsection


@push('scripts')
<script>
function toggleDropdown() {
    let m = document.getElementById('dropdownMenu');
    m.style.display = (m.style.display === "block") ? "none" : "block";
}
</script>
@endpush
