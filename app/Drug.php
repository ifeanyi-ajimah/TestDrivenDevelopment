<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\HardDrugsException;



class Drug extends Model
{
    public function buy()
    {
        if( auth()->user()->isMinor() ){
            throw new HardDrugsException;
        } else{
            //buy drug exception
            return true;
        }

    }


}
