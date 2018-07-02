<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImpactNetwork extends Model
{
    //
    use SoftDeletes;

    public function experiances()
    {
        return $this->belongsToMany('App\Experiance','impact_networks_experiances');
    }
    public function guidances()
    {
        return $this->belongsToMany('App\Guidance','impact_networks_guidances');
    }
}
