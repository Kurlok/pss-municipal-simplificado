<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vaga;
use App\Titulo;

class HomeController extends Controller
{
    public function index()
    {

        $listaVagas = Vaga::all();

        return view(
            'home',
            [
                'listaVagas' => $listaVagas,
            ],
        );
    }

    public function getTitulos($idCargo)
    {
        // $cargoPssId = DB::table('vagas')->where([
        //     ['fk_vagas_id', '=',  $idCargo],
        // ])->value('id');

       // $listaTitulos = DB::table('titulos');
        $listaTitulos = Titulo::where('fk_vagas_id', '=', $idCargo)->get();        
        return json_encode($listaTitulos);;

            //PAREI AQUI 19-07-2019 ... TEM QUE RETORNAR A LISTA DE TITULOS PARA O $cargoPssId

        // echo $idCargo;
        // echo "       -----     ";
        // echo $idPss;

        //// Fetch Employees by 

        // $userData['data'] = Page::getdepartmentEmployee($cargosPssId);
        // echo json_encode($userData);
        // exit;
    }
}
