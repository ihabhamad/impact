<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Extramenu extends Model
{
    use SoftDeletes;
    public function items(){
        return $this->hasMany('App\Menuitem');
    }
    public function getHasItemAttribute(){
        $hasItem = Menuitem::where('extramenu_id',$this->id)->count();
        if($hasItem > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }

    }
}
