<div class="body_padded">
	<h1>Ayuda - XSS (Basado enDOM)</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>Acerca de</h3>
		<p>Los ataques de secuencias de comandos cruzados(XSS) "son un tipo de problema de inyecci�n, en el cual los scripts maliciosos se inyectan en los sitios web confiables. Los ataques XSS ocurren cuando un atacante usa una aplicaci�n web para enviar c�digo malicioso, generalmente en la forma de un script del lado del navegador,a un usuario final diferente. Los defectos que permiten que estos ataques tengan �xito, est�n bastante extendidos y ocurren en cualquier lugar en una aplicaci�n web que usa la informaci�n de un usuario en la salida,sin validarlo ni codificarlo.</p>

		<p>Un atacante puede usar XSS para enviar un script malicioso a un usuario desprevenido. El navegador del usuario final no tiene forma de saber que el script no es confiable,y ejecutar� el JavaScript. Debido a que cree que el script proviene de una fuente confiable, el script malicioso puede acceder a cualquier cookie, token de sesi�n u otra informaci�n confidencial retenida por su navegador. Estos scripts incluso pueden reescribir el contenido de la p�gina HTML.</p>

		<p>XSS Basado en DOM  es un caso especial en el que el c�digo JavaScript se oculta en la URL y se extrae mediante JavaScript en la p�gina mientras se procesa en lugar de insertarse en la p�gina cuando se publica. Esto puede hacerlo m�s sigiloso que otros ataques y los WAF u otras protecciones que est�n leyendo el cuerpo de la p�gina no ven ning�n contenido malicioso.</p>

		<p><hr /></p>

		<h3>Objectivo</h3>
		<p>Ejecute su propio JavaScript en el navegador de otro usuario, use esto para robar la cookie de un usuario conectado.</p>

		<p><hr /></p>

		<h3>Nivel Low</h3>
		<p>El nivel bajo no verificar� la entrada solicitada, antes de incluirla para ser utilizada en el texto de salida.</p>
		<pre>Spoiler: <span class="spoiler"><?=htmlentities ("/vulnerabilities/xss_d/?default=English<script>alert(1)</script>")?></span>.</pre>

		<p><br /></p>

		<h3>Nivel Medium</h3>
		<p>El desarrollador ha intentado agregar una coincidencia de patr�n simple para eliminar cualquier referencia a "& lt; script" para deshabilitar cualquier JavaScript. Encuentre una forma de ejecutar JavaScript sin usar las etiquetas de script.</p>
		<pre>Spoiler: <span class="spoiler">Primero debe salir del bloque de selecci�n y luego puede agregar una imagen con un evento onerror:<br />
<?=htmlentities ("/vulnerabilities/xss_d/?default=English>/option></select><img src='x' onerror='alert(1)'>");?></span>.</pre>

		<p><br /></p>

		<h3>Nivel High</h3>
		<p>El desarrollador ahora solo muestra los idiomas permitidos, debe encontrar una forma de ejecutar su c�digo sin que vaya al servidor.</p>
		<pre>Spoiler: <span class="spoiler">La secci�n de fragmento de una URL (cualquier cosa despu�s del s�mbolo #) no se env�a al servidor y, por lo tanto, no se puede bloquear. El JavaScript incorrecto que se utiliza para representar la p�gina lee su contenido al crear la p�gina.<br />
<?=htmlentities ("/vulnerabilities/xss_d/?default=English#<script>alert(1)</script>")?></span>.</pre>

		<p><br /></p>

		<h3>Nivel Impossible</h3>
		<p>Los contenidos tomados de la URL est�n codificados de forma predeterminada por la mayor�a de los navegadores, lo que impide que se ejecute JavaScript inyectado.</p>
	</div></td>
	</tr>
	</table>

	</div>

	<br />

	<p>Referencia: <?php echo dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)' ); ?></p>
</div>
