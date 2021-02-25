<?php

namespace App\Http\Controllers\front\book;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function index($selflink)
    {
        $c = Book::where('selflink','=',$selflink)->count();
        if($c!=0)
        {
            $w = Book::where('selflink','=',$selflink)->get();
            return view('front.book.index',['data'=>$w]);
        }
        else
        {
            return redirect('/');
        }
    }
}
