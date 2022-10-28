<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
        <title>Caixa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="<?php echo base_url()?>/public/assets/templates/default/css/style.css" />
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img src="<?php echo base_url()?>/public/assets/templates/default/images/cifrao.png" style="width:3rem" class="d-inline-block align-text-top"/>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url()?>/home">Home</a>
        </li>
        <li class="nav-item"> 
          <a class="nav-link" href="<?php echo base_url()?>/moviments">Moviments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url()?>/reports">Reports</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?php echo base_url()?>/users" >Users</a>
        </li>
      </ul>
      <span class="navbar-text">
        <a href="<?php echo base_url()?>/users/logout/" title="<?php //echo $_SESSION['user']['name'] ?>">
            <i class="bi-person" style="color:#F00"></i>
        </a>
        
      </span>
    </div>
  </div>
</nav>
    </header>

    
    <?= $this->renderSection('content') ?>

</body>
</html>