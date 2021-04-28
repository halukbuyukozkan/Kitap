<?php
namespace App\Helper;

use Illuminate\Support\Facades\Session;

class basketHelper
{
    static function add($id,$price,$image,$name)
    {
        $basket = Session::get('basket');
        $array = [
            'id'=>$id,
            'name'=>$name,
            'image'=>$image,
            'price'=>$price
        ];
        Session::put('basket.'.$id,$array);
    }

    static function remove($id)
    {
        
        Session::forget('basket.'.$id);
    }

    static function countData()
    {
        return count(self::allList());
    }

    static function allList()
    {
        $x = Session::get('basket',[]);
        return $x;
    }



    static function totalPrice()
    {
        $data = self::allList();
        return collect($data)->sum('price');
    }

}