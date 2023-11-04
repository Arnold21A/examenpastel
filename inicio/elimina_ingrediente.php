<?php

include "../conexion.php";

if(!empty($_POST))
{
$idusuario = $_POST['id_ingrediente'];

//$query_delete = mysqli_query($conection,"DELETE FROM usuario WHERE idusuario =$idusuario ");
$query_delete = mysqli_query($conection,"UPDATE ingrediente SET estatus = 0 WHERE id_ingrediente = $idusuario ");

if($query_delete){
    header("location: ../listado_ingrediente/listado_ingrediente.php");
}else{
    echo "Error al eliminar";
}

}


if(empty($_REQUEST['id']) ||$_REQUEST['id'] ==1 )
{
    header("location: ../listado_ingrediente/listado_ingrediente.php");
}else{

    include "../conexion.php";

    $idusuario = $_REQUEST['id'];

    $query = mysqli_query($conection,"SELECT i.nombre,i.ingrediente
                                        FROM ingrediente i
                                        WHERE i.id_ingrediente = $id_ingrediente ");
    $result = mysqli_num_rows($query);

    if($result > 0){
        while ($data = mysqli_fetch_array($query)) {

            $nombre = $data['nombre'];
            $descripcion = $data['descripcion'];
        }
    }else{
        header("location: ../listado_ingrediente/listado_ingrediente.php");
    }

}


?>

<!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Eliminar Usuario</title>

          <link rel="preconnect" href="https://fonts.googleapis.com">
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
          <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,100&display=swap" rel="stylesheet">
          
          <link rel="preconnect" href="https://fonts.googleapis.com">
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
          <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
       

          <link rel="stylesheet" href="eliminar.css">
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
				<li><a href="Inicio.php">Inicio</a></li>
				<li class="principal">
					<a href="#">Pastel</a>
					<ul>
						<li><a href="../pastel/registro_pastel.php">Nuevo Pastel</a></li>
						<li><a href="../listado_pastel/listado_pastel.php">Lista de Pasteles</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Ingredientes</a>
					<ul>
						<li><a href="../ingrediente/registro_ingrediente.php">Nuevo Ingrediente</a></li>
						<li><a href="../listado_ingrediente/listado_ingrediente.php">Lista de Ingredientes</a></li>
					</ul>
				</li>
                <li><a href="../detalle_pastel/detalle.php">Detalle de Pastel</a></li>
			</ul>
		</nav>
    </div> 
      
        <!--slider-->
                
        <h1>Deguste de nuestra variedad de pasteles</h1>
       
        <div class="data_delete">
            <h2>¿Está seguro de eliminar el siguiente registro?</h2>
            <p>Nombre: <span> <?php echo $nombre; ?></span></p>
            <p>usuario: <span><?php echo $usuario; ?></span></p>

            <form  class="form-user" method="post" action="">
                <input class="btn__registro--input"  type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
                <a href="../listado_ingrediente/listado_ingrediente.php" class="btn_cancel">Cancelar</a>
                <input class="btn__registro--input" type="submit" value="Eliminar" class="btn_ok">
            </form>

        </div>

       
<script src="main.js"></script>


</section>
      </body>
      </html>
