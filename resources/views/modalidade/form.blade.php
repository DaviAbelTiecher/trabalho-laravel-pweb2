@extends('main')
@section('titulo', 'Formulário de Modalidade')
@section('conteudo')
    <div class="row">
        @php
            if (!empty($data->id)) {
                $action = route('modalidade.update', $data->id);
            } else {
                $action = route('modalidade.store');
            }
        @endphp

        <h4>Formulário Modalidade</h4>
        <form action="{{ $action }}" method="post">
            @csrf
            @if (!empty($data->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id" value="{{ old('id', $data->id ?? '') }}">
            <div class="col-6 mb-3">
                <label for="nome_modalidade" class="form-label">Nome da Modalidade</label>
                <input type="text" name="nome_modalidade" class="form-control" value="{{ old('nome_modalidade', $data->nome_modalidade ?? '') }}">
            </div>
            <div class="col-6 mb-3">
                <label for="valor_mensal" class="form-label">Valor Mensal (R$)</label>
                <input type="number" step="0.01" name="valor_mensal" class="form-control" value="{{ old('valor_mensal', $data->valor_mensal ?? '') }}">
            </div>
            <div class="col-12 mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control" rows="3">{{ old('descricao', $data->descricao ?? '') }}</textarea>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('modalidade') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
@stop
