<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">


    <!-- CSS Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- CSS do projeto -->
    <link rel="stylesheet" href="/css/styles.css" />
    <script src="/js/scripts.js"></script>
</head>

<body>
    <header class="border-bottom border-primary border-4">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    <img src="/img/logo.png" alt="Logo Túlio Tools" />
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/clientes/create" class="nav-link">Cadastrar Cliente</a>
                    </li>
                    <li class="nav-item">
                        <a href="/clientes/list" class="nav-link">Listar Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ferramentas/create" class="nav-link">Cadastrar Ferramenta</a>
                    </li>
                    <li class="nav-item">
                        <a href="/ferramentas/list" class="nav-link">Listar ferramentas</a>
                    </li>

                    <li class="nav-item">
                        <a href="/events/create" class="nav-link">Criar Evento</a>
                    </li>
                    <ul>
            </div>
        </nav>
    </header>

    @yield('content')

    <footer class='fixed-bottom'>
        <div class="text-bg-primary p-3">
            <p>Túlio Tools &copy; 2023. Todos os direitos reservados.</p>
        </div>
    </footer>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>

</html>
