<?php

include "../conexion.php";

?>

<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="UTF-8">
        <title>Recetas Pastel</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
       
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
      
        <!-- menu despegable -->
     <div class="menu">    
        <nav>
			<ul>
				<li><a href="../inicio/Inicio.php">Inicio</a></li>
				<li class="principal">
					<a href="#">Pastel</a>
					<ul>
						<li><a href="../pastel/registro_pastel.php">Nuevo Pastel</a></li>
						<li><a href="listado_pastel.php">Lista de Pasteles</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Ingrediente</a>
					<ul>
						<li><a href="../ingrediente/registro_ingrediente.php">Nuevo Ingrediente</a></li>
						<li><a href="../listado_ingrediente/listado_ingrediente.php">Lista de Ingredientes</a></li>
					</ul>
				</li>
                <li><a href="detalle.php">Detalle Pastel</a></li>
			</ul>
		</nav>
    </div> 
 
        <section id="container">

            <h2 class="lista-title" >Detalle de pastel</h2>
            <a href="../pastel/registro_pastel.php" class="btn_new">Imprimir</a>

            <form action="buscar_pastel.php" method="get" class="fomr_search">                
                <input type="text" name="busqueda" id="busqueda" placeholder="Nombre pastel">
                <input type="submit" value="Buscar" class="btn_search">
            </form>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre Ingrediente</th>
                    <th>Cantidad</th>
                    
                </tr>
                
                    </td>
                </tr>

                
            </table>
            <div class="paginador">
                <ul>
                         
                    <li><a href="?pagina=<?php echo 1; ?>">|<</a></li>
                    <li><a href="?pagina=<?php echo $pagina-1; ?>"><<</a></li>
                
                    <li><a href="?pagina=<?php echo $pagina + 1; ?>">>></a></li>
                    <li><a href="?pagina=<?php echo $total_paginas; ?> ">>|</a></li>
                    
                </ul>
            </div>

        </section>
       
    </body>
</html>