<?php

namespace App\Http\Controllers\front\cat;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index($selflink)
    {
        $c = Category::where('selflink','=',$selflink)->count();
        if($c!=0)
        {
            $w = Category::where('selflink','=',$selflink)->get();
            $data = Book::where('categoryid','=',$w[0]['id'])->paginate(10);
            return view('front.cat.index',['info'=>$w,'data'=>$data]);

        }
        else
        {
            return redirect('/');
        }
    }
}
