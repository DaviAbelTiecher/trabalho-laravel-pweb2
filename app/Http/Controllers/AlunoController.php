<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    public function index()
    {
        $dados = Aluno::all();

        return view('aluno.list')->with(['dados' => $dados]);
    }

    function create()
    {
        return view('aluno.form');
    }

    function validateForm(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'cpf' => 'required',
            'telefone' => 'required',
        ], [
            'nome.required' => "O :attribute é obrigatorio",
            'email.required' => "O :attribute é obrigatorio",
            'email.email' => "O :attribute deve ser um e-mail válido",
            'cpf.required' => "O :attribute é obrigatorio",
            'telefone.required' => "O :attribute é obrigatorio"
        ]);
    }

    function store(Request $request)
    {
        $this->validateForm($request);

        Aluno::create($request->all());

        return redirect('aluno')->with("success", 'Registro Salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Aluno::find($id);

        return view('aluno.form', compact('data'));
    }

    function update(Request $request, $id)
    {
        $this->validateForm($request);

        Aluno::find($id)->update($request->all());

        return redirect('aluno')->with("success", 'Registro Atualizado com sucesso!');
    }

    function destroy($id)
    {
        Aluno::destroy($id);

        return redirect('aluno')->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Aluno::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Aluno::all();
        }

        return view('aluno.list', compact('dados'));
    }
}
