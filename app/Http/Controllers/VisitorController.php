<?php

namespace App\Http\Controllers;

use App\Models\VisitorModel;
use Illuminate\Http\Request;

class VisitorController extends Controller
{

    public function index()
    {
        $data = VisitorModel::orderBy('id', 'desc')->take(500)->get();

        return view('pages.visitor.index', compact('data'));

    }


}
