<div class="body_padded">
	<h1>Ayuda - Cross Site Scripting (Reflejado)</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>Acerca de </h3>
		<p>Los ataques "Cross-Site Scripting (XSS)" son un tipo de problema de inyecci�n, en el que los scripts maliciosos se inyectan en sitios web confiables. Los ataques XSS ocurren cuando un atacante usa una aplicaci�n web para enviar c�digo malicioso, generalmente en la forma de un script del lado del navegador,a un usuario final diferente. Los defectos que permiten que estos ataques tengan �xito est�n bastante extendidos y ocurren en cualquier lugar en una aplicaci�n web que usa la informaci�n de un usuario en la salida,sin validarlo ni codificarlo.</p>

		<p>Un atacante puede usar XSS para enviar un script malicioso a un usuario desprevenido. El navegador del usuario final no tiene forma de saber que el script no debe ser confiable,
		y ejecutar� el JavaScript. Debido a que cree que el script proviene de una fuente confiable, el script malicioso puede acceder a cualquier cookie, token de sesi�n u otro
		informaci�n confidencial retenida por su navegador y utilizada con ese sitio. Estos scripts incluso pueden reescribir el contenido de la p�gina HTML.</p>

		<p>Como se trata de un XSS reflejado, el c�digo malicioso no se almacena en la aplicaci�n web remota, por lo que requiere cierta ingenier�a social (como un enlace por correo electr�nico / chat).</p>

		<br /><hr /><br />

		<h3>Objectivo</h3>
		<p>De una forma u otra, debes robar la cookie de un usuario conectado.</p>

		<br /><hr /><br />

		<h3>Nivel Low</h3>
		<p>El nivel bajo no verificar� la entrada solicitada, antes de incluirla para ser utilizada en el texto de salida.</p>
		<pre>Spoiler: <span class="spoiler">?name=&lt;script&gt;alert("XSS");&lt;/script&gt;</span>.</pre>

		<br />

		<h3>Nivel Medium</h3>
		<p>El desarrollador ha intentado agregar una coincidencia de patr�n simple para eliminar las referencias a "& lt; script & gt;", para deshabilitar cualquier JavaScript.</p>
		<pre>Spoiler: <span class="spoiler">EsTe CasO Es SensiBle</span>.</pre>

		<br />

		<h3>Nivel High</h3>
		<p>El desarrollador ahora cree que pueden deshabilitar todo el JavaScript eliminando el patr�n "& lt; s * c * r * i * p * t".</p>
		<pre>Spoiler: <span class="spoiler">HTML evento</span>.</pre>

		<br />

		<h3>Nivel Impossible</h3>
		<p>Usar funciones PHP incorporadas (como "<?php echo dvwaExternalLinkUrlGet( 'https://secure.php.net/manual/en/function.htmlspecialchars.php', 'htmlspecialchars()' ); ?>"),
			es posible escapar de cualquier valor que altere el comportamiento de la entrada.</p>
	</div></td>
	</tr>
	</table>

	</div>

	<br />

	<p>Referencia: <?php echo dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)' ); ?></p>
</div>
