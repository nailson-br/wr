DB::select('cod_services.cod as codigo','cod_services.description as descricao','services.id','services.active','services.requirer')->from('services')->join('cod_services', function($join) {$join->on('services.cod_service_id', '=', 'cod_services.id');})->where('services.requirer', '=', 'nailson')->get();

DB::table('services', 'cod_services')->pluck('cod_services.cod as codigo','cod_services.description as descricao','services.id','services.active','services.requirer')->join('cod_services', 'cod_service_id', '=', 'cod_services.id')->select('services.*', 'cod_services.description')->get();

DB::table('services')->join('cod_services', function ($join) { $join->on('services.cod_service_id', '=', 'cod_services.id')->where('services.requirer', '=', 'teste');})->select('cod_services.cod as codigo','cod_services.description as descricao','services.id','services.active','services.requirer')->get();


DB::table('services')->join('cod_services', function ($join) { $join->on('services.cod_service_id', '=', 'cod_services.id')->where('services.service_order_id', '=', 81);})->select('cod_services.cod as cod_service','cod_services.description as description','services.*')->get();