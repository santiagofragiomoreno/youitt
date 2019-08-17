<?php
?>
<p>
Buenas Sr/Sra <?php echo $client->username?>, hemos detectado que ha introducido un nuevo producto en su sistema. Dicho producto no consta en nuestra Base de Datos.
</p>
<p>
Estamos trabajando para añadirlo a nuestra base de datos en el menor tiepo posible.
</p>
<p>
No obstante dicho producto se ha añadido a su base de datos correctamente pero sin un nombre identificativo.
</p>
<p>
En cuanto dispongamos de toda la informacion del producto, lo actualizaremos en su despensa.
</p>
<p>
DATOS DEL PRODUCTO:
</p>
<li>
	<ul>
	CODIGO DEL PRODUCTO: <?php echo $model->productos_codigo;?>
	</ul>
	<ul>
	PESO INTRODUCIDO: <?php echo $model->productos_peso_producto;?>
	</ul>
</li>
<p>
Muchas Gracas.
</p>
<p>
Youitt.com
</p>