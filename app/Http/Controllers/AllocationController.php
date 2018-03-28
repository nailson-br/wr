<?php

namespace App\Http\Controllers;

use App\Allocation;
use App\CodService;
use App\Holiday;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\ServiceOrder;
use App\Workforce;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class AllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = NULL)
    {
        // Recuperar todas as SOs, nomes de recursos (mão de obra) e serviços
        // para preecher os combo-boxes na tela
        $serviceOrders = ServiceOrder::all();
        $workforces = Workforce::all();
        $codServices = CodService::all();

        // if (!$id) {
        //     echo "nulo";
        // } else {
        //     echo "setado";
        // }
        return view('pages.allocations.workforce-allocation')->with('serviceOrders', $serviceOrders)->with('workforces', $workforces)->with('codServices', $codServices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $startDate = Input::get('start_date');
        $endDate = Input::get('end_date');
        $holidays = Holiday::where('holiday_type', 'holiday')->lists('holiday');
        $bridges = Holiday::where('holiday_type', 'bridge')->lists('holiday');

        /* 
         * Mantendo as linhas abaixo como referência
         */

        // echo 'Data de início: ' . date('d-m-Y', strtotime($startDate)) . "<br>";
        // echo 'Um dia pra frente: ' . date('d-m-Y', strtotime('+1 day', strtotime($startDate))) . "<br>";
        // echo 'Uma semana pra frente: ' . date('d-m-Y', strtotime('+1 week', strtotime($startDate))) . "<br>";
        // echo 'Um mês pra frente: ' . date('d-m-Y', strtotime('+1 month', strtotime($startDate))) . "<br>";

        /*echo 'sábados: '    . Input::get('saturdays') . '<br>';
        echo 'domingos: '   . Input::get('sundays')   . '<br>';
        echo 'feriados: '   . Input::get('holidays')  . '<br>';
        echo 'dias ponte: ' . Input::get('bridges')   . '<br>';*/

        while (strtotime($startDate) <= strtotime($endDate)) {

                $allocation = new Allocation();
                $allocation->service_order_id = Input::get('service_order_id');
                $allocation->workforce_id = Input::get('workforce_id');
                $allocation->service_id = Input::get('service_id');
                $allocation->function = Input::get('function');
                // Carbon::createFromFormat('d/m/Y', Input::get('holiday'));
                $allocation->date = Carbon::createFromFormat('Y-m-d', $startDate);
                $allocation->start_time = Input::get('start_time');
                $allocation->end_time = Input::get('end_time');

            switch (true) {
                 
                // Dia de semana E não feriado E não ponte
                case ((date('N', strtotime($startDate)) < 6) 
                    && (array_search(date('Y-m-d', strtotime($startDate)), $holidays->toArray()) === FALSE) 
                    && (array_search(date('Y-m-d', strtotime($startDate)), $bridges->toArray()) === FALSE)):
                        // echo 'dia de semana, não feriado e não ponte <br>';
                        
                        $allocation->save();
                        break;

                // Sábado com opção selecionada
                case ((date('D', strtotime($startDate)) === 'Sat') && (Input::get('saturdays'))):
                    // echo 'sabado válido' . '<br>';
                    $allocation->save();
                    break;

                // Domingo com opção selecionada
                case ((date('D', strtotime($startDate)) == "Sun") && (Input::get('sundays'))):
                    // echo 'domingo válido' . '<br>';
                    $allocation->save();
                    break;

                // feriado DURANTE A SEMANA com a opção selecionada
                case ((array_search(date('Y-m-d', strtotime($startDate)), $holidays->toArray()) !== FALSE)
                    && (date('N', strtotime($startDate)) < 6)
                    && (Input::get('holidays'))):
                        // echo 'feriado válido' . '<br>';
                        $allocation->save();
                        break;

                // // dia-ponte DURANTE A SEMANA com a opção selecionada
                case ((array_search(date('Y-m-d', strtotime($startDate)), $bridges->toArray()) !== FALSE)
                    && (date('N', strtotime($startDate)) < 6)
                    && (Input::get('bridges'))):
                        // echo 'ponte válido' . '<br>';
                        $allocation->save();
                        break;

            }

            $startDate = date ("Y-m-d", strtotime("+1 day", strtotime($startDate)));
        }

        // echo $daysAllocated . ' dias alocados';
        echo 'Finalizado';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Obtém todos os serviços relacionados à OS
     * indicada em $osId para preenchimento do
     * select na página dinamicamente.
     * 
     * @param int $osId
     * @return \Illuminate\Http\Response
     */
    public function getServices($osId)
    {
        // $services = DB::select(`service_orders.id as codServiceId`,`cod_services.cod as codService`,`cod_services.description as description`)
        // ->from(`services`)
        // ->join(`service_orders`, function($join) {
        //     $join->on(`services.service_order_id`, `=`, `service_orders.id`);
        //     })
        // ->join(`cod_services`, function($join) {
        //     $join->on(`cod_services.id`, `=`, `services.cod_service_id`);
        //     })
        // ->where(`service_orders.id`, `=`, 104)
        // ->get();

        $serviceOrder = ServiceOrder::find($osId);

        $services = DB::table('services')
        ->join('cod_services', function($join) use($serviceOrder) { 
            $join->on('services.cod_service_id', '=', 'cod_services.id');})
        ->where('services.service_order_id', '=', $serviceOrder->id)
        ->select('services.id', DB::raw('CONCAT(cod_services.cod, " - ", cod_services.description) as description'))->get();

        return Response::json($services);
    }
}
