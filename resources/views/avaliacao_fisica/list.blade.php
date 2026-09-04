@extends('main')
@section('titulo', 'Listagem de Avaliações Físicas')
@section('conteudo')
    <div class="row">
        <h3>Listagem de Avaliações Físicas</h3>
        <form action="{{ route('avaliacao-fisica.search') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="aluno">Nome do Aluno</option>
                        <option value="objetivo_treino">Objetivo do Treino</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" placeholder="Pesquisar..." class="form-control">
                </div>
                <div class="col-md-4 d-flex align-items-end mt-2 mt-md-0">
                    <button type="submit" class="btn btn-primary me-2">Buscar</button>
                    <a href="{{ url('avaliacao-fisica/create') }}" class="btn btn-success">Novo</a>
                </div>
            </div>
        </form>
    </div>

    <div class="row mt-4">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Aluno</th>
                        <th scope="col">Peso (kg)</th>
                        <th scope="col">Altura (m)</th>
                        <th scope="col">Objetivo do Treino</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dados as $item)
                        <tr>
                            <th scope='row'>{{ $item->id }}</th>
                            <td>{{ $item->aluno->nome ?? 'Aluno não encontrado' }}</td>
                            <td>{{ number_format($item->peso, 2, ',', '.') }} kg</td>
                            <td>{{ number_format($item->altura, 2, ',', '.') }} m</td>
                            <td>{{ $item->objetivo_treino }}</td>
                            <td>
                                <a class='btn btn-warning btn-sm' title='Editar' href="{{ route('avaliacao-fisica.edit', $item->id) }}">Editar</a>
                            </td>
                            <td>
                                <form action="{{ route('avaliacao-fisica.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class='btn btn-danger btn-sm' title='Excluir'
                                        onclick="return confirm('Deseja Excluir?')">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
