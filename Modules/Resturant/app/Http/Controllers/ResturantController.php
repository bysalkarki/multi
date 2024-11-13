<?php

namespace Modules\Resturant\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResturantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('resturant::index');
    }
}
