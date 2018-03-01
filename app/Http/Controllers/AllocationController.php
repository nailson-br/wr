<?php

namespace App\Http\Controllers;

use App\CodService;
use App\Holiday;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\ServiceOrder;
use App\Workforce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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

        $daysAllocated = 0;
        $dayType = "";

        /*echo 'sábados: '    . Input::get('saturdays') . '<br>';
        echo 'domingos: '   . Input::get('sundays')   . '<br>';
        echo 'feriados: '   . Input::get('holidays')  . '<br>';
        echo 'dias ponte: ' . Input::get('bridges')   . '<br>';*/

        // echo $daysAllocated . ' dias alocados <br>';
        while (strtotime($startDate) <= strtotime($endDate)) {
            // echo date('D', strtotime($startDate)) . '<br>';

            switch (true) {
                 
                // Dia de semana E não feriado E não ponte
                case ((date('N', strtotime($startDate)) < 6) 
                    && (array_search(date('Y-m-d', strtotime($startDate)), $holidays->toArray()) === FALSE) 
                    && (array_search(date('Y-m-d', strtotime($startDate)), $bridges->toArray()) === FALSE)):
                        // echo 'dia de semana, não feriado e não ponte <br>';
                        $daysAllocated++;
                        break;

                // Sábado com opção selecionada
                case ((date('D', strtotime($startDate)) === 'Sat') && (Input::get('saturdays'))):
                    // echo 'sabado válido' . '<br>';
                    $daysAllocated++;
                    break;

                // Domingo com opção selecionada
                case ((date('D', strtotime($startDate)) == "Sun") && (Input::get('sundays'))):
                    // echo 'domingo válido' . '<br>';
                    $daysAllocated++;
                    break;

                // feriado DURANTE A SEMANA com a opção selecionada
                case ((array_search(date('Y-m-d', strtotime($startDate)), $holidays->toArray()) !== FALSE)
                    && (date('N', strtotime($startDate)) < 6)
                    && (Input::get('holidays'))):
                        // echo 'feriado válido' . '<br>';
                        $daysAllocated++;
                        break;

                // // dia-ponte DURANTE A SEMANA com a opção selecionada
                case ((array_search(date('Y-m-d', strtotime($startDate)), $bridges->toArray()) !== FALSE)
                    && (date('N', strtotime($startDate)) < 6)
                    && (Input::get('bridges'))):
                        // echo 'ponte válido' . '<br>';
                        $daysAllocated++;
                        break;

            }

            $startDate = date ("d-m-Y", strtotime("+1 day", strtotime($startDate)));
        }

        echo $daysAllocated . ' dias alocados';
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
}
