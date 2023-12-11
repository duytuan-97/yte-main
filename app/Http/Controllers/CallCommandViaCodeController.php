<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class CallCommandViaCodeController extends Controller
{
    //
    public function clear_cache(){
        Artisan::call('optimize:clear');
        dd("clear cache");
    }

    public function create_storage(){
        Artisan::call('storage:link');
        dd("create storage");
    }
}
