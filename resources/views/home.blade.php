<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Desafio Agility</title>
        <link rel="stylesheet" href="{{ asset('site/style.css') }}">
    </head>
    <body>
        <main role="main">

            <section class="jumbotron text-center">
            <div class="container">
                <h1>Desafio Agility</h1>
                <p class="lead text-muted">Lucas Tetsuo Takagi</p>
            </div>
            </section>

            <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <button class="btn btn-info btn-block btn-lg" onclick="location.href='{{url('/method-get')}}'">Método GET</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <button class="btn btn-info btn-block btn-lg" onclick="location.href='{{url('/method-post')}}'">Método POST</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <button class="btn btn-info btn-block btn-lg" onclick="location.href='{{url('/users')}}'">Método GET + POST</button>
                </div>
            </div>
            </div>

        </main>
        <script src="{{ asset('site/jquery.js') }}"></script>
        <script src="{{ asset('site/bootstrap.js') }}"></script>
    </body>
</html>