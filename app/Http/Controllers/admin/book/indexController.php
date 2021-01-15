<?php

namespace App\Http\Controllers\admin\book;

use App\Models\Book;
use App\Models\Author;
use App\Helper\mHelper;
use App\Models\Publisher;
use App\Helper\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function index()
    {
        $data = Book::paginate(10);
        return view('admin.book.index', ['data' => $data]);
    }

    public function create()
    {
        $author = Author::all();
        $publisher = Publisher::all();
        return view('admin.book.create', ['author' => $author, 'publisher' => $publisher]);
    }

    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);
        $all['image'] = ImageUpload::singleUpload(rand(1, 19000), "book", $request->file('image'));

        $insert = Book::create($all);
        if ($insert) {
            return redirect()->back()->with('status', 'Kitap Eklendi');
        } else {
            return redirect()->back()->with('status', 'Kitap Eklenemedi');
        }
    }
}
