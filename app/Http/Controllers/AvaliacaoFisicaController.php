<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvaliacaoFisica;
use App\Models\Aluno;

class AvaliacaoFisicaController extends Controller
{
    public function index()
    {
        $dados = AvaliacaoFisica::with('aluno')->get();

        return view('avaliacao_fisica.list')->with(['dados' => $dados]);
    }

    function create()
    {
        $alunos = Aluno::orderBy('nome')->get();

        return view('avaliacao_fisica.form', compact('alunos'));
    }

    function validateForm(Request $request, $id = null)
    {
        $request->validate([
            'aluno_id' => 'required|unique:avaliacao_fisicas,aluno_id,' . $id,
            'peso' => 'required|numeric',
            'altura' => 'required|numeric',
            'objetivo_treino' => 'required',
        ], [
            'aluno_id.required' => "Selecione um Aluno.",
            'aluno_id.unique' => "Este aluno já possui uma avaliação física cadastrada.",
            'peso.required' => "O campo Peso é obrigatório.",
            'peso.numeric' => "O campo Peso deve ser um valor numérico.",
            'altura.required' => "O campo Altura é obrigatório.",
            'altura.numeric' => "O campo Altura deve ser um valor numérico.",
            'objetivo_treino.required' => "O campo Objetivo do Treino é obrigatório.",
        ]);
    }

    function store(Request $request)
    {
        $this->validateForm($request);

        AvaliacaoFisica::create($request->all());

        return redirect('avaliacao-fisica')->with("success", 'Registro Salvo com sucesso!');
    }

    function edit($id)
    {
        $data = AvaliacaoFisica::find($id);
        $alunos = Aluno::orderBy('nome')->get();

        return view('avaliacao_fisica.form', compact('data', 'alunos'));
    }

    function update(Request $request, $id)
    {
        $this->validateForm($request, $id);

        AvaliacaoFisica::find($id)->update($request->all());

        return redirect('avaliacao-fisica')->with("success", 'Registro Atualizado com sucesso!');
    }

    function destroy($id)
    {
        AvaliacaoFisica::destroy($id);

        return redirect('avaliacao-fisica')->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            if ($request->tipo === 'aluno') {
                $dados = AvaliacaoFisica::whereHas('aluno', function ($query) use ($request) {
                    $query->where('nome', 'like', "%$request->valor%");
                })->with('aluno')->get();
            } else {
                $dados = AvaliacaoFisica::where(
                    $request->tipo,
                    'like',
                    "%$request->valor%"
                )->with('aluno')->get();
            }
        } else {
            $dados = AvaliacaoFisica::with('aluno')->get();
        }

        return view('avaliacao_fisica.list', compact('dados'));
    }
}
