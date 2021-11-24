<?php
    require_once('nav.php');

?>
<main class="py-5" style="margin: -5rem 0 10rem 0">
     <section id="listado" class="mb-5">
          <div class="container pt-5">
               <h2 class="mb-4">Declinando postulante</h2>
               <form action="<?php echo FRONT_ROOT ?>JobOffer/DeclinePostulate" method="post" class="bg-light-alpha p-5">
                    <h4>Ingrese justificativo</h4>
                    <div class="row">                       
                         
                         <input name="idUser" value="<?php echo $idUser; ?>" readonly>
                         <input name="idJob" value="<?php echo $idJob; ?>" readonly>
                         <textarea placeholder="Informacion acerca de la declinacion" rows="10" name="info" class="form-control">
                              
                         </textarea>

                    </div>
                    <button  type="submit" class="btn btn-dark ml-auto d-block">Enviar</button>
               </form>
          </div>
     </section>
</main>