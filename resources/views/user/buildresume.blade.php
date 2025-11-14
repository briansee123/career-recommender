@extends('layouts.app')

@section('title', 'Build Your Resume')

@push('styles')
<style>

    body {
        background: linear-gradient(135deg, #d7e1ec 0%, #fefefe 100%);
        font-family: 'Segoe UI', sans-serif;
    }

    /* Header */
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
    }

    .nav-links a {
        margin: 0 15px;
        font-size: 16px;
        text-decoration: none;
        color: #333;
    }

    .nav-links a:hover {
        color: #6c63ff;
    }

    /* Resume Container */
    .resume-container {
        width: 90%;
        max-width: 900px;
        margin: 40px auto;
        background: white;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    }

    .section-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
        text-align:center;
    }

    .input-box {
        margin-bottom: 20px;
    }

    .input-box label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    .input-box input, .input-box textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #aaa;
        border-radius: 8px;
    }

    .submit-btn {
        width: 100%;
        padding: 14px;
        background: #6c63ff;
        color: white;
        border-radius: 8px;
        font-size: 18px;
        cursor:pointer;
        border:none;
        margin-top: 20px;
    }

    .submit-btn:hover {
        background:#554fff;
    }

</style>
@endpush


@section('content')

{{-- Header --}}
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
    <button style="border:none; background:none; padding:10px;">Logout</button>
</form>

        </div>
    </div>
</div>


<div class="resume-container">

    <div class="section-title">Resume Builder</div>

    <form action="{{ route('resume.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Personal Information --}}
        <div class="input-box">
            <label>Full Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="input-box">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="input-box">
            <label>Phone Number</label>
            <input type="text" name="phone" required>
        </div>

        <div class="input-box">
            <label>Upload Profile Photo</label>
            <input type="file" name="photo">
        </div>

        {{-- Summary --}}
        <div class="input-box">
            <label>Professional Summary</label>
            <textarea name="summary" rows="3" placeholder="Write a short introduction"></textarea>
        </div>

        {{-- Skills --}}
        <div class="input-box">
            <label>Skills</label>
            <textarea name="skills" rows="3" placeholder="List your skills (e.g., HTML, CSS, Teamwork)"></textarea>
        </div>

        {{-- Experience --}}
        <div class="input-box">
            <label>Work Experience</label>
            <textarea name="experience" rows="4" placeholder="Example: Company name, role, year"></textarea>
        </div>

        {{-- Education --}}
        <div class="input-box">
            <label>Education</label>
            <textarea name="education" rows="3" placeholder="Example: Diploma in IT (2024)"></textarea>
        </div>

        {{-- Submit --}}
        <button class="submit-btn">Generate Resume</button>

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
