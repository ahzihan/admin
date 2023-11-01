<?php

namespace App\Http\Controllers;

use App\Models\VisitorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VisitorController extends Controller
{

    public function index()
    {
        Gate::authorize('index-visitor');

        $data = VisitorModel::orderBy('id', 'desc')->take(500)->get();

        return view('pages.visitor.index', compact('data'));

    }


}
