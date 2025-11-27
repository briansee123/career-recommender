@extends('layouts.app')

@section('title', 'Profile')

@push('styles')
<style>
    body {
        background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
        font-family: 'Segoe UI', sans-serif;
    }

    /* Navbar */
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
        font-weight: 500;
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
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        right: 0;
        margin-top: 10px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        padding: 10px 0;
        width: 150px;
    }

    /* Profile Container */
    .profile-container {
        width: 80%;
        max-width: 900px;
        margin: 40px auto;
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.12);
    }

    .section-title {
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
    }

    .input-box {
        margin-bottom: 18px;
    }

    .input-box label {
        font-weight: 600;
        display: block;
        margin-bottom: 5px;
    }

    .input-box input {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #aaa;
        outline: none;
    }

    .save-btn {
        width: 180px;
        padding: 12px;
        background: #6c63ff;
        color: white;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        margin-top: 10px;
    }

    .save-btn:hover {
        background: #554fff;
    }

    /* Resume */
    .resume-section,
    .history-section {
        margin-top: 40px;
    }

    .resume-upload {
        margin-bottom: 15px;
    }

    /* AI Agent Box (右下角) */
    .ai-box {
        position: fixed;
        bottom: 25px;
        right: 25px;
        width: 240px;
        padding: 20px;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.18);
    }

    .ai-box-title {
        font-weight: bold;
        margin-bottom: 10px;
        text-align: center;
    }

    .ai-box textarea {
        width: 100%;
        height: 70px;
        border-radius: 8px;
        border: 1px solid #aaa;
        padding: 10px;
    }

    .ai-btn {
        width: 100%;
        padding: 10px;
        background: #6c63ff;
        color: white;
        border: none;
        border-radius: 8px;
        margin-top: 10px;
        cursor: pointer;
    }
</style>
@endpush


@section('content')

{{-- Navigation Bar --}}
<div class="navbar">
    <div class="title">Career Path Recommender</div>

    <div class="nav-links">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('jobs.list') }}">More Jobs</a>
        <a href="{{ route('test.show') }}">Test Now</a>
    </div>

    <div class="user-dropdown">
        <div class="user-icon" onclick="toggleDropdown()">👤</div>

        <div class="dropdown-menu" id="dropdownMenu">
            <a href="{{ route('profile.show') }}">Profile</a>

            <form action="/user/login" method="GET">
                
                <button type="submit" style="width:100%; border:none; background:none; padding:10px;">Logout</button>
            </form>
        </div>
    </div>
</div>


<div class="profile-container">

    {{-- Personal Info --}}
    <div class="section-title">Personal Information</div>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf

        <div class="input-box">
            <label>Full Name</label>
            <input type="text" name="name" value="">
        </div>

        <div class="input-box">
            <label>Email</label>
            <input type="email" name="email" value="">
        </div>

        <button class="save-btn">Save Changes</button>
    </form>


    {{-- Resume --}}
    <div class="resume-section">
        <div class="section-title">Resume</div>

        <form action="{{ route('profile.uploadResume') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="file" name="resume" class="resume-upload">
            <button class="save-btn">Upload Resume</button>
        </form>
    </div>


    {{-- Test History --}}
    <div class="history-section">
        <div class="section-title">Personality Test History</div>

        <ul>
            <li>No test history yet</li>
        </ul>
    </div>


    {{-- Job Application History --}}
    <div class="history-section">
        <div class="section-title">Job Application History</div>

        <ul>
            <li>No applications yet</li>
        </ul>
    </div>

</div>


{{-- AI Agent (固定右下角) --}}
<div class="ai-box">
    <div class="ai-box-title">AI Assistant</div>

    <textarea placeholder="Ask AI to review your resume..."></textarea>

    <button class="ai-btn">Ask AI</button>
</div>

@endsection

@push('scripts')
<script>
function toggleDropdown() {
    let menu = document.getElementById('dropdownMenu');
    menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
}
</script>
@endpush
