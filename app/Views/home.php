<?= $this->extend('/templates/default')?>
<?= $this->section('content')?>
<h1 style="margin-left: 150px ; font-size:20px ;margin-top: 30px "> Valor Total do Caixa: <?php echo $cash_balance ?></h1>
<div class="wrap" id="total">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Description', 'Moviments'],
          <?php  foreach($moviments as $moviment):?> 
          ['<?php echo $moviment['description']?>', <?php echo $moviment['value']?>],
          <?php endforeach;?>  
        ]);
        var options = {
          title: 'DashBoard Moviments',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    <div class="wrap" id="input">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Datas', 'Entradas','Saidas', 'Total'],
          <?php  foreach($moviments as $moviment):?> 
            ['<?php echo $moviment['date']?>', <?php if($moviment['type']=='input'){echo $moviment['value'];}?>, <?php if($moviment['type']=='output'){echo $moviment['value'];}?>, <?php echo $moviment['value']?>],
          <?php endforeach;?>  
        ]);
        var options = {
          title: 'DashBoard Entrada, Saida e Total',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart2'));

        chart.draw(data, options);
      }
    </script>  
    <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
    <div id="curve_chart2" style="width: 900px; height: 500px"></div>
  </body>
<?= 
$this->endSection();?>
