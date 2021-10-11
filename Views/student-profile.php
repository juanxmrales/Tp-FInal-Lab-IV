<?php
    require_once('nav.php');
?>

<div class="card" style="width: 18rem;">
  <img src= <?php echo FRONT_ROOT.VIEWS_PATH ?>img/user.png ?>
  <div class="card-body">
    <h5 class="card-title">Informacion del Alumno</h5>
  </div>
  <ul class="list-group list-group-flush">
    <?php
      foreach($studentList as $student)
      {
        if($student->getEmail() == $_SESSION["email"])
        {
          ?>
          <li class="list-group-item">Nombre: <?php echo $student->getFirstName(); ?></li>
          <li class="list-group-item">Apellido: <?php echo $student->getLastName(); ?></li>
          <li class="list-group-item">DNI: <?php echo $student->getDni(); ?></li>
          <?php
        }
      }
    ?>
    
  </ul>
</div>