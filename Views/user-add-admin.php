<?php
    require_once('nav.php');
?>
<main class="py-5"   style="margin: -5rem 0 10rem 0">
     <section id="listado" class="mb-5">
          <div class="container pt-5">
               <h2 class="mb-4">Agregar Usuario</h2>
               <form action="<?php echo FRONT_ROOT ?>LoginRegister/RegisterAdmin" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">E-mail</label>
                                   <input type="email" name="email" value="" class="form-control" required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Contraseña</label>
                                   <input type="password" name="password" value="" class="form-control" required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Tipo</label>
                                   <select class="form-control" name="type">
                                        <option value=0>Estudiante</option>
                                        <option value=1>Admin</option>
                                   </select>
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Agregar</button>
               </form>
               <span class="badge badge-info" style="font-size: 15px;"><?php echo $message ?></span>                    
          </div>
     </section>
</main>