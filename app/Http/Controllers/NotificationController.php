<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function store(Request $request)
    {
      
        Session::flash('message-success', 'The hospital has been created'); 
        return $this->index();
    }
}
