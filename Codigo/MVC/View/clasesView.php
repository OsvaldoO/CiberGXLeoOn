
<form action="index.php" method="GET">
Clientes <select name="accion">
  <option value="registrar">Registrar</option>
  <option value="consultar">Consultar</option>
  <option value="agregarCredito">Agregar Credito</option>
  <option value="agregarPuntos">Agregar Puntos</option>
  <option value="cambiarAvatar">Cambiar Abatar</option>
</select>
<input type="submit" name="evento" value="clientes" />
</form>

<form action="index.php" method="GET">
Empleados <select name="accion">
  <option value="contratar">Contratar</option>
  <option value="consultar">Consultar</option>
  <option value="aumentarTiempo">Aumentar Saldo</option>
  <option value="despedir">Despedir</option>
</select>
<input type="submit" name="evento" value="empleados" />
</form>

<form action="index.php" method="GET">
juegos <select name="accion">
  <option value="agregar">Agregar</option>
  <option value="consultar">Consultar</option>
  <option value="descartar">Descartar</option>
</select>
<input type="submit" name="evento" value="juegos" />
</form>

<form action="index.php" method="GET">
Eventos <select name="accion">
  <option value="publicar">Publicar</option>
  <option value="consultar">Consultar</option>
  <option value="premiar">Premiar</option>
  <option value="cancelar">Cancelar</option>
  <option value="verMisEventosGanados">Mis Eventos Ganados</option>
</select>
<input type="submit" name="evento" value="eventos" />
</form>

<form action="index.php" method="GET">
Logros <select name="accion">
  <option value="otorgar">Otorgar</option>
  <option value="consultar">Consultar</option>
  <option value="verLogrosCliente">Ver Logros Cliente</option>
</select>
<input type="submit" name="evento" value="logros" />
</form>

<form action="index.php" method="GET">
Rentas <select name="accion">
  <option value="realizar">Realizar</option>
  <option value="consultar">Consultar</option>
</select>
<input type="submit" name="evento" value="rentas" />
</form>