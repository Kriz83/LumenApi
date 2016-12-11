<?php namespace App\Http\Controllers;

class ViewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        return view('view');
    }

}
