<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
     <a class="navbar-brand" href="index.php">
          <img src= <?php echo FRONT_ROOT.VIEWS_PATH ?>img/student-hat.png ?>
     </a>

     <ul class="navbar-nav ml-auto">

          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Student/ShowStudentProfile">Ver perfil</a>
          </li> 
         <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobPosition/ShowListView">Ver ofertas</a>
          </li> 
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobPosition/ShowUserJobs">Ver postulaciones</a>
          </li>  
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/ShowListViewStudent">Listar de Empresas</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>User/LogOut">Log out</a>
          </li>        
     </ul>
</nav>