<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::Get('/', function () {

   $jobs =  job::all();



    return view('Home');
});


Route::Get('/jobs', function ()  {
    $jobs = job:: with ('employer')->cursorPaginate(3);

    return view('jobs', [ 
        'jobs' => $jobs
    ]);
});

Route::Get('/jobs/{id}', function ($id)   {
    $job = Job::find($id); // This now correctly references the Job model

    return view('job', ['job' => $job]);
});

Route::Get('/contact', function () {
    return view('contact');
});
