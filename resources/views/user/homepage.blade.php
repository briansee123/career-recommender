@extends('layouts.app')

@section('title', 'Homepage')

@push('styles')
<style>
    body {
        background: linear-gradient(135deg, #c3cfe2 0%, #f5f7fa 100%);
        font-family: 'Segoe UI', sans-serif;
    }

    /* Header Navigation */
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

    .dropdown-menu a {
        display: block;
        padding: 10px 15px;
        color: #333;
        font-size: 15px;
        text-decoration: none;
    }

    .dropdown-menu a:hover {
        background: #f2f2f2;
    }

    /* Job Card */
    .job-section {
        width: 90%;
        max-width: 1000px;
        margin: 40px auto;
    }

    .job-title {
        font-size: 26px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }

    .job-list {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
    }

    .job-card {
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.12);
        transition: 0.3s ease;
    }

    .job-card:hover {
        transform: translateY(-3px);
    }

    .job-card h3 {
        margin-bottom: 10px;
        font-size: 18px;
        color: #222;
    }

    .job-card p {
        font-size: 14px;
        color: #555;
        margin-bottom: 12px;
    }

    .job-card a {
        background: #6c63ff;
        color: white;
        padding: 8px 12px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
    }

    .job-card a:hover {
        background: #554fff;
    }

    /* Test button */
    .test-button-container {
        text-align: center;
        margin: 40px 0;
    }

    .test-btn {
        background: #6c63ff;
        color: white;
        padding: 14px 28px;
        font-size: 18px;
        border-radius: 8px;
        text-decoration: none;
        transition: 0.3s;
    }

    .test-btn:hover {
        background: #554fff;
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

                @csrf
                <button type="submit" style="width:100%; border:none; background:none; padding:10px 15px; text-align:left; cursor:pointer;">
                    Logout
                </button>
            </form>
        </div>
    </div>
</div>


{{-- Job Section --}}
<div class="job-section">
    <div class="job-title">Recommended Jobs For You</div>

    <div class="job-list">

        {{-- Example job cards (these will be dynamic later) --}}
        <div class="job-card">
            <h3>Software Developer</h3>
            <p>Build systems, websites, and applications.</p>
            <a href="{{ route('job.show', 1) }}">Learn More</a>
        </div>

        <div class="job-card">
            <h3>Data Analyst</h3>
            <p>Analyze data and generate insights.</p>
            <a href="{{ route('job.show', 2) }}">Learn More</a>
        </div>

        <div class="job-card">
            <h3>UI/UX Designer</h3>
            <p>Design user-friendly interfaces and experiences.</p>
            <a href="{{ route('job.show', 3) }}">Learn More</a>
        </div>

    </div>
</div>

{{-- Test Button --}}
<div class="test-button-container">
    <a class="test-btn" href="{{ route('test.show') }}">Test Your Personality Now!</a>
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
