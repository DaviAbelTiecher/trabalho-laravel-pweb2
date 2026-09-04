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
            'cpf' => ['required', 'regex:/^[0-9.\-]+$/'],
            'telefone' => ['required', 'regex:/^[0-9()\-\s]+$/'],
        ], [
            'nome.required' => "O campo Nome é obrigatório.",
            'email.required' => "O campo E-mail é obrigatório.",
            'email.email' => "Informe um E-mail válido.",
            'cpf.required' => "O campo CPF é obrigatório.",
            'cpf.regex' => "O CPF deve conter apenas números, pontos e traço (ex: 123.456.789-00 ou 12345678900).",
            'telefone.required' => "O campo Telefone é obrigatório.",
            'telefone.regex' => "O Telefone deve conter apenas números, parênteses e traço (ex: (11) 99999-9999 ou 11999999999)."
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
