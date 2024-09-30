<?php

use Illuminate\Support\Facades\Route;
use app\models\job;



Route::Get('/', function () {
    return view(
        'Home',
    );
});

Route::Get('/jobs', function ()  {
    return view('jobs', [
        'jobs' =>  job ::all()
    ]);  
});

Route::Get('/jobs/{id}', function ($id)   {
              $job = job::find($id);


    return view('job', ['job' => $job]);
});

Route::Get('/contact', function () {
    return view('contact');
});