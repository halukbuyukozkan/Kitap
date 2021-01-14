<?php

namespace App\Http\Controllers\admin\author;

use App\Models\Author;
use App\Helper\mHelper;
use App\Helper\imageUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);
        $all['image'] = imageUpload::singleUpload(rand(1, 9000), "author", $request->file('image'));
        $insert = Author::create($all);
        if ($insert) {
            return redirect()->back()->with('status', 'Yazar eklendi');
        } else {
            return redirect()->back()->with('status', 'Yazar eklenemedi');
        }
    }
}
