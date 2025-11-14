@extends('layouts.admin')

@section('title', 'Job Management')

@push('styles')
<style>

    .top-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .page-title {
        font-size: 26px;
        font-weight: bold;
    }

    .add-btn {
        background: #6c63ff;
        padding: 10px 20px;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-size: 16px;
    }

    .add-btn:hover {
        background: #554fff;
    }

    /* Search + Filters */
    .search-box input {
        width: 260px;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #aaa;
    }

    .filter-grid {
        display: flex;
        gap: 20px;
        margin-top: 15px;
    }

    .filter-grid select {
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #aaa;
        width: 200px;
    }

    /* Table */
    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 12px;
        overflow: hidden;
        margin-top: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    th {
        background: #6c63ff;
        color: white;
        padding: 14px;
        text-align: left;
    }

    td {
        padding: 14px;
        border-bottom: 1px solid #ddd;
        font-size: 15px;
    }

    .status-active { color: green; font-weight: bold; }
    .status-blocked { color: red; font-weight: bold; }
    .status-pending { color: orange; font-weight: bold; }

    .btn-action {
        padding: 6px 12px;
        font-size: 13px;
        border-radius: 6px;
        color: white;
        text-decoration: none;
        margin-right: 6px;
        display: inline-block;
    }

    .edit { background: #17a2b8; }
    .block { background: #dc3545; }
    .delete { background: #6c757d; }

    .btn-action:hover {
        opacity: 0.85;
    }

</style>
@endpush


@section('content')

<div class="top-section">
    <div class="page-title">Job Management</div>
    <a class="add-btn" href="#">+ Add New Job</a>
</div>

{{-- Search --}}
<div class="search-box">
    <input type="text" placeholder="Search job...">
</div>

{{-- Filters --}}
<div class="filter-grid">
    <select>
        <option>Filter by Status</option>
        <option>Active</option>
        <option>Blocked</option>
        <option>Pending</option>
    </select>

    <select>
        <option>Filter by Company</option>
        <option>Google</option>
        <option>Grab</option>
        <option>Local SME</option>
    </select>

    <select>
        <option>Filter by Location</option>
        <option>Kuala Lumpur</option>
        <option>Selangor</option>
        <option>Penang</option>
        <option>Johor</option>
    </select>
</div>

{{-- Job Table --}}
<table>
    <tr>
        <th>ID</th>
        <th>Job Title</th>
        <th>Company</th>
        <th>Location</th>
        <th>Status</th>
        <th>Last Updated</th>
        <th>Actions</th>
    </tr>

    {{-- Example data (future dynamic) --}}
    <tr>
        <td>1</td>
        <td>Software Developer</td>
        <td>Google</td>
        <td>Kuala Lumpur</td>
        <td class="status-active">Active</td>
        <td>2025-01-03</td>
        <td>
            <a class="btn-action edit" href="#">Edit</a>
            <a class="btn-action block" href="#">Block</a>
            <a class="btn-action delete" href="#">Delete</a>
        </td>
    </tr>

    <tr>
        <td>2</td>
        <td>Graphic Designer</td>
        <td>Apple</td>
        <td>Penang</td>
        <td class="status-blocked">Blocked</td>
        <td>2025-01-01</td>
        <td>
            <a class="btn-action edit" href="#">Edit</a>
            <a class="btn-action block" href="#">Unblock</a>
            <a class="btn-action delete" href="#">Delete</a>
        </td>
    </tr>

    <tr>
        <td>3</td>
        <td>Admin Assistant</td>
        <td>Local SME</td>
        <td>Johor</td>
        <td class="status-pending">Pending</td>
        <td>2024-12-30</td>
        <td>
            <a class="btn-action edit" href="#">Review</a>
            <a class="btn-action delete" href="#">Delete</a>
        </td>
    </tr>

</table>

@endsection
