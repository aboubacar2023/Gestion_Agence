<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <title>@yield('title') | Administration</title>
</head>
<body>
    @php
      $route = request()->route()->getName();
  @endphp
    <nav class="navbar navbar-expand-md navbar-dark bg-primary mb-4">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Agence</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a 
                @class(['nav-link', 'active' => $route === 'admin.property.index'])
                 aria-current="page" href="{{route('admin.property.index')}}">Gérer les Biens</a>
              </li>
              <li class="nav-item">
                <a @class(['nav-link', 'active' => $route === 'admin.option.index'])
                    aria-current="page" href="{{route('admin.option.index')}}">Gérer les Options</a>
              </li>
            </ul>
            <div class="ms-auto">
              @auth
                  <ul class="navbar-nav">
                    <li class="item">
                      <form action="{{route('logout')}}" method="post">
                        @csrf
                      @method('delete')
                      <button class="nav-link">Se Deconnecter</button>
                      </form>
                    </li>
                  </ul>
              @endauth
            </div>
          </div>
        </div>
      </nav>
    <div class="container mt-5 mb-5">
        @include('shared.flash')
        @yield('content')
    </div>
    <script>
      new TomSelect('select[multiple]', {plugins : {remove_button : {title : 'Supprimer'}}})
    </script>
</body>
</html>