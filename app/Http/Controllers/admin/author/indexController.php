<?php

namespace App\Http\Controllers\admin\author;

use App\Models\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $data = Author::paginate(10);
        return view('admin.author.index', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.author.create');
    }
}
