<?php

include "../conexion.php";

?>

<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="UTF-8">
        <title>Listado de Pasteles</title>
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
                <li><a href="../detalle_pastel/detalle.php">Detalle Pastel</a></li>
			</ul>
		</nav>
    </div> 
 
        <section id="container">

            <h2 class="lista-title" >Lista de Pasteles</h2>
            <a href="../pastel/registro_pastel.php" class="btn_new">Crear Pastel</a>

            <form action="buscar_pastel.php" method="get" class="fomr_search">                
                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
                <input type="submit" value="Buscar" class="btn_search">
            </form>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Preparado Por</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Vencimiento</th>
                    <th>Acciones</th>
                </tr>
                <?php

                //Paginador

                //$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM pastel");
                //$result_register = mysqli_fetch_array($sql_registe);
                //$total_registro = $result_register['total_registro'];

                //$por_pagina = 4;

                //if(empty($_GET['pagina']))
                //{
                    //$pagina = 1;
                //}else{
                  //  $pagina = $_GET['pagina'];
                //}

                //$desde = ($pagina-1) * $por_pagina;
                //$total_paginas = ceil($total_registro / $por_pagina);

                $query = mysqli_query($conection,"SELECT p.id_Pastel, p.nombre, p.descripcion, p.preparado_por, p.creacion, p.vencimiento FROM pastel p ");

                $result = mysqli_num_rows($query);
                if($result > 0){

                    while($data = mysqli_fetch_array($query)){

            ?>
                        
            <tr>
                    <td><?php echo $data["id_Pastel"]; ?></td>
                    <td><?php echo $data["nombre"]; ?></td>
                    <td><?php echo $data["descripcion"]; ?></td>
                    <td><?php echo $data["preparado_por"]; ?></td>
                    <td><?php echo $data["creacion"]; ?></td>
                    <td><?php echo $data["vencimiento"]; ?></td>
                             
                    <td>
                        <a class="link_edit" href="../pastel/editar_pastel.php?id=<?php echo $data["id_Pastel"]; ?>">Editar</a>
                        
                        
                            |                        
                        <a class="link_delete" href="../inicio/elimina_pastel.php?id=<?php echo $data["id_Pastel"]; ?>">Eliminar</a>
                        
                        <?php }?>
                    </td>
                </tr>

                <?php
            }
                                    
         
        ?>
            </table>
            <div class="paginador">
                <ul>
                    <?php
                        //if($pagina != 1)
                        {
                    ?>        
                    <li><a href="?pagina=<?php echo 1; ?>">|<</a></li>
                    <li><a href="?pagina=<?php echo $pagina-1; ?>"><<</a></li>
                 <?php
                        }
                    //for ($i=1; $i <= $total_paginas; $i++) {

                        //if($i == $pagina)
                        //{
                          //  echo '<li class="pageSelected">'.$i.'</li>';    
                       // }else{
                         //   echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';

                   // }
                    //}

                        //if($pagina != $total_paginas)
                        {
                    ?>
                    <li><a href="?pagina=<?php echo $pagina + 1; ?>">>></a></li>
                    <li><a href="?pagina=<?php echo $total_paginas; ?> ">>|</a></li>
                    <?php } ?>
                </ul>
            </div>

        </section>
       
    </body>
</html>