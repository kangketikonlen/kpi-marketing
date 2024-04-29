<?php

namespace App\Http\Controllers;

class HealthCheckController extends Controller
{
    public function index(): string
    {
        return response()->json(['status' => 'ok']);
    }
}
