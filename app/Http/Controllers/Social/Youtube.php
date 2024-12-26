<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Youtube extends Controller
{
    //
    public function index() {
        return view('ADM_profile.youtube', [
            'current_page' => 'Youtube',
            'bread_action' => [
                'url' => route('dashboard'),
                'text' => "Youtube"
            ],
            
        ]);
    
    }
}
