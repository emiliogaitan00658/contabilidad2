<?php
include_once "../header/header_panel.php";
$dolar = datos_clientes::cambio_dolar($mysqli);
$indproducto = $_GET["producto"];
$listadataller = datos_clientes::buscar_producto($indproducto, $mysqli);
if ($listadataller==""){
    echo '<script> location.href="producto_cambio_precio.php";  </script>';
}
if($_POST){
    $codigo=$_POST["textcodigo"];
    $producto=$_POST["textproducto"];
    $precio1=$_POST["textprecio1"];
    $precio2=$_POST["textprecio2"];
    $precio3=$_POST["textprecio3"];
    $codigobarra=$_POST["textbarra"];
    datos_clientes::cambio_dato_producto($indproducto,$producto,$precio1,$precio2,$precio3,$codigobarra,$mysqli);
    echo '<script> swal({
  title: "Producto Actualizado?",
  text: "Exito Cambios!",
  icon: "success",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   location.href="Edit_producto.php?producto='. $indproducto.'";
  } else {
    location.href="Edit_producto.php?producto='. $indproducto.'";
  }
}); </script>';

}

?>
<br>
<div class="white rounded z-depth-2 center-block" style="border-radius: 6px;width: 90%">
    <div style="padding: 1em">
        <h5 class="alert-primary" style="padding: 6px;border-radius: 6px">Editar los datos del producto</h5>
        <p><span class="red-text">*</span>El precio del producto debe de ser ingresado en dolar</p>
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?producto=".$indproducto;?>" method="post">
            <section class="row">
                <div class="control-pares col-md-2">
                    <label for="">Codigo</label>
                    <input type="text" name="textcodigo" class="form-control" placeholder="producto"
                           value="<?php echo $listadataller["codigo_producto"] ?>" readonly=readonly required>
                </div>
                <div class="control-pares col-md-5">
                    <label for="">Detalle del Producto</label>
                    <input type="text" name="textproducto" class="form-control" placeholder="producto"
                           value="<?php echo $listadataller["nombre_producto"] ?>" required>
                </div>
                <div class="control-pares col-md-1">
                    <label for="">Precio 1 $</label>
                    <input type="text" name="textprecio1" class="form-control" placeholder="producto"
                           value="<?php echo $listadataller["precio1"] ?>" required>
                </div>
                <div class="control-pares col-md-1">
                    <label for="">Precio 2 $</label>
                    <input type="text" name="textprecio2" class="form-control" placeholder="producto"
                           value="<?php echo $listadataller["precio2"] ?>" required>
                </div>
                <div class="control-pares col-md-1">
                    <label for="">Precio 3 $</label>
                    <input type="text" name="textprecio3" class="form-control" placeholder="producto"
                           value="<?php echo $listadataller["precio3"] ?>" required>
                </div>
                <div class="control-pares col-md-2">
                    <label for="">Codigo de barra</label>
                    <input type="text" name="textbarra" class="form-control" placeholder="Codigo Barra"
                           value="<?php echo $listadataller["fecha_vencimiento"] ?>" required>
                </div>
                <br>
                <br>
                <br>
                <br>
                <div class="control-pares col-md-4">
                    <input type="submit" value="Guardar" class="btn white-text blue-grey btn-primary"/>
                </div>
            </section>

        </form>
        <a class="btn btn-dark light-blue right" href="producto_cambio_precio.php"><i class="icon-arrow-left2"></i>Regresar</a>
        <br>
        <hr>
    </div>
</div>
<?php
include_once "../header/footer_temporal.php";
?>
