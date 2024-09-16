<?php

use Illuminate\Support\Facades\Route;

Route::Get('/', function () {
    return view(
        'Home',
    );
});

Route::Get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,00',
            ],

            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '100,000'
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '40,000'
            ]
        ]
    ]);
});

Route::Get('/jobs/{id}', function ($id) {
    $jobs = [
        [
            'id' => 1,
            'title' => 'Director',
            'salary' => '$50,00',
        ],

        [
            'id' => 2,
            'title' => 'Programmer',
            'salary' => '100,000'
        ],
        [
            'id' => 3,
            'title' => 'Teacher',
            'salary' => '40,000'
        ]
    ];

    $job = Arr::First($jobs, fn($job) => $job['id'] == $id);


    return view('job', ['job' => $job]);
});

Route::Get('/contact', function () {
    return view('contact');
});