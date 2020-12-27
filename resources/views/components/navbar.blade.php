<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
  <button class="navbar-toggler" type="button" data-toggle="navbar" data-target="#navbarSupportedContent" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav mr-auto">\
      <li class="{{request()->routeIs('index') ? 'nav-item active' : ''}}" >
        <a class="nav-link" href="/">Home</a>
      </li>
      <li class="{{request()->routeIs('categorias.*') ? 'nav-item active' : '' }}">
        <a class="nav-link" href="{{ route('categorias.index')}}">Categorias</a>
      </li>
    </ul>
  </div>
</nav>