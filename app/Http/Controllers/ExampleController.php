<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * index
     *
     * @return void
     */
    public function index() {

        $data['status'] = 'OK';
        $data['result'] = 'Welcome to Binar Test';
        $data['errors'] = null;

        return response()->json($data);
    }


}
