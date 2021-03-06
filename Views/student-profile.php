<?php
    require_once('nav.php');
?>

<center>
<div class="card">
  <img src= <?php echo FRONT_ROOT.VIEWS_PATH ?>img/user.png ?>
  <div class="card-body">
    <h5 class="card-title">Información del Alumno</h5>
  </div>
  <ul class="list-group list-group-flush">
    <?php
      foreach($studentList as $student)
      {
        if($student->getEmail() == $email)
        {
          ?>
          <li class="list-group-item">Nombre: <?php echo $student->getFirstName(); ?></li>
          <li class="list-group-item">Apellido: <?php echo $student->getLastName(); ?></li>
          <li class="list-group-item">DNI: <?php echo $student->getDni(); ?></li>
          <li class="list-group-item">Legajo: <?php echo $student->getFileNumber(); ?></li>
          <li class="list-group-item">Género: <?php echo $student->getGender(); ?></li>
          <li class="list-group-item">Fecha de Nacimiento: <?php echo $student->getBirthDate(); ?></li>
          <li class="list-group-item">Email: <?php echo $student->getEmail(); ?></li>
          <li class="list-group-item">Teléfono: <?php echo $student->getPhoneNumber(); ?></li>

          <?php
        }
      }
    ?>
    
  </ul>
</div>
    </center>
