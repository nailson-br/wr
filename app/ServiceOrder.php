<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    //
    protected $table = 'service_orders';

    public function services() {
    	return $this->hasMany('App\Service');
    }
}
