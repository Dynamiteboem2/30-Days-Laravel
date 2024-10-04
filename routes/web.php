<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::Get('/', function () {

   $jobs =  job::all();

   dd($jobs);

  //  return view('Home');
});




Route::Get('/jobs', function ()  {
    return view('jobs', [ 
        'jobs' => Job::all()
    ]);
});

Route::Get('/jobs/{id}', function ($id)   {
    $job = Job::find($id); // This now correctly references the Job model

    return view('job', ['job' => $job]);
});

Route::Get('/contact', function () {
    return view('contact');
});
