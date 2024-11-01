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

Route::Get('/jobs/create', function () {
    return view('jobs.create');
});


Route::Get('/jobs/{id}', function ($id)   {
    $job = Job::find($id); // This now correctly references the Job model

    return view('jobs.show', ['job' => $job]);
});

  Route::post('/jobs' , function () {
  //validation

  job::create([
    'title' => request ('title'),
    'salary' => request ('salary'),
    'employer_id' => 1
  ]);

    return redirect('/jobs');
});
  

Route::Get('/contact', function () {
    return view('contact');
});
