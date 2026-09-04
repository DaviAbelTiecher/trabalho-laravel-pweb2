<nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-3">
  <div class="container-fluid container">
    <a class="navbar-brand fw-bold" href="{{ url('/') }}">SIG-CT | Centro de Treinamento</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('aluno*') ? 'active' : '' }}" href="{{ url('aluno') }}">Alunos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('modalidade*') ? 'active' : '' }}" href="{{ url('modalidade') }}">Modalidades</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('avaliacao-fisica*') ? 'active' : '' }}" href="{{ url('avaliacao-fisica') }}">Avaliações Físicas</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        @auth
          <li class="nav-item d-flex align-items-center me-2 text-light">
            <span class="navbar-text text-white me-3">Olá, <strong>{{ Auth::user()->name }}</strong></span>
          </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="post" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-outline-light btn-sm">Sair</button>
            </form>
          </li>
        @else
          <li class="nav-item">
            <a class="btn btn-outline-light btn-sm" href="{{ route('login') }}">Entrar</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
