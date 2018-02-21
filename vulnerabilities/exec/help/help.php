<div class="body_padded">
	<h1>Ayuda - Inyecci�n de Comando</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>Acerca de</h3>
		<p>El objetivo del ataque de inyecci�n de comandos es inyectar y ejecutar comandos especificados por el atacante en la aplicaci�n vulnerable. En una situaci�n como esta, la aplicaci�n, que ejecuta los comandos del sistema no deseados, es como un pseudo shell del sistema, y el atacante puede usarlo como cualquier usuario autorizado del sistema. Sin embargo, los comandos se ejecutan con los mismos privilegios y el mismo entorno que el servicio web.</p>

		<p>Los ataques de inyecci�n de comandos son posibles en la mayor�a de los casos debido a la falta de validaci�n correcta de los datos de entrada, que pueden ser manipulados por el atacante.
		(formularios, cookies, encabezados HTTP, etc.).</p>

		<p>La sintaxis y los comandos pueden diferir entre los sistemas operativos (SO), como Linux y Windows, seg�n sus acciones deseadas.</p>

		<p>Este ataque tambi�n se puede llamar "Ejecuci�n remota de comandos (RCE)".</p>

		<br /><hr /><br />

		<h3>Objectivos</h3>
		<p>De forma remota, averig�e qui�n es el usuario del servicio web en el sistema operativo, as� como el nombre de host de la m�quina a trav�s de RCE.</p>

		<br /><hr /><br />

		<h3>Nivel Low</h3>
		<p>Esto permite la entrada directa en una de las <u> muchas funciones PHP </u> que ejecutar�n comandos en el sistema operativo. Es posible escapar del comando dise�ado y
		ejecutar acciones no permitidas.</p>
		<p>Esto se puede hacer agregando a la solicitud, "una vez que el comando se haya ejecutado correctamente, ejecute este comando".
		<pre>Spoiler: <span class="spoiler">Para agregar un comando "&&"</span>. Ejemplo Windows: <span class="spoiler">127.0.0.1 && dir</span>.</pre>
                <pre>Spoiler: <span class="spoiler">Para agregar un comando ";"</span>. Ejemplo Linux: <span class="spoiler">127.0.0.1 ; ls -l</span>.</pre>
		<br />

		<h3>Nivel Medium</h3>
		<p>El desarrollador ha le�do algunos de los problemas con la inyecci�n de comandos y colocado en varios parches para filtrar la entrada. Sin embargo, esto no es suficiente.</p>
		<p>Varias otras sintaxis del sistema se pueden utilizar para salir del comando deseado.</p>
		<pre>Spoiler: <span class="spoiler">por ejemplo: en el Back-end el comando es ping</span>.</pre>

		<br />

		<h3>Nivel High</h3>
		<p>En el nivel anto, el desarrollador vuelve a la mesa de dibujo y pone a�n m�s patrones para que coincida. Pero incluso esto no es suficiente.</p>
		<p>El desarrollador ha hecho un peque�o error tipogr�fico con los filtros y cree que un cierto comando PHP los salvar� de este error.</p>
		<pre>Spoiler: <span class="spoiler"><?php echo dvwaExternalLinkUrlGet( 'https://secure.php.net/manual/en/function.trim.php', 'trim()' ); ?>
			elimina todos los espacios iniciales y finales, �sera cierto?</span>.</pre>

		<br />

		<h3>Nivel Impossible</h3>
		<p>En el nivel imposible, el desaf�o ha sido reescrito, solo para permitir una entrada muy estricta. Si esto no coincide y no produce un determinado resultado,
                no se le permitir� ejecutar. En lugar de un filtro de "listado negro" (que permite cualquier entrada y eliminaci�n no deseada), esto utiliza "lista blanca" (solo permite ciertos valores).</p>
	</div></td>
	</tr>
	</table>

	</div>

	<br />

	<p>Referencia: <?php echo dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Command_Injection' ); ?></p>
</div>
