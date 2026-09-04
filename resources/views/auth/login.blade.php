@extends('main')
@section('titulo', 'Login - Centro de Treinamento')
@section('conteudo')
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h5 class="mb-0">Acesso ao Sistema</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('login.post') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email', 'admin@ct.com') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" name="password" id="password" class="form-control" value="123456" required>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted text-center py-2">
                    <small>Usuário padrão: <strong>admin@ct.com</strong> / Senha: <strong>123456</strong></small>
                </div>
            </div>
        </div>
    </div>
@stop
