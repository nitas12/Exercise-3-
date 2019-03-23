<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Nita Septiani</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	<h1 style="text-align: center"><title>Kalkulator Nita</title>
	<div class="jumbotron">
  <div>
		<title> Instagram | https://www.instagram.com/nitaasli/</title>
	<a class="brand" href="https://www.instagram.com/nitaasli/">https://www.instagram.com/nitaasli/</a>
	<link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"/></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"/></script>
    <link rel="stylesheet" href="./style.css"/>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"
    />
  </head>
      <body bgcolor="##33fff">
    <div class="container">
                  <h2>Pencarian Data</h2>
                  <p>Ketikkan sesuatu di bidang input untuk mencari data yang di inginkan:</p>
                  <input class="form-control" id="myInput" type="text" placeholder="Search..">
            </form>
         <div class="loadable">
        <div class="loading-mask"></div>
        <table id="myTable" class="table table-bordered table-striped"></table>
      </div>
    </div>
  </body>

  <script>
let ignoreFields = [ 'created', 'edited', 'films', 'residents', 'url' ],
    sortField    = 'name';

$(function() {
  $('.loading-mask').show(); // Show mask before request
  $.ajax({
    dataType: 'json',
    url: 'https://swapi.co/api/planets/?format=json',
    cache: true,
    success: function(data) {
      populateTable(data.results);
      $('.loading-mask').hide(); // Hide mask after response
    },
    failure: function(data) {
      $('.loading-mask').hide(); // Hide mask after response
    }
  });
  $('#myInput').on('keyup', onFilter);
});
//Nita Septiani
function populateTable(data) {
  data.sort((a, b) => {
    return a[sortField].toLowerCase().localeCompare(b[sortField].toLowerCase());
  });

  var fields = Object.keys(data[0]).sort((a, b) => {
    if (a === sortField) return -1;
    if (b === sortField) return 1;
    return a.toLowerCase().localeCompare(b.toLowerCase());
  }).filter(x => ignoreFields.indexOf(x) === -1);

  $('#myTable')
    .append($('<thead>')
      .append($('<tr>')
        .append(fields.map(field => $('<th>').addClass('text-center').text(field)))))
    .append($('<tbody>')
      .append(data.map(result => $('<tr>')
        .append(fields.map(field => $('<td>').text(result[field]))))));
}

function onFilter(e) {
  let value = $(this).val().toLowerCase();
  $('#myTable tbody tr').filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
  });
}//Nita Septiani
  </script>
</html>
