<?php
	echo 'Inscrito a los Eventos: '."<br>";
	foreach($inscripciones as $llave => $valor) 
	echo '# '.$inscripciones[$llave]['num_evento']."<br>";
?>
