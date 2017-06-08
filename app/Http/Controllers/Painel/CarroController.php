<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Carro;

class CarroController extends Controller
{

    private $carro;

    public function __construct(Carro $carro)
    {
        $this->carro = $carro;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carros = $this->carro->all();

        return view('site.entrada', compact('carros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Cadastro";
        $active1 = "-ativo";
        return view('painel.carros.create', compact('title', 'active1'));
    }

    /**
     * Tela de saida, mostra carros estacionados
     *
     * @return \Illuminate\Http\Response
     */
    public function saida()
    {
        $title = "Saida";
        $active2 = "-ativo";
        return view('painel.carros.saida', compact('title', 'active2'));
    }

    /**
     * Tela de saida, mostra carros estacionados
     *
     * @return \Illuminate\Http\Response
     */
    public function relatorio()
    {


        $carros = $this->carro->orderBy('id', 'desc')->get();
        $title = "Relatorio";
        $active3 = "-ativo";

        return view('painel.carros.relatorio', compact('title', 'active3', 'carros'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataForm = $request->all();

        unset($dataForm['_token']);
        $dataForm['entrada'] = date("Y-m-d H:i:s");
        $dataForm['updated_at'] = date("Y-m-d H:i:s");
        $dataForm['created_at'] = date("Y-m-d H:i:s");


        $this->validate($request, $this->carro->rules);

        $insert = $this->carro->insert($dataForm);
        if ($insert) {
            return redirect()->route('carros.index');
        }

        /*
        if (!in_array(null, $dataForm)) {
            $insert = $this->carro->insert($dataForm);
            if ($insert) {
                return redirect()->route('carros.index');
            }
        } else {
            return 'preencha todos os dados';
        }
*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function tests()
    {
        /*
        $car = $this->carro;
        $car->placa = 'aaa1234';
        $car->modelo = 'modeloCarro';
        $car->cor = 'azul';
        $car->entrada = date("Y-m-d H:i:s");
        $car->saida = null;
        $insert = $car->save();

        if ($insert) {
            return 'Criado com sucesso.';
        } else {
            return 'Nao foi criado';
        }

        ATUALIZAR
        $car = $this->carro->find(1);
        $car->placa = 'bbb1234';
        $car->modelo = 'modelooo';
        $car->cor = 'azul';
        $car->entrada = date("Y-m-d H:i:s");
        $car->saida = null;
        $update = $car->save();

        if($update){
            return "Atualizado";
        }else{
            return "Nao atualizou";
        }


        $car = $this->carro->find(1);
        $delete = $car->delete();

        if ($delete) {
            return "Deletado";
        } else {
            return "Erro";
        }
  */

    }


}
