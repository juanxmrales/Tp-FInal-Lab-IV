<?php
    require_once('nav.php');
?>

<center>
<div class="card" style="width: 27rem; margin: 5rem 0 15rem 0; opacity: 85%;">
  <img src= <?php echo FRONT_ROOT.VIEWS_PATH ?>img/user.png ?>
  <div class="card-body" >
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
          <li class="list-group-item">Legajo: <?php echo $student->getFileNumber(); ?></li>
          <li class="list-group-item">Genero: <?php echo $student->getGender(); ?></li>
          <li class="list-group-item">Fecha de Nacimiento: <?php echo $student->getBirthDate(); ?></li>
          <li class="list-group-item">Email: <?php echo $student->getEmail(); ?></li>
          <li class="list-group-item">Telefono: <?php echo $student->getPhoneNumber(); ?></li>
 

          <?php
        }
      }
    ?>
    
  </ul>
</div>
</center>