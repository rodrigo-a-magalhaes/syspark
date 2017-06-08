<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Carro;

class CarroController extends Controller
{

    private $carro;
    private $vagas;

    public function __construct(Carro $carro)
    {
        $this->carro = $carro;
        $this->vagas = $carro->whereNull('saida')->count();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carros = $this->carro->all();

        return view('painel.carros.index', compact('carros'));
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
        $vagas = $this->vagas;
        return view('painel.carros.create', compact('title', 'active1', 'vagas'));
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
        $vagas = $this->vagas;
        $car = $this->carro->whereNull('saida')->get();
        return view('painel.carros.saida', compact('title', 'active2', 'vagas', 'car'));
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
        $vagas = $this->vagas;
        return view('painel.carros.relatorio', compact('title', 'active3', 'carros', 'vagas'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->vagas >= 5) {
            return redirect('/entrada');
        } else {
            $dataForm = $request->all();
            unset($dataForm['_token']);
            $dataForm['entrada'] = date("Y-m-d H:i:s");
            $dataForm['updated_at'] = date("Y-m-d H:i:s");
            $dataForm['created_at'] = date("Y-m-d H:i:s");

            //Verifica se o carro esta estacionado ainda
            $carExist = $this->carro->where('placa', $dataForm['placa'])->where('saida', null)->get();

            if($carExist->count() == 0){
                //Valida so dados
                $this->validate($request, $this->carro->rules);
                $insert = $this->carro->insert($dataForm);
                if ($insert) {
                    return redirect('/saida');
                }
            }else{
                return redirect('/entrada');
            }
        }
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
     * Editar
     * Muda a data de saida do carro estacionado
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function editar(Request $request)
    {
        $edit = $request->input();
        unset($edit['_token']);

        // Se nao existir carro selecionado retornar
        if (empty($edit) || in_array(null, $edit)) {
            return redirect('/saida');
        } else {
            $up = $this->carro->where('id', $edit)->update(['saida' => date("Y-m-d H:i:s")]);

            if ($up) {
                return redirect('/saida');
            } else {
                return "Erro ao atualizar";
            }
        }
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
     * Deleta item Carro do banco
     * -> Verifica se existe objeto - deleta / redireciona para relatorio
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = $this->carro->find($id);
        if ($item) {
            $item->delete();
            return redirect()->back();
        } else {
            return redirect('/relatorio');
        }
    }

    public function tests()
    {
        //
    }


}
