<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::Get('/', function () {

   $jobs =  job::all();



    return view('Home');
});


Route::Get('/jobs', function ()  {
    $jobs = job:: with ('employer')->latest()->simplePaginate(3);

    return view('jobs.index', [ 
        'jobs' => $jobs
    ]);
});

//Create
Route::Get('/jobs/create', function () {
    return view('jobs.create');
});

// Show
Route::Get('/jobs/{id}', function ($id)   {
    $job = Job::find($id); // This now correctly references the Job model

    return view('jobs.show', ['job' => $job]);
});

// Store
  Route::post('/jobs' , function () {
  request()->validate([
    'title' => ['required', 'min:3'],
    'salary' => 'required'
  ]);

  job::create([
    'title' => request ('title'),
    'salary' => request ('salary'),
    'employer_id' => 1
  ]);

    return redirect('/jobs');
});

// Edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::findOrFail($id); // Correctly references the Job model

    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{id}', function ($id) {
    // Validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => 'required'
    ]);

    // Authorize

    // Update job
    $job = Job::findOrFail($id); // Correct method name

    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    // Redirect to the job page
    return redirect("/jobs/{$id}");
});

// Destroy
Route::delete('/jobs/{id}', function ($id) {
    // Authorize

    // Delete the job
    $job = Job::findOrFail($id); // Correct method name
    $job->delete();

    return redirect('/jobs');
});
  

Route::Get('/contact', function () {
    return view('contact');
});
