<?php

namespace estoque\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
}
