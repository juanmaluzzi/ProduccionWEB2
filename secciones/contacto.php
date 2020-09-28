
    <div class="hero-2" style="background-image: url('images/hero_2.jpg');">
     <div class="container">
        <div class="row justify-content-center text-center align-items-center">
          <div class="col-md-8">
            <span class="sub-title">Wines Co.</span>
            <h2>Contacto</h2>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section bg-light">
      <div class="container">
        <div class="row">

          <div class="col-lg-12">
            <div class="section-title mb-5">
              <h2>Contactenos</h2>
            </div>
            <form  method="post" class="formulario">
              
              <div class="row">
                  <div class="col-md-6 form-group">
                      <label for="nombre">Nombre</label>
                      <input name="Nombre" type="text" class="form-control form-control-lg" required>
                  </div>
                  <div class="col-md-6 form-group">
                      <label for="apellido">Apellido</label>
                      <input name="Apellido" type="text" class="form-control form-control-lg">
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6 form-group">
                      <label for="email">Email</label>
                      <input name="Email" type="email" class="form-control form-control-lg" required>
                  </div>
                  <div class="col-md-6 form-group">
                      <label for="tel">Teléfono</label>
                      <input name="Teléfono" type="tel" class="form-control form-control-lg" >
                  </div>
                   <div class="col-md-6 form-group">
                          <label for="areacomercial">¿Con qué área querés comunicarte?</label>
                         <br>
                       
                          <input type="radio" name="radio1"  >
                          <label for="comercial">Área comercial</label>
                          <input type="radio" name="radio2"  >
                          <label for="marketing">Marketing</label>
                          <input type="radio" name="radio3"  >
                          <label for="cobranzas">Cobranzas</label>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12 form-group">
                      <label for="mensaje">Mensaje</label>
                      <textarea name="Mensaje" cols="30" rows="10" class="form-control" required></textarea>
                  </div>
              </div>

              <div class="row">
                  <div class="col-12">
                      <input name="contacto01" type="submit" value="Enviar mensaje" class="btn btn-primary py-3 px-5">
                  </div>
              </div>
        
        </form>
        <br>
         <!--CORREO-->
         
         
        <?php 
          include("contacto2.php");
        ?>
        
        
      </div>
      
    </div>

    
  </div>
</div>

