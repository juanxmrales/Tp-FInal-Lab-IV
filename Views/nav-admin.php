<nav class="navbar navbar-expand-lg  navbar-dark bg-dark fixed-top">
     <div class="container">
          <a class="navbar-brand" href="index.php">
               <img src= <?php echo FRONT_ROOT.VIEWS_PATH ?>img/admin.png ?>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
               <ul class="navbar-nav">
                    <li class="nav-item">
                         <a class="nav-link" href="<?php echo FRONT_ROOT ?>Student/SearchStudent">Listar Alumnos</a>
                    </li>     
                    <li class="nav-item">
                         <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/ShowListView">Listar de Empresas</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/ShowAddView">Agregar Empresa</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobPosition/ShowAddView">Agregar oferta</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobPosition/ShowListView">Mostrar ofertas</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="<?php echo FRONT_ROOT ?>User/LogOut">Log out</a>
                    </li>     
               </ul>
          </div>
     </div>
</nav>