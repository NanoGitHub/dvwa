<div class="body_padded">
	<h1>Ayuda - Inyecci�n SQL (Ciegas)</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>Acerca de</h3>
		<p>Cuando un atacante ejecuta ataques de inyecci�n SQL, a veces el servidor responde con mensajes de error del servidor de la base de datos quej�ndose de que la sintaxis de la consulta SQL es incorrecta. La inyecci�n a ciegas de SQL es id�ntica a la inyecci�n de SQL normal, excepto que cuando un atacante intenta explotar una aplicaci�n, en lugar de recibir un mensaje de error �til,obtienen una p�gina gen�rica especificada por el desarrollador en su lugar. Esto hace que explotar un posible ataque de inyecci�n SQL sea m�s dif�cil pero no imposible.Un atacante a�n puede robar datos al hacer una serie de preguntas verdaderas y falsas a trav�s de declaraciones SQL y monitorear c�mo responde la aplicaci�n web(entrada v�lida reenumerada o conjunto de encabezado 404).</p>

		<p>El m�todo de inyecci�n "basado en el tiempo" a menudo se usa cuando no hay comentarios visibles sobre c�mo la p�gina es diferente en su respuesta (de ah� que un ataque es a ciegas).
		 	Esto significa que el atacante esperar� para ver cu�nto tarda la p�gina en responder la respuesta. Si lleva m�s tiempo de lo normal, su consulta fue exitosa.</p>

		<br /><hr /><br />

		<h3>Objectivo</h3>
		<p>Encuentre la versi�n del software de base de datos SQL a trav�s de un ataque SQL ciego.</p>

		<br /><hr /><br />

		<h3>Nivel Low</h3>
		<p>La consulta SQL usa entrada RAW que est� directamente controlada por el atacante. Todo lo que necesitan hacer es escapar de la consulta y luego pueden
                  para ejecutar cualquier consulta SQL que deseen.</p>
		<pre>Spoiler: <span class="spoiler">?id=1' AND sleep 5&Submit=Submit</span>.</pre>

		<br />

		<h3>Nivel Medium</h3>
		<p>El nivel medio usa una forma de protecci�n de inyecci�n SQL, con la funci�n de
			"<?php echo dvwaExternalLinkUrlGet( 'https://secure.php.net/manual/en/function.mysql-real-escape-string.php', 'mysql_real_escape_string()' ); ?>".
			Sin embargo, debido a que la consulta SQL no tiene comillas alrededor del par�metro, esto no proteger� por completo la consulta de la alteraci�n.</p>

		<p>El cuadro de texto ha sido reemplazado por una lista desplegable predefinida y usa POST para enviar el formulario.</p>
		<pre>Spoiler: <span class="spoiler">?id=1 AND sleep 3&Submit=Submit</span>.</pre>

		<br />

		<h3>Nivel High</h3>
		<p>Esto es muy similar al nivel bajo, sin embargo esta vez el atacante est� ingresando el valor de una manera diferente.
		Los valores de entrada se establecen en una p�gina diferente, en lugar de una solicitud GET.</p>
		<pre>Spoiler: <span class="spoiler">ID: 1' AND sleep 10&Submit=Submit</span>.
			Spoiler: <span class="spoiler">Deber�a ser capaz de evadir al hombre del medio.</span>.</pre>

		<br />

		<h3>Nivel Impossible</h3>
		<p>Las consultas ahora son consultas parametrizadas (en lugar de ser din�micas). Esto significa que la consulta ha sido definida por el desarrollador,
y ha distinguido qu� secciones son c�digo, y el resto son datos.</p>
	</div></td>
	</tr>
	</table>

	</div>

	<br />

	<p>Referencia: <?php echo dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Blind_SQL_Injection' ); ?></p>
</div>
