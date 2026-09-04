@extends('main')
@section('titulo', 'Formulário de Avaliação Física')
@section('conteudo')
    <div class="row">
        @php
            if (!empty($data->id)) {
                $action = route('avaliacao-fisica.update', $data->id);
            } else {
                $action = route('avaliacao-fisica.store');
            }
        @endphp

        <h4>Formulário Avaliação Física</h4>
        <form action="{{ $action }}" method="post">
            @csrf
            @if (!empty($data->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id" value="{{ old('id', $data->id ?? '') }}">
            <div class="col-6 mb-3">
                <label for="aluno_id" class="form-label">Aluno</label>
                <select name="aluno_id" class="form-select">
                    <option value="">Selecione o Aluno</option>
                    @foreach ($alunos as $item)
                        <option value="{{ $item->id }}"
                            {{ old('aluno_id', $data->aluno_id ?? '') == $item->id ? 'selected' : '' }}>
                            {{ $item->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-6 mb-3">
                <label for="peso" class="form-label">Peso (kg)</label>
                <input type="number" step="0.01" name="peso" class="form-control"
                    value="{{ old('peso', $data->peso ?? '') }}">
            </div>
            <div class="col-6 mb-3">
                <label for="altura" class="form-label">Altura (m)</label>
                <input type="number" step="0.01" name="altura" class="form-control"
                    value="{{ old('altura', $data->altura ?? '') }}">
            </div>
            <div class="col-6 mb-3">
                <label for="objetivo_treino" class="form-label">Objetivo do Treino</label>
                <input type="text" name="objetivo_treino" class="form-control"
                    value="{{ old('objetivo_treino', $data->objetivo_treino ?? '') }}">
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('avaliacao-fisica') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
@stop
