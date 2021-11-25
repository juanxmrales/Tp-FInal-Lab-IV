<?php

use Models\JobOffer;

require_once('nav.php');

?>
<main class="py-5" style="margin: -5rem 0 12rem 0">
     <section id="listado" class="mb-5">
          <div class="container pt-5">
               <h2 class="mb-4">Listado de Ofertas</h2>
               <form>
                    <div class="filtro">
                         <input type="text" name="position" id="position" placeholder="Posicion" class="form-control">
                         <input type="text" name="career" id="career" placeholder="Carrera" class="form-control">              
                         <button type="submit" value="Filtrar" class="btn btn-dark ">Filtrar</button>
                    </div>
                    <br>
               </form>
               <table class="table bg-light-alpha">
                    <thead>
                         <th></th>
                         <th></th>
                         <th></th>
                         <th>Posicion</th>
                         <th>Compania</th>
                         <th>Carrera</th>
                         <th>Fecha</th>
                         <th>Descripcion</th>
                         <th>Imagen</th>
                    </thead>
                    <tbody>
                         <?php
                         	if($jobOfferList){

                                   foreach($jobOfferList as $jobOffer)
                                   {    
                                        ?>

                                        <tr>
                                             <td><a href="<?php echo FRONT_ROOT; ?>JobOffer/ShowAddImageView/<?php echo $jobOffer->getId();?>"><button class="btn btn-dark ml-auto d-block" <?php if($jobOffer->getImagen()!=null){ echo "disabled";}?>>Agregar Imagen</button></a></td>
                                             <td><a href="<?php echo FRONT_ROOT; ?>JobOffer/ShowPostulates/<?php echo $jobOffer->getId();?>"><button class="btn btn-dark ml-auto d-block">Ver Postulados</button></a></td>
                                             <td><a href="<?php echo FRONT_ROOT; ?>Company/ShowCompanyProfile/<?php echo $jobOffer->getIdCompany();?>"><button class="btn btn-dark ml-auto d-block">Ver Mas</button></a></td>
                                             <td><?php echo $jobOffer->getJobPosition(); ?></td>
                                             <td><?php echo $jobOffer->getCompany(); ?></td>
                                             <td><?php echo $jobOffer->getCareer(); ?></td>
                                             <td><?php echo $jobOffer->getFecha(); ?></td>
                                             <td><?php echo $jobOffer->getDescription(); ?></td>
                                             <?php
                                                  if($jobOffer->getImagen()!=null)
                                                  {
                                                       ?>
                                                            <td><img src="<?php echo FRONT_ROOT . $jobOffer->getImagen();?>" alt="" style="width: 100px;"></td>
                                                       <?php
                                                  }
                                                  else
                                                  {
                                                       ?>
                                                            <td>Imagen no disponible</td>
                                                       <?php
                                                  }
                                             ?>
                                        </tr>

                                        <?php
                                   }
                         }
                         else
                              echo "<tr><td>No se encontraron resultados</td></tr>";
                         ?>
                    </tbody>
               </table>
          </div>
     </section>
</main>
