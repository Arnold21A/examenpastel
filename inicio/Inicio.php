      <!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Inicio</title>

          <link rel="preconnect" href="https://fonts.googleapis.com">
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
          <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,100&display=swap" rel="stylesheet">
          
          <link rel="preconnect" href="https://fonts.googleapis.com">
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
          <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
       

          <link rel="stylesheet" href="inicio.css">
      </head>
      <body>
        <!--texto annumado-->
        <header class="contenedor-header" >
    
            <p class="texto">Bon appétit</p>
 <img class="santisimo" src="Img/pastel_anim.png" alt="Cerrar">            
<a href="salir.php"><img class="close" src="Img/cerrar cesion.png" alt="Cerrar"></a>
            <div class="cont-reloj">
               
                <div class="reloj" id="reloj" > </div>  
                <div class="datos">
                    <span id="fec_Dato"> </span>
                </div>
            </div>
    

 
        </header>

        <script src="reloj.js"></script>
       <!--  menu  -->
       <div class="menu">    
  <nav>
<ul>
  <li><a href="../inicio/Inicio.php">Inicio</a></li>
  <li class="principal">
    <a href="#">Pastel</a>
    <ul>
      <li><a href="../pastel/registro_pastel.php">Nuevo Pastel</a></li>
      <li><a href="../listado_pastel/listado_pastel.php">Lista de Pastel</a></li>
    </ul>
  </li>
  <li class="principal">
    <a href="#">Ingrediente</a>
    <ul>
      <li><a href="../ingrediente/registro_ingrediente.php">Nuevo Ingrediente</a></li>
      <li><a href="../listado_ingrediente/listado_ingrediente.php">Lista de Ingredientes</a></li>
    </ul>
  </li>
          <li><a href="../detalle_pastel/detalle.php">Detalle Pastel</a></li>
</ul>
</nav>
</div>
      
        <!--slider-->
        
      
        <h1>Deguste de nuestra variedad de pasteles</h1>

        <div class="container-slaider">
            <div class="slider" id="slider">
                <div class="slider__section">
                    <img src="Img/img1.jpg" alt="" class="slider__img">
              
                </div>
                <div class="slider__section">
                    <img src="Img/img2.jpg" alt="" class="slider__img">
                </div>
                <div class="slider__section">
                    <img src="Img/img3.1.jpg" alt="" class="slider__img">
                </div>
                <div class="slider__section">
                    <img src="Img/img4.jpg" alt="" class="slider__img">
                </div>
            </div>
        
            <div class="slider__btn slider__btn--right" id="btn--right">&#62;</div>
            <div class="slider__btn slider__btn--left" id="btn--left" >&#60;</div>
            
 </div>
<script src="main.js"></script>


      </body>
      </html>
