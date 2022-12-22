<?php

use Illuminate\Support\Facades\Route;


// License
Route::get('/', StartComponent::class);

// Requirements
Route::get('requirements', RequirementsComponent::class);

// Database
Route::get('database', DatabaseComponent::class);

// Administrator
Route::get('administrator', AdministratorComponent::class);

// Crontab
Route::get('crontab', CrontabComponent::class);

// Finish
Route::get('finish', FinishComponent::class);