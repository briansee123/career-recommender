@extends('layouts.app')

@section('title', 'Personality Test')

@push('styles')
<style>
    body {
        background: linear-gradient(135deg, #e0c3fc 0%, #8ec5fc 100%);
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
        font-weight: 500;
        transition: 0.3s;
    }

    .nav-links a:hover {
        color: #6c63ff;
    }

    .user-icon {
        width: 40px;
        height: 40px;
        background: #6c63ff;
        color: white;
        border-radius: 50%;
        display:flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .dropdown-menu {
        display:none;
        position:absolute;
        right:0;
        margin-top:10px;
        background:white;
        padding:10px;
        border-radius:8px;
        width:150px;
        box-shadow:0 4px 15px rgba(0,0,0,0.2);
    }

    .test-container {
        width: 80%;
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

    .question {
        margin-bottom: 20px;
    }

    .question label {
        font-weight: 600;
        display: block;
        margin-bottom: 6px;
    }

    .question input, .question select {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #aaa;
    }

    .submit-btn {
        width: 100%;
        background: #6c63ff;
        padding: 14px;
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
                
                <button type="submit" style="width:100%; border:none; background:none; padding:10px;">Logout</button>
            </form>
        </div>
    </div>
</div>


{{-- Test Container --}}
<div class="test-container">
    <div class="section-title">Personality & Career Assessment</div>

    <form action="{{ route('test.submit') }}" method="POST">
        @csrf

        {{-- Example Question 1 --}}
        <div class="question">
            <label>Your strongest skill:</label>
            <input type="text" name="skill" placeholder="Example: coding, drawing, analysis" required>
        </div>

        {{-- Example Question 2 --}}
        <div class="question">
            <label>Your education background:</label>
            <input type="text" name="education" placeholder="Example: Diploma in IT, SPM, Degree in Business" required>
        </div>

        {{-- Example Question 3 --}}
        <div class="question">
            <label>What type of work environment do you like?</label>
            <select name="environment" required>
                <option value="">Select...</option>
                <option>Quiet & Focused</option>
                <option>Team Collaboration</option>
                <option>Fast-paced & High Energy</option>
                <option>Creative & Flexible</option>
            </select>
        </div>

        {{-- Example Question 4 --}}
        <div class="question">
            <label>Describe your personality:</label>
            <input type="text" name="personality" placeholder="Example: introvert, extrovert, logical" required>
        </div>

        <button class="submit-btn">Show My Result</button>
    </form>
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
