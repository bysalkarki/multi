<?php

namespace Modules\Hospital\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('hospital::index');
    }
}
