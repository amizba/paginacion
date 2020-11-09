<?php
require_once ("Conexion.php");

if (! (isset($_GET['PaginaNumero']))) {
    $PaginaNumero = 1;
} else {
    $PaginaNumero = $_GET['PaginaNumero'];
}

$CantidadPagina = 5;

$sql = "SELECT * FROM manuales  WHERE 1";

if ($result = mysqli_query($conn, $sql)) {
    $rowCount = mysqli_num_rows($result);
    mysqli_free_result($result);
}

$pagesCount = ceil($rowCount / $CantidadPagina);

$lowerLimit = ($PaginaNumero - 1) * $CantidadPagina;

// Controlar las tildes y ñ en los resultados desde MySQL
mysqli_set_charset($conn,"utf8");

$sqlQuery = " SELECT * FROM manuales WHERE 1 limit " . ($lowerLimit) . " ,  " . ($CantidadPagina) . " ";
$results = mysqli_query($conn, $sqlQuery);

?>

<table class="table">
  <thead class="thead-dark">
   <tr>
      <th scope="col">Autor</th>
        <th scope="col">Titulo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($results as $data) { ?>
    <tr>
        <td align="left"><?php echo $data['Autor'] ?></td>
        <td align="left"><?php echo $data['Titulo'] ?></td>
    </tr>
    <?php
    }
    ?>
      </tbody>
</table>

<div style="height: 30px;"></div>
<table width="100%" align="center">
    <tr>

        <td valign="top" align="left"></td>


        <td valign="top" align="center">
 <ul class="pagination">
 
	<?php
	for ($i = 1; $i <= $pagesCount; $i ++) {
    if ($i == $PaginaNumero) {
        ?> <li class="page-item active">
	      <a href="javascript:void(0);" class="page-link"><?php echo $i ?></a></li>
<?php
    } else {
        ?>
        
	    <li class="page-item">  <a href="javascript:void(0);" class="pages page-link"
           onclick="showRecords('<?php echo $CantidadPagina;  ?>', '<?php echo $i; ?>');"><?php echo $i ?></a></li>
<?php
    } // endIf
} // endFor

?>
</ul>

</td>
        <td align="right" valign="top">
	     Pagina <?php echo $PaginaNumero; ?> de <?php echo $pagesCount; ?>
	</td>
    </tr>
</table>