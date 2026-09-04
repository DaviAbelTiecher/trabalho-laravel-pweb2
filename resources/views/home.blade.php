@extends('main')
@section('titulo', 'Painel - Centro de Treinamento')
@section('conteudo')
    <div class="p-5 mb-4 bg-light rounded-3 shadow-sm">
        <div class="container-fluid py-3">
            <h1 class="display-5 fw-bold text-dark">Bem-vindo ao Centro de Treinamento</h1>
            <p class="col-md-10 fs-5 text-muted">
                Sistema de Gestão Acadêmica e Fitness. Gerencie facilmente alunos, modalidades esportivas e avaliações físicas em um só lugar.
            </p>
            <hr class="my-4">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Alunos</h5>
                            <p class="card-text">Cadastre e busque alunos matriculados no centro de treinamento.</p>
                            <a href="{{ url('aluno') }}" class="btn btn-light btn-sm text-primary fw-bold">Acessar Alunos</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Modalidades</h5>
                            <p class="card-text">Gerencie os planos, modalidades e mensalidades do centro.</p>
                            <a href="{{ url('modalidade') }}" class="btn btn-light btn-sm text-success fw-bold">Acessar Modalidades</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Avaliações Físicas</h5>
                            <p class="card-text">Registre o acompanhamento físico 1:1 dos alunos.</p>
                            <a href="{{ url('avaliacao-fisica') }}" class="btn btn-light btn-sm text-dark fw-bold">Acessar Avaliações</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
