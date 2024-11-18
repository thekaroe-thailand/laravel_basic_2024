<?php

namespace App\Http\Controllers;


class BackOfficeController extends Controller {
    public function index() {
        return view('backoffice.index');
    }
}
