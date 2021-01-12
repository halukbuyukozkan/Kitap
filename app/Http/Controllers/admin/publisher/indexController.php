<?php

namespace App\Http\Controllers\admin\publisher;

use App\Helper\mHelper;
use App\Models\Publisher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $data = Publisher::paginate(10);
        return view('admin.publisher.index', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.publisher.create');
    }

    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);

        $insert = Publisher::create($all);
        if ($insert) {
            return redirect()->back()->with('status', 'Yayınevi başarıyla eklendi');
        } else {
            return redirect()->back()->with('status', 'Yayınevi eklenemedi');
        }
    }

    public function edit($id)
    {
        $c = Publisher::where('id', '=', $id)->count();
        if ($c != 0) {
            $data = Publisher::where('id', '=', $id)->get();
            return view('admin.publisher.edit', ['data' => $data]);
        } else {
            return redirect('/');
        }
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Publisher::where('id', '=', $id)->count();
        if ($c != 0) {
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $update = Publisher::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect()->back()->with('status', 'Yayınevi düzenlendi');
            } else {
                return redirect()->back()->with('status', 'Yayınevi düzenlenemedi');
            }
        } else {
            return redirect('/');
        }
    }

    public function delete($id)
    {
        $c = Publisher::where('id', '=', $id)->count();
        if ($c != 0) {
            $delete = Publisher::where('id', '=', $id)->delete();
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
}
