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
    <script>
      let sortDirection = false;
      let tableData = {!! json_encode($users) !!};
      let filteredData = tableData;

      window.onload = () => {
        loadTableData(tableData);
      };

      function loadTableData(tableData){
        const tableBody = document.getElementById('tableData');
        let dataHtml = '';

        for(let data of tableData){
          if(data.customer == 'Agility'){
            dataHtml += `<tr class="table-primary"><td>${data.id}</td><td>${data.name}</td><td>${data.customer}</td><td>${data.email}</td><td>${data.status}</td></tr>`;
          }
          else{
            dataHtml += `<tr><td>${data.id}</td><td>${data.name}</td><td>${data.customer}</td><td>${data.email}</td><td>${data.status}</td></tr>`;
          }
        }

        tableBody.innerHTML = dataHtml;
      }

      function sortColumn(columnName){
        const dataType = typeof filteredData[0][columnName];

        sortDirection = !sortDirection;
        switch(dataType){
            case 'number':
              sortNumberColumn(sortDirection, columnName)
              break;
            default:
              sortStringColumn(sortDirection, columnName)
              break;
        }
        loadTableData(filteredData);
      }

      function sortNumberColumn(sort, columnName){
        filteredData = filteredData.sort((val1,val2) => {
          return sort ? val1[columnName] - val2[columnName] : val2[columnName] - val1[columnName]
        });
      }

      function sortStringColumn(sort, columnName){
        filteredData = filteredData.sort((val1,val2) => {
          return sort ? val1[columnName] > val2[columnName] : val2[columnName] > val1[columnName]
        });
      }

      function search(){
        filteredData = tableData;
        searchVal = document.getElementById('search').value;
        filteredData =  tableData.filter(function(data) {
          return data.name.includes(searchVal) || data.customer.includes(searchVal) || data.email.includes(searchVal);
        });
        loadTableData(filteredData);
      }

    </script>
    <script src="{{ asset('site/jquery.js') }}"></script>
    <script src="{{ asset('site/bootstrap.js') }}"></script>
  </body>
</html>