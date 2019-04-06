<?php
include 'functions.php';

$item = new FoodItem( $_GET['id']);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="row" style="background: black;">
        <div class="container">
            <div class="col">
                <img src="" height= width=300>
                <h1 style="color: white">E.S.S.E.N</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <center>
                    <h1>
                        <?php echo($item->name); ?>
                    </h1>
                </center>
            </div>
        </div>
        <div class="row">
          <div class="col">
            <script type="text/javascript">
              google.charts.load("current", {packages:["corechart"]});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['Nutrient', 'Value per 100g'], ['Sugar', <?php echo($item->getProperty("P12")->value); ?>], ['Proteins', <?php echo($item->getProperty("P4")->value); ?>], ['Carbohydrates', <?php echo($item->getProperty("P6")->value); ?>], ['Fats', <?php echo($item->getProperty("P5")->value); ?> ],
                ]);

                var options = {
                  title: 'Nutritional Values of an Apple',
                  pieHole: 0.4,
                  width: 700,
                  height: 400,
                };

                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                chart.draw(data, options);
              }
            </script>
            <div id="donutchart" style="width: 100%; height: 100%;"></div>
          </div>
          <div class="col">
            <script type="text/javascript">
              google.charts.load('current', {'packages':['table']});
              google.charts.setOnLoadCallback(drawTable);

              function drawTable() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Nutrient');
                data.addColumn('number', 'Value per 100gm');
                data.addRows([
                  ['Sugar',  {v: <?php echo($item->getProperty("P12")->value); ?>,},],
                  ['Proteins',   {v:<?php echo($item->getProperty("P4")->value); ?>,},],
                  ['Carbohydrates', {v:<?php echo($item->getProperty("P6")->value); ?>,},],
                  ['Fats',   {v: <?php echo($item->getProperty("P5")->value); ?>,},]
                ]);

                var table = new google.visualization.Table(document.getElementById('table_div'));

                table.draw(data, {showRowNumber: true, width: 300, height: 350,});
              }
            </script>
            <div id="table_div" class="mx-auto" style="width: 100%; height: 100%;"></div>
          </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary btn-lg btn-block">Amazon</button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary btn-lg btn-block">Amazon</button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary btn-lg btn-block">Amazon</button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-light btn-lg btn-block">Self Check-In</button>
            </div>
        </div>
    </div>
    <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Fruits</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Apple</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mango</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Banana</a>
                </li>
                </li>
            </ul>
        </div>
    </nav>
</body>

</html>
