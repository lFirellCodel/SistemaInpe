<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
 <title>Serialize jQuery Demo en Cerocreativo.cl</title>
<script type="text/javascript" src="jquery-1.4.2.min.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
 $("#formulario").submit(function(){
 var cadena = $(this).serialize();
 alert(cadena);
 return false;
 });
 });
</script>
</head>
<body>
<form action="#" id="formulario">
<label for="nombre">Nombre:</label>
<input type="text" name="nombre" id="nombre"/><br />
<label for="email">E-mail:</label>
<input type="text" name="email" id="email"/><br />
<label for="asunto">Asunto:</label>
<input type="text" name="asunto" id="asunto"/><br />
<label for="msg">Mensaje:</label>
<textarea name="msg" id="msg" cols="5" rows="10" tabindex="4"></textarea><br />
<input type="submit" value="Enviar" />
</form>
 
</body>
</html>

<?php 

  $combo1 = "hola";
    $combo = explode(',', $combo1)  ; 
    var_dump($combo[0]);

?>