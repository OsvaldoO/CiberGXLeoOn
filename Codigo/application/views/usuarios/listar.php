<link rel="stylesheet" href="<?php echo CSS_URL;?>table.css" type="text/css" />
<h2> Top 10 Usuarios </h2>
<?php if(isset($usuarios) && count($usuarios)) : ?>
			<table>
			<thead><tr>
					<th>Nick</th>
					<th>Rol</th>
					<th>Puntos</th>
					<th>Credito</th>
				</tr></thead>			
    <?php for($i = 0; $i < count($usuarios) && $i < 10 ; $i++): ?>
    		<tbody>
				<tr>
				<td><?php echo $usuarios[$i]->nick; ?></td>
				<td><?php echo $usuarios[$i]->rol; ?></td>
				<td><?php echo $usuarios[$i]->puntos; ?></td>
				<td><?php echo $usuarios[$i]->credito; ?></td> 
    		</tr>
    		</tbody>
    <?php endfor;?>
    		</table>  
<?php else: ?>
<p><strong>No hay Usuarios!</strong></p>
<?php endif; ?>