<?php
include 'functions.php';

$item = new FoodItem($_GET['id']);
$checked = False;

if (isset($_GET['checkin'])) {
    $item->checkin();
    $checked = True;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E.S.S.E.N. - Efficient Super Safe Erudite Network</title>

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
                <h1 style="color: white">E.S.S.E.N. - <?php echo($item->name); ?></h1>
            </div>
        </div>
    </div>
    <?php
    if($checked) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            The ".$item->name." was successfully checked in!
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
      }
    ?>

    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <center>
                    <span class="align-middle">
                        <h1>
                            <?php echo($item->name); ?>
                        </h1>
                        <?php if ($item->hasProperty("P2")) {
                            echo("<h3>");
                            echo($item->getProperty("P2")->value);
                            echo("Cal per 100g</h3>");
                        } ?>
                    </span>
                </center>
            </div>
            <?php
            if($item->hasProperty("P13")) {
                echo "<div class=\"col\">";
                echo "<img src=\"".$item->getProperty("P13")->value;
                echo "\" width=\"70%\"></div>";
            }
              ?>
        </div>
        <div class="row">
            <div class="col">
            <script type="text/javascript">
              google.charts.load("current", {packages:["corechart"]});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['Nutrient', 'Value per 100g'],
                <?php
                foreach ($item->propertyList() as $property) {
                    if ($property->id != "P2" and $property->id != "P11" and $property->id != "P13" and $property->id != "P14") {
                        echo("['".$property->name."', ".$property->value."], ");
                    }
                }
                 ?>
                ]);

                var options = {
                  title: 'Nutritional Values',
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
                    <?php
                    foreach ($item->propertyList() as $property) {
                        if ($property->id != "P2" and $property->id != "P11" and $property->id != "P13" and $property->id != "P14") {
                            echo("['".$property->name."', {v: ".$property->value.",},], ");
                        }
                    }
                     ?>
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
                <button type="button" class="btn btn-danger btn-lg btn-block">Amazon</button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-warning btn-lg btn-block">Grofers</button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-success btn-lg btn-block">Bigbasket</button>
            </div>
            <div class="col">
                <a type="button" class="btn btn-light btn-lg btn-block" href="product.php?id=<?php echo($item->id);?>&checkin">Self Check-In</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">
                    <a class="navbar-brand" href="#"><?php echo($item->categoryName);?></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="product.php?id=Q2">Apple</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="product.php?id=Q9">Mango</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="product.php?id=Q10">Banana</a>
                            </li>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</body>

<?php //var_dump($item);  ?>
</html>
