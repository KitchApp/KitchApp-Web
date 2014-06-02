<? Php
//Actualizar despensa en 2 pasos

/*Al Acceder a una lista, creamos un arcivo con su Id*/
$name = $node->nid;
$archivo ="actualizar.txt";
$f = fopen($archivo, "w"); //Se abre el archivo .txt
fwrite($f, $name . "\n");

/*Luego añadimos el entity_id de todos los elementos que la componen*/

for($i = 0; $i < count($node->field_productos_compra[und]); ++$i) {

	$nodo = print_r($node->field_productos_compra[und][$i][value], true);
	fwrite($f,$nodo . "\n");

} 
fclose($f);
?>
