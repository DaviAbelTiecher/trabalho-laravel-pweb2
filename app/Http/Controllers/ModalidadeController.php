<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modalidade;

class ModalidadeController extends Controller
{
    public function index()
    {
        $dados = Modalidade::all();

        return view('modalidade.list')->with(['dados' => $dados]);
    }

    function create()
    {
        return view('modalidade.form');
    }

    function validateForm(Request $request)
    {
        $request->validate([
            'nome_modalidade' => 'required',
            'descricao' => 'required',
            'valor_mensal' => 'required|numeric',
        ], [
            'nome_modalidade.required' => "O campo Nome da Modalidade é obrigatório.",
            'descricao.required' => "O campo Descrição é obrigatório.",
            'valor_mensal.required' => "O campo Valor Mensal é obrigatório.",
            'valor_mensal.numeric' => "O Valor Mensal deve ser um valor numérico.",
        ]);
    }

    function store(Request $request)
    {
        $this->validateForm($request);

        Modalidade::create($request->all());

        return redirect('modalidade')->with("success", 'Registro Salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Modalidade::find($id);

        return view('modalidade.form', compact('data'));
    }

    function update(Request $request, $id)
    {
        $this->validateForm($request);

        Modalidade::find($id)->update($request->all());

        return redirect('modalidade')->with("success", 'Registro Atualizado com sucesso!');
    }

    function destroy($id)
    {
        Modalidade::destroy($id);

        return redirect('modalidade')->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Modalidade::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Modalidade::all();
        }

        return view('modalidade.list', compact('dados'));
    }
}
