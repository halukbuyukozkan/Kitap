<?php

namespace App\Http\Controllers\front\basket;

use App\Models\Book;
use App\Helper\basketHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Auth;
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

    public function complete()
    {
        if(basketHelper::countData()!=0)
        {
            return view('front.basket.complete');

        }
        else
        {
            return redirect('/');
        }
    }

    public function completeStore(Request $request)
    {
        $request->validate(['address'=>'required','phone'=>'required']);
        $address = $request->input('address');
        $phone = $request->input('phone');
        $message = $request->input('message');
        $json = json_encode(basketHelper::allList());
        $array = 
            [
                'userid'=>Auth::id(),
                'address'=>$address,
                'phone'=>$phone,
                'message'=>$message,
                'json'=>$json
            ];    
        
        $insert = Order::create($array);
        if($insert)
        {
            return redirect()->back()->with('status','Siparişiniz Alındı');
        }    
        else
        {
            return redirect()->back()->with('status','Siparişiniz Alınamadı');
        }
    }

    public function flush()
    {
        Session::forget('basket');
        return redirect('/');
    }
}
