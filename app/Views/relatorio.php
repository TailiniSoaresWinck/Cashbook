
<div class="input-group">
        <span class="input-group-text" id="basic-addon1">Cash balance</span>
        <input type="text" class="form-control" id="input-cash-balance" value="R$<?php echo $cash_balance?>" disabled>
    </div>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col">Description</th>
      <th scope="col">Value</th>
      <th scope="col">Input</th>
      <th scope="col">Output</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($moviments AS $moviment){
        
        echo "<tr>
        <td>{$moviment['id']}</td>
        <td>{$moviment['date']}</td>
        <td>{$moviment['description']}</td>
        <td>{$moviment['value']}</td>";
        if($moviment['type']=="input"){
            echo "<td>*</td><td> - </td>";
        }else{
            echo "<td> - </td><td> * </td>";
        }
        echo "</tr>";
    }
    ?>
  </tbody>
<table>