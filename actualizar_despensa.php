<? Php

include('functions.php');

/*Abrimos el fichero que contiene los entity_id de los elementos*/

$nombre_fichero = "actualizar.txt";
$fichero = fopen($nombre_fichero,"a");

/*Sacamos el id del nodo*/

$nodo =fgets($fichero); //Obtenemos el nid de la lista. 

$nombre_fichero2 ="actualizar_res.txt";
$fichero2 = fopen($nombre_fichero2,"a");

/*De cada linea (entity_id), vamos leyendo los campos correspondientes en la tabla*/

while ( ($linea = fgets($fichero)) !== false) {

	$nombre = getSQLResultSet("SELECT field_nombre_producto_compra_value FROM 'drupalis_field_data_field_nombre_producto_compra' WHERE entity_id='$linea'");
	
/*	$nombre = db_query('SELECT field_nombre_producto_compra_value FROM {drupalis_field_data_field_nombre_producto_compra} WHERE entity_id = %d', $linea);
    $cantidad = db_query('SELECT field_cantidad_producto_compra_value FROM {drupalis_field_data_field_cantidad_producto_compra} WHERE entity_id = %d', $linea);
    $unidad = db_query('SELECT field_unidades_producto_compra_tid FROM {drupalis_field_data_field_unidades_producto_compra} WHERE entity_id = %d', $linea);
    $categoria = db_query('SELECT field_categoria_producto_compra_tid FROM {drupalis_field_data_field_categoria_producto_compra} WHERE entity_id = %d', $linea);
	*/
	
	/*A modo testeo, almacenamos los resultados en otro fichero. Posteriormente, serán añadidos a la despensa*/
	$n = print_r($nombre, true);
	fwrite($fichero2, $nombre . "\n");

}

/*Cerramos ficheros*/

fclose($fichero);
fclose($fichero2);


/*Volvemos a visualizar la lista*/

$referencia= $_SERVER['HTTP_REFERER'];
header ("Location: ".$referencia);

?>