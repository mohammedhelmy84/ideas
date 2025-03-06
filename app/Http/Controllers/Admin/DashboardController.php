<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index(){
        // if(!Gate::allows('admin')){
        //     return abort(403);
        // }
        // $this->authorize('admin');
        return view('admin.dashboard');
    }
}
