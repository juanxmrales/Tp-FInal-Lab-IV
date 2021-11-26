<nav class="navbar navbar-expand-lg  navbar-dark color">
     <div class="container">
          <a class="navbar-brand" href="<?php echo FRONT_ROOT ?>Company/ShowCompanyProfile/<?php echo $_SESSION['idComp'] ?>">
               <i class="fas fa-user-astronaut"></i>
          </a>

          <ul class="navbar-nav ml-auto"> 
               <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobOffer/ShowAddViewCompany">Agregar ofertas</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobOffer/ShowListViewCompany">Ver ofertas</a>
               </li> 
               <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/ShowCompanyProfileCompany">Ver perfil</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>LoginRegister/LogOut">Log out</a>
               </li>        
          </ul>
     </div>
     <script src="https://kit.fontawesome.com/b4c4dc37b0.js" crossorigin="anonymous"></script>
</nav>