@extends('layouts.app')

@section('title', 'Job Listings')

@push('styles')
<style>
    body {
        background: linear-gradient(135deg, #dfe9f3 0%, #ffffff 100%);
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
        border-radius:8px;
        padding:10px;
        width:150px;
        box-shadow:0 4px 15px rgba(0,0,0,0.2);
    }


    /* Job List Layout */
    .container {
        width: 90%;
        max-width: 1100px;
        margin: 40px auto;
    }

    .page-title {
        font-size: 28px;
        font-weight: bold;
        text-align:center;
        margin-bottom: 25px;
        color: #333;
    }

    /* Filter Box */
    .filter-box {
        display: flex;
        gap: 20px;
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.12);
        margin-bottom: 30px;
    }

    .filter-box select {
        padding: 12px;
        width: 200px;
        border-radius: 8px;
        border: 1px solid #aaa;
    }

    .job-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
    }

    .job-card {
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        transition: 0.3s ease;
    }

    .job-card:hover {
        transform: translateY(-3px);
    }

    .job-card h3 {
        font-size: 18px;
        color: #222;
        margin-bottom: 10px;
    }

    .job-card p {
        color: #555;
        margin-bottom: 10px;
        font-size: 14px;
    }

    .apply-btn {
        background: #6c63ff;
        padding: 8px 12px;
        color:white;
        text-decoration:none;
        border-radius:8px;
        font-size: 14px;
        transition:0.3s;
    }

    .apply-btn:hover {
        background:#554fff;
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
    <button type="submit" style="width:100%; background:none; border:none; padding:10px;">Logout</button>
</form>

        </div>
    </div>
</div>


{{-- Content --}}
<div class="container">

    <div class="page-title">Explore Job Opportunities</div>

    {{-- Filter Section --}}
    <div class="filter-box">
        <select>
            <option value="">Salary Range</option>
            <option>RM1500 - RM2500</option>
            <option>RM2500 - RM3500</option>
            <option>RM3500 - RM5000</option>
            <option>RM5000+</option>
        </select>

        <select>
            <option value="">Job Type</option>
            <option>Full Time</option>
            <option>Part Time</option>
            <option>Remote</option>
            <option>Internship</option>
        </select>

        <select>
            <option value="">Date Posted</option>
            <option>Today</option>
            <option>Last 3 Days</option>
            <option>Last 7 Days</option>
            <option>Last 30 Days</option>
        </select>

        <select>
            <option value="">Location</option>
            <option>Kuala Lumpur</option>
            <option>Selangor</option>
            <option>Johor</option>
            <option>Penang</option>
        </select>
    </div>


    {{-- Job List --}}
    <div class="job-grid">

        {{-- Example Cards (future dynamic) --}}
        <div class="job-card">
            <h3>Junior Software Developer</h3>
            <p>Build and maintain systems & websites.</p>
            <a class="apply-btn" href="{{ route('job.apply', 1) }}">Apply Now</a>
        </div>

        <div class="job-card">
            <h3>Graphic Designer</h3>
            <p>Create visual content & modern graphics.</p>
            <a class="apply-btn" href="{{ route('job.apply', 2) }}">Apply Now</a>
        </div>

        <div class="job-card">
            <h3>Admin Assistant</h3>
            <p>Manage documents and office tasks.</p>
            <a class="apply-btn" href="{{ route('job.apply', 3) }}">Apply Now</a>
        </div>

    </div>

</div>
@endsection


@push('scripts')
<script>
function toggleDropdown() {
    let menu = document.getElementById('dropdownMenu');
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
}
</script>
@endpush
