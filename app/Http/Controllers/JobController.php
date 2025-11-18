<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Show all jobs (Admin Page)
    public function index()
    {
        $jobs = Job::all();
        return view('admin.jobs', compact('jobs'));
    }

    // Show create form
    public function create()
    {
        return view('admin.job_create');
    }

    // Store new job
    public function store(Request $request)
    {
        Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'salary' => $request->salary,
            'location' => $request->location,
        ]);

        return redirect()->route('admin.jobs')->with('success', 'Job added successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.job_edit', compact('job'));
    }

    // Update job
    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        $job->update([
            'title' => $request->title,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'salary' => $request->salary,
            'location' => $request->location,
        ]);

        return redirect()->route('admin.jobs')->with('success', 'Job updated!');
    }

    // Delete job
    public function delete($id)
    {
        Job::findOrFail($id)->delete();

        return redirect()->route('admin.jobs')->with('success', 'Job deleted!');
    }
}
