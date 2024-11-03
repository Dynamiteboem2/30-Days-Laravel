<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail; // Correct import for Mail facade
use App\Mail\JobPosted; // Import the JobPosted mailable

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);
        
        return view('jobs.index', [ 
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => 'required'
        ]);

        // Create job
     $job =  Job::create([
           'title' => $request->input('title'),
           'salary' => $request->input('salary'),
            'employer_id' => 1 // Adjust this as needed
        ]);
       
        Mail::to($job->employer->user)->queue(
            new JobPosted($job)
        );

        // Redirect to the jobs index page
        return redirect('/jobs');
    }

    public function edit(Job $job)
    {

        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Request $request, Job $job)
    {
        // Validate
        $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => 'required'
        ]);

        // Update job
        $job->update([
            'title' => $request->input('title'),
            'salary' => $request->input('salary')
        ]);

        // Redirect to the job page
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        Gate::authorized ('edit-job', $job);
        // Delete the job
        $job->delete();

        return redirect('/jobs');
    }
}

