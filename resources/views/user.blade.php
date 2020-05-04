<!DOCTYPE html>
<html lang="pt-br">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>{{$pageName}}</title>
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
        <div class="col-md-2 mb-3">
        <button class="btn btn-secondary" onClick="location.href='{{url('')}}'">Voltar</button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-10 mb-3">
          <input type="text" class="form-control" id="search" placeholder="Nome, Cliente ou Email..." value="">
        </div>
        <div class="col-md-2 mb-3">
        <button class="btn btn-info btn-block " onClick="search()">Buscar</button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-hover table-bordered">
            <thead class="thead-dark">
              <tr>
                <th onClick="sortColumn('id')">ID</th>
                <th onClick="sortColumn('name')">Nome</th>
                <th onClick="sortColumn('customer')">Cliente</th>
                <th onClick="sortColumn('email')">Email</th>
                <th onClick="sortColumn('status')">Status</th>
              </tr>
            </thead>
            <tbody id="tableData"></tbody>
          </table>
        </div>
      </div>
    </div>

    </main>
    <script src="{{ asset('site/user.js') }}"></script>
    <script>
      tableData = {!! json_encode($users) !!};
      filteredData = tableData;
      window.onload = () => {
        loadTableData(tableData);
        sortColumn('customer');
      };
    </script>
    <script src="{{ asset('site/jquery.js') }}"></script>
    <script src="{{ asset('site/bootstrap.js') }}"></script>
  </body>
</html>