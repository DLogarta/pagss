<?php
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckPermission;

// Landing Routes
require __DIR__.'/destination/landing.php';

// Authentication Routes
require __DIR__.'/destination/authentication.php';

// Dashboard Route
require __DIR__.'/destination/dashboard.php';

// Admin Panel Route
require __DIR__.'/destination/admin/admin-panel.php';

//Admin Panel Functions
require __DIR__.'/destination/admin/admin-panel-functions.php';

//Content Moderation Route
require __DIR__.'/destination/content-moderation/content-moderation.php';

//Content Moderation Functions
require __DIR__.'/destination/content-moderation/content-moderation-functions.php';