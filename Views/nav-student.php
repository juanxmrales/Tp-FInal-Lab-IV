<nav class="navbar navbar-expand-lg  navbar-dark color">
     <div class="container">
          <a class="navbar-brand" href="<?php echo FRONT_ROOT ?>Student/ShowStudentProfile/<?php echo $_SESSION["email"];?>">
               <i class="fas fa-user-graduate"></i>
          </a>

          <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>Student/ShowStudentProfile/<?php echo $_SESSION["email"];?>">Ver perfil</a>
               </li> 
          <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobOffer/ShowListView">Ver ofertas</a>
               </li> 
               <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobOffer/ShowUserJobs">Ver postulaciones</a>
               </li>  
               <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/ShowListViewStudent">Listar de Empresas</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>LoginRegister/LogOut">Log out</a>
               </li>        
          </ul>
     </div>
     <script src="https://kit.fontawesome.com/b4c4dc37b0.js" crossorigin="anonymous"></script>
</nav>