<?php require_once "nav.php"  ?>
<main class="py-5" style="margin: -7rem 0 12rem 0">
     <section id="listado" class="mb-5">
          <div class="container pt-5">
               <h2 class="mb-4">Listado de Usuarios</h2>
               <form>
                    <div class="filtro">
                         <select name= "filter">
                              <option value="0">Estudiante</option>
                              <option value="1">Administrador</option>
                              <option value="2">Empresa</option>
                         </select>
                         <button type="submit" value="Filtrar" class="btn btn-dark ">Filtrar</button>
                    </div>
                    <br>
               </form>
               <table class="table bg-light-alpha">
                    <thead>
                         <th></th>
                         <th>ID</th>
                         <th>Email</th>
                         <th>Tipo</th>
 
                    </thead>
                    <tbody>
                         <?php

                              foreach($userList as $user)
                              {
                                   ?>
                                        <tr>
                                             <td><a href="<?php echo FRONT_ROOT; ?>User/Delete/<?php echo $user->getId();?>"><button class="btn btn-dark">Eliminar</button></a></td>
                                             <td><?php echo $user->getId(); ?></td>
                                             <td><?php echo $user->getEmail(); ?></td>
                                             <td><?php if($user->getType() == 0) echo "Estudiante";
                                                       elseif($user->getType() == 0) echo "Administrador";
                                                       else echo "Empresa";; ?></td>

                                        </tr>
                                   <?php
                                   
                              }
                         
                         ?>
                         </tr>
                    </tbody>
               </table>
               <a style="color: white;" href="ShowListViewPdf">Descargar lista completa</a>
          </div>
     </section>
</main>