<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class Webcontroller extends Controller
{
   public function index(){
    return view('website.index');
   }

   public function about(){
    return view('website.about');
   }
}
