<?php

namespace App\Http\Controllers\admin\author;

use App\Models\Author;
use App\Helper\mHelper;
use App\Helper\imageUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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

    public function edit($id)
    {
        $c = Author::where('id', '=', $id)->count();
        if ($c != 0) {
            $data = Author::where('id', '=', $id)->get();
            return view('admin.author.edit', ['data' => $data]);
        } else {
            return redirect('/');
        }
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Author::where('id', '=', $id)->count();
        if ($c != 0) {
            $data = Author::where('id', '=', $id)->get();
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $all['image'] = imageUpload::singleUploadUpdate(rand(1, 900), "author", $request->file('image'), $data, "image");
            $update = Author::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect()->back()->with('status', 'Yazar Başarı ile düzenlendi');
            } else {
                return redirect()->back()->with('status', 'Yazar düzenlenemedi');
            }
        } else {
            return redirect('/');
        }
    }

    public function delete($id)

    {
        $c = Author::where('id', '=', $id)->count();
        if ($c != 0) {
            $w = Author::where('id', '=', $id)->get();
            File::delete('public/' . $w[0]['image']);
            Author::where('id', '=', $id)->delete();
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
}
