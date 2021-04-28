<?php

namespace App\Http\Controllers\front\basket;

use App\Models\Book;
use App\Helper\basketHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class indexController extends Controller
{
    public function index()
    {
        return view('front.basket.index');

    }


    public function add($id)
    {
        $c = Book::where('id','=',$id)->count();
        if($c!=0)
        {
            $w = Book::where('id','=',$id)->get();
            basketHelper::add($id,$w[0]['price'],asset($w[0]['image']),$w[0]['name']);
            return redirect()->back()->with('status','Sepete Eklediniz');
        }
        else
        {
            return redirect()->route('index');

        }

    }

    public function remove($id)
    {
        basketHelper::remove($id);
        return redirect()->back();
    }
}
