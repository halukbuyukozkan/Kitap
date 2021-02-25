<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    protected $guarded = [];

    static function getField($id,$field)
    {
        $c = Publisher::where('id','=',$id)->count();
        if($c!=0)
        {
            $w = Publisher::where('id','=',$id)->get();
            return $w[0][$field];
        }
        else
        {
            return "Silinmiş Yayınevi";
        }
    }
}
