<?php

namespace App\Http\Controllers\admin\book;

use App\Models\Book;
use App\Models\Author;
use App\Helper\mHelper;
use App\Models\Publisher;
use App\Helper\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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

    public function edit($id)
    {
        $c = Book::where('id', '=', $id)->count();
        if ($c != 0) {
            $data = Book::where('id', '=', $id)->get();
            $author = Author::all();
            $publisher = Publisher::all();
            return view('admin.book.edit', ['data' => $data, 'author' => $author, 'publisher' => $publisher]);
        } else {
            return redirect('/');
        }
    }

    public function updata(Request $request)
    {
        $id = $request->route('id');
        $c = Book::where('id', '=', $id)->count();
        if ($c != 0) {
            $data = Book::where('id', '=', $id)->get();
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $all['image'] = imageUpload::singleUploadUpdate(rand(1, 9000), "book", $request->file('image'), $data, "image");
            $update = Book::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect()->back()->with('status', 'Kitap Başarı ile Düzenlendi');
            } else {
                return redirect()->back()->with('status', 'Kitap Düzenlenemedi');
            }
        } else {
            return redirect('/');
        }
    }
    public function delete($id)
    {
        $c = Book::where('id', '=', $id)->count();
        if ($c != 0) {
            $data = Book::where('id', '=', $id)->get();
            File::delete('public/' . $data[0]['image']);
            Book::where('id', '=', $id)->delete();
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
}
