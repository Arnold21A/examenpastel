<?php

include "../conexion.php";

?>

<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="UTF-8">
        <title>Listado de Pastel</title>
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
						<li><a href="../pastel/registro_pastel.php">Nuevo Pastel</s></a></li>
						<li><a href="listado_pastel.php">Lista de Pasteles</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Ingredientes</a>
					<ul>
						<li><a href="/ingrediente/registro_ingrediente.php">Nuevo Ingrediente</a></li>
						<li><a href="../listado_ingrediente/listado_ingrediente.php">Lista de Ingredientes</a></li>
					</ul>
				</li>
                <li><a href="../detalle_pastel/detalle.php">Detalle Pastel </a></li>
			</ul>
		</nav>
    </div> 
 
        <section id="container">
            <?php

            $busqueda = strtolower($_REQUEST['busqueda']);
            if(empty($busqueda))
            {
                header("location: listado_ingrediente.php");
            }

            ?>

            <h2 class="lista-title" >Lista de Ingredientes</h2>
            <a href="../ingrediente/registro_ingrediente.php" class="btn_new">Crear Pastel</a>

            <form action="buscar_ingrediente.php" method="get" class="fomr_search">                
                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
                <input type="submit" value="Buscar" class="btn_search">
            </form>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Usuario</th>
                    <!--th>Rol</th-->
                    <th>Acciones</th>
                </tr>
                <?php

                //Paginador

                $sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM usuario
                                                                    WHERE ( idusuario LIKE '%$busqueda%' OR
                                                                    nombre LIKE '%$busqueda%' OR
                                                                    correo LIKE '%$busqueda%' OR
                                                                    usuario LIKE '%$busqueda%' ) 
                                                                    AND estatus = 1");
                $result_register = mysqli_fetch_array($sql_registe);
                $total_registro = $result_register['total_registro'];

                $por_pagina = 4;

                if(empty($_GET['pagina']))
                {
                    $pagina = 1;
                }else{
                    $pagina = $_GET['pagina'];
                }

                $desde = ($pagina-1) * $por_pagina;
                $total_paginas = ceil($total_registro / $por_pagina);

                $query = mysqli_query($conection,"SELECT u.idusuario, u.nombre, u.correo, u.usuario FROM usuario u
                                                        WHERE
                                                        ( u.idusuario LIKE '%$busqueda%' OR
                                                        u.nombre LIKE '%$busqueda%' OR
                                                        u.correo LIKE '%$busqueda%' OR
                                                        u.usuario LIKE '%$busqueda%' )
                                                        AND
                                                        estatus = 1 ORDER BY u.idusuario ASC LIMIT $desde,$por_pagina 
                                                         ");

                $result = mysqli_num_rows($query);
                if($result > 0){

                    while($data = mysqli_fetch_array($query)){

            ?>
                        
            <tr>
                    <td><?php echo $data["idusuario"]; ?></td>
                    <td><?php echo $data["nombre"]; ?></td>
                    <td><?php echo $data["correo"]; ?></td>
                    <td><?php echo $data["usuario"]; ?></td>                             
                    <td>
                        <a class="link_edit" href="../ingrediente/registro_ingrediente.php?id=<?php echo $data["idusuario"]; ?>">Editar</a>
                        
                        <?php if($data["idusuario"] != 1){

                            ?>
                            |                        
                        <a class="link_delete" href="../inicio/elimina_ingrediente.php?id=<?php echo $data["idusuario"]; ?>">Eliminar</a>
                        
                        <?php }?>
                    </td>
                </tr>

                <?php
            }
        }                            
         
        ?>
            </table>
            <?php

                if($total_registro != 0)
                {
            ?>
            <div class="paginador">
                <ul>
                    <?php
                        if($pagina != 1)
                        {
                    ?>        
                    <li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo $busqueda; ?>">|<</a></li>
                    <li><a href="?pagina=<?php echo $pagina-1; ?>&busqueda=<?php echo $busqueda; ?>"><<</a></li>
                 <?php
                        }
                    for ($i=1; $i <= $total_paginas; $i++) {

                        if($i == $pagina)
                        {
                            echo '<li class="pageSelected">'.$i.'</li>';    
                        }else{
                            echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.'">'.$i.'</a></li>';

                    }
                    }

                        if($pagina != $total_paginas)
                        {
                    ?>
                    <li><a href="?pagina=<?php echo $pagina + 1; ?>&busqueda=<?php echo $busqueda; ?>">>></a></li>
                    <li><a href="?pagina=<?php echo $total_paginas; ?>&busqueda=<?php echo $busqueda; ?> ">>|</a></li>
                    <?php } ?>
                </ul>
            </div>
<?php } ?>
        </section>
       
    </body>
</html>