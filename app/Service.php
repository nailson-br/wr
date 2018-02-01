<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // Referência para a tabela
    protected $table = 'services';

    public function so() {
    	return $this->belongsTo('App\ServiceOrder', 'service_order_id');
    }

    public function codService() {
    	return $this->hasOne('App\CodService');
    }
}
