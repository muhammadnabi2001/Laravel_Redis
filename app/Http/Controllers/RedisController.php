<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    public function index()
    {
        $models = Redis::get('users');
       // $models = User::all();
    //    dd($models);
        if (!$models) {
            $models = User::all();
            Redis::set('users', $models);
            Redis::expire('users', 120);
        }
        return view('Redis.redis');
    }
}
