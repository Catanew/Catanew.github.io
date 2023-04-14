<?php require_once('Connections/contacto.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO hola (Nombre, Email, Mensaje) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['Nombre'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Mensaje'], "text"));

  mysql_select_db($database_contacto, $contacto);
  $Result1 = mysql_query($insertSQL, $contacto) or die(mysql_error());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>contactos</title>
<style type="text/css">
a:link {
	color: #BE9641;
	text-decoration: none;
}
a:visited {
	color: #BE9641;
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>

<body>
<table width="1340" border="0" align="center" cellpadding="8" cellspacing="0" bgcolor="#E9E4D8">
<tr>
<td width="1182" align="right" bgcolor="#D6D6D6" ><font color="#BE9641"><a href="login.php">Iniciar sesion</a></font></td>
<td width="67" align="right" bgcolor="#D6D6D6"><font color="#BE9641"><a href="registro.php">Registrarse</a></font></td>


</tr>

</table>
<table  width="1340" border="0" align="center" cellpadding="8" cellspacing="0" bgcolor="#FFFFFF">
<tr>
<td>&nbsp;</td>
</tr>
</table>
<table width="1340" border="0" align="center" cellpadding="8" cellspacing="0" bgcolor="#FFE1F0">
  <tr>
    <td width="249"><font color="#994D4D"  size="5">La Flor de Cervantes</font></td>
    </font></td>
    <td width="25">&nbsp;</td>
    <td width="1018"><table width="832" border="0" align="center" cellpadding="8" cellspacing="0">
      <tr>
        <td width="109"><font color="#BE9641"><a href="index.html">INICIO</a></font></td>
        <td width="185"><a href="presentacion.html"><font color="#BE9641">QUIÉNES SOMOS</font></a></td>
        <td width="138"><font color="#BE9641"><a href="flores.html">CATÁLOGO</a></font></td>
        <td width="129"><font color="#BE9641"><a href="terminos.html">TÉRMINOS</a></font></td>
        <td width="191"><font color="#BE9641"><a href="contactos.php">CONTÁCTANOS</a></font></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="1340" border="0" cellspacing="0" cellpadding="8">
  <tr>
    <td width="639" bgcolor="#FFFFFF"><font face="Century Gothic" size="3"><center>
          <p align="center">&nbsp;</p>
          <p align="center"><a href="index.html">INICIO</a></p>
          <p align="center">&nbsp;</p>
    
    </center>
    </font></td>
    
</table>
<table width="1340" border="0" cellspacing="0" cellpadding="8">
  <tr>
    
    <td width="215" align="center" bgcolor="#FFE1F0"><font face="Century Gothic" size="3" color="#BE9641">Envíanos un mensaje</font></td>
    
  </tr>
  <tr>
   
    <td width="1093" colspan="2" rowspan="3" bgcolor="#FFE1F0"><table width="842" border="0" cellspacing="0" cellpadding="8">
      <tr>
         
      </tr>
    </table>
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
        <table width="572" height="202" border="1" align="center">
          <tr valign="baseline">
            <td align="right" nowrap="nowrap" bgcolor="#D6D6D6"><font face="Century Gothic" size="3">Nombre:</font></td>
            <td bgcolor="#D6D6D6"><input type="text" name="Nombre" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap" bgcolor="#D6D6D6"><font face="Century Gothic" size="3">Email:</font></td>
            <td bgcolor="#D6D6D6"><input type="text" name="Email" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap" bgcolor="#D6D6D6"><font face="Century Gothic" size="3">Mensaje:</font></td>
            <td bgcolor="#D6D6D6"><input type="text" name="Mensaje" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap" bgcolor="#D6D6D6">&nbsp;</td>
            <td align="center" bgcolor="#D6D6D6"><input type="submit" value="Insertar registro" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form1" />
      </form>
<p>&nbsp;</p>    </table>
   <table width="1340" border="0" cellspacing="0" cellpadding="8">
  <tr>
    <td colspan="3" align="right" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
  <td colspan="3" bgcolor="#FFE1F0"><center>
      <p>&nbsp;</p>
      <p><font color="#994D4D"  size="5">La Flor de Cervantes</font></p>
    </center></td>
    
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FFE1F0"><center>
      <p><font face="Century Gothic">Tu eres nuestra razón de ser</font></p>
      <p>&nbsp;</p>
    </center></td>
  </tr>
  <tr>
    <td width="256" bgcolor="#FFE1F0">&nbsp;</td>
    <td width="932" bgcolor="#FFE1F0"><table width="832" border="0" align="center" cellpadding="8" cellspacing="0">
      <tr>
        <td width="109"><font color="#BE9641"><a href="index.html">INICIO</a></font></td>
        <td width="185"><a href="presentacion.html"><font color="#BE9641">QUIÉNES SOMOS</font></a></td>
        <td width="138"><font color="#BE9641"><a href="contactos.php">CATÁLOGO</a></font></td>
        <td width="129"><font color="#BE9641"><a href="terminos.html">TÉRMINOS</a></font></td>
        <td width="191"><font color="#BE9641"><a href="contactos.php">CONTÁCTANOS</a></font></td>
      </tr>
    </table></td>
    <td width="104" bgcolor="#FFE1F0">&nbsp;</td>
    
  </tr>
</table>
<table width="1340" border="0" cellspacing="0" cellpadding="8">
  <tr>
    <td width="1385" bgcolor="#D6D6D6"><font face="Century Gothic"><p>Copyright &copy; 2023 La flor de Cervantes.</p>
    <p>C.P♡</p></font></td>
  </tr>
</table>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>