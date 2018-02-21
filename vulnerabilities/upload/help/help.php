<div class="body_padded">
	<h1>Ayuda - Carga de archivos</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>Acerca de</h3>
		<p>Los archivos cargados representan un riesgo significativo para las aplicaciones web. El primer paso en muchos ataques es obtener alg�n c�digo para que el sistema sea atacado.
                 Entonces el atacante solo necesita encontrar la forma de ejecutar el c�digo. Usar una carga de archivo ayuda al atacante a lograr el primer paso.</p>

		<p>Las consecuencias de la carga de archivos sin restricciones pueden variar, incluye la control total del sistema, redireccion de ataques a sistemas internos o un simple defacement. Esto depende de qu� hace la aplicaci�n con el archivo cargado, incluido d�nde se est� almacenado.</p>

		<br /><hr /><br />

		<h3>Objetivo</h3>
		<p>Ejecute cualquier funci�n de PHP que elija de sistema para ser subido (como <?php echo dvwaExternalLinkUrlGet( 'https://secure.php.net/manual/en/function.phpinfo.php', 'phpinfo()' ); ?>
			o <?php echo dvwaExternalLinkUrlGet( 'https://secure.php.net/manual/en/function.system.php', 'system()' ); ?>) gracias a esta vulnerabilidad de carga de archivos.</p>

		<br /><hr /><br />

		<h3>Nivel Low</h3>
		<p>El nivel bajo no verificar� el contenido del archivo que se est� cargando de ninguna manera. Se basa solo en la confianza.</p>
		<pre>Spoiler: <span class="spoiler">Cargue cualquier archivo PHP v�lido con comando en �l</span>.</pre>

		<br />

		<h3>Nivel Medium</h3>
		<p>Al usar el nivel medio, comprobar� el tipo de archivo ienviado por el cliente cuando se cargue.</p>
		<pre>Spoiler: <span class="spoiler">Vale la pena buscar cualquier restricci�n dentro de los campos de formulario "hidden"</span>.</pre>

		<br />

		<h3>Nivel High</h3>
		<p>Una vez que se ha recibido el archivo del cliente, el servidor intentar� cambiar el tama�o de cualquier imagen que se haya incluido en la solicitud.</p>
		<pre>Spoiler: <span class="spoiler">necesitas de vincular en otra vulnerabilidad, como la inclusi�n de archivos</span>.</pre>

		<br />

		<h3>Nivel Impossible</h3>
		<p>Esto verificar� todo desde todos los niveles hasta ahora, y luego volver� a codificar la imagen. Esto har� una nueva imagen, por lo tanto, sacara cualquier c�digo "sin imagen" (incluidos los metadatos).</p>
	</div></td>
	</tr>
	</table>

	</div>

	<br />

	<p>Reference: <?php echo dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Unrestricted_File_Upload' ); ?></p>
</div>

