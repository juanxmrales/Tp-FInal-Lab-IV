<nav class="navbar navbar-expand-lg  navbar-dark color fixed-top">
     <div class="container">
          <a class="navbar-brand" href="<?php echo FRONT_ROOT ?>Student/SearchStudent">
               <i class="fas fa-user-cog"></i>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
               <ul class="navbar-nav">
               <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                              Agregar
                         </a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdawn-item" href="<?php echo FRONT_ROOT ?>Company/ShowAddView">Agregar Empresa</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdawn-item" href="<?php echo FRONT_ROOT ?>JobOffer/ShowAddView">Agregar Oferta</a></li>                     <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdawn-item" href="<?php echo FRONT_ROOT ?>User/ShowAddViewAdmin">Agregar Usuario</a></li>
                         </ul>
                    </li>
                    <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white">
                         Listar
                         </a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdawn-item" href="<?php echo FRONT_ROOT ?>Student/SearchStudent">Listar Alumnos</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdawn-item" href="<?php echo FRONT_ROOT ?>Company/ShowListView">Listar Empresas</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdawn-item" href="<?php echo FRONT_ROOT ?>JobOffer/ShowListViewAdmin">Listar Ofertas</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdawn-item" href="<?php echo FRONT_ROOT ?>User/ShowListView">Listar Usuarios</a></li>
                         </ul>
                    </li>  
                    <li class="nav-item">
                         <a class="nav-link" href="<?php echo FRONT_ROOT ?>LoginRegister/LogOut" style="color:white">Log out</a>
                    </li>   
               </ul>
          </div>
     </div>
</nav>
<nav class="navbar navbar-expand-lg  navbar-dark color">
     <a class="navbar-brand" href="index.php">
          <img src= <?php echo FRONT_ROOT.VIEWS_PATH ?>img/admin.png ?>
     </a>

     <ul class="navbar-nav ml-auto">

          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/ShowAddView">Agregar Empresa</a>
          </li> 
         <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobOffer/ShowAddView">Agregar oferta</a>
          </li> 
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Student/SearchStudent">Listar Alumnos</a>
          </li>  
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/ShowListView">Listar Empresas</a>
          </li>         
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobOffer/ShowListViewAdmin">Listar ofertas</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>User/LogOut">Log out</a>
          </li>        
     </ul>
     <script src="https://kit.fontawesome.com/b4c4dc37b0.js" crossorigin="anonymous"></script>
</nav>