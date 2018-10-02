<?php 
if(isset($_POST['apellido'])){
    $_POST['apellido']=htmlentities($_POST['apellido']);
    $_POST['ocupacion']=htmlentities($_POST['ocupacion']);
    $_POST['email']=htmlentities($_POST['email']);
    $_POST['postal']=htmlentities($_POST['postal']);
    $_POST['telefono']=htmlentities($_POST['telefono']);
    $_POST['titulo']=htmlentities($_POST['titulo']);
    $mensaje="Apellidos: ". $_POST['apellido']."\n Ocupacion: ". $_POST['ocupacion']."\n Direccion de Correo electronico: ". $_POST['email']. "\n Doreccion de envio: " . $_POST['postal']."\n Telefono: " . $_POST['telefono'] ." \n Titulo profesional: " . $_POST['titulo']. "";
    $date=date('dmYHisu');
    $handler = fopen("envio".$date.".txt",'x+');
    fwrite($handler,$mensaje);
    fclose($handler);
}
?>
<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<div id="box" style="width: 900px; margin: auto;">
			<div style="width: 50%; margin: auto; border-style: solid; border-color: black; text-align: center;">
				<?php 
				if(isset($_POST['apellido'])){
				    if(file_exists("envio".$date.".txt")){
				        echo"<p>Envio Realizado Correctamente</p>";
				    }else{
				        echo"<p>No se realizo el envio</p>";
				    }
				}
				?>
				<form action="index.php" method="post">
    				<p><label for="appellido">Apellidos:</label>
    				<input type="text" name="apellido" id="apellido" size=30 required="required">
    				</p>
    				<p><label for="ocupacion">Ocupaci&oacute;n:</label>
    				<input type="text" name="ocupacion" id="ocupacion" size=30>
    				</p>
    				<p><label for="email">Email:</label>
    				<input type="mail" name="email" id="email" size=30 required="required">
    				</p>
    				<p><label for="postal">Direcci&oacute;n de envio:</label>
    				<input type="text" name="postal" id="postal" size=30 required="required">
    				</p>
    				<p><label for="telefono">Tel&eacute;fono:</label>
    				<input type="text" name="telefono" id="telefono" size=9 maxlength="9">
    				</p>
    				<p><label for="titulo">T&iacute;tulo profesional:</label>
    				<input type="text" name="titulo" id="titulo" size=30>
    				</p>
    				<p><button type="submit" name="enviar">Enviar</button></p>
    			</form>
			</div>
		</div>
	</body>
</html>
