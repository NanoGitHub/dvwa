<div class="body_padded">
	<h1>Ayuda - Inyecci�n SQL </h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>Acerca de</h3>
		<p>Un ataque de inyecci�n SQL consiste en la inserci�n o "inyecci�n" de una consulta SQL a trav�s de los datos de entrada del cliente a la aplicaci�n.
Un exploit de inyecci�n SQL exitoso puede leer datos confidenciales de la base de datos, modificar los datos de la base de datos (insertar / actualizar / eliminar), ejecutar operaciones de administraci�n en la base de datos
(como apagar el DBMS), recuperar el contenido de un archivo dado presente en el sistema de archivos DBMS (load_file) y en algunos casos emitir comandos al sistema operativo.</p>

		<p>Los ataques de inyecci�n SQL son un tipo de ataque de inyecci�n, en el que los comandos SQL se inyectan en la entrada del plano de datos para efectuar la ejecuci�n de comandos SQL predefinidos.</p>

		<p>Este ataque tambi�n se puede llamar "SQLi".</p>

		<br /><hr /><br />

		<h3>Objectivos</h3>
		<p>Hay 5 usuarios en la base de datos, con id del 1 al 5. Su misi�n ... robar sus contrase�as a trav�s de SQLi.</p>

		<br /><hr /><br />

		<h3>Nivel Low</h3>
		<p>La consulta SQL usa entrada RAW que est� directamente controlada por el atacante. Todo lo que necesitan hacer es escapar de la consulta y luego pueden
                para ejecutar cualquier consulta SQL que deseen.</p>
		<pre>Spoiler: <span class="spoiler">?id=a' UNION SELECT "text1","text2";-- -&Submit=Submit</span>.</pre>

		<br />

		<h3>Nivel Medium</h3>
		<p>El nivel medio usa una forma de protecci�n de inyecci�n SQL, con la funci�n de
			"<?php echo dvwaExternalLinkUrlGet( 'https://secure.php.net/manual/en/function.mysql-real-escape-string.php', 'mysql_real_escape_string()' ); ?>".
			Sin embargo, debido a que la consulta SQL no tiene comillas alrededor del par�metro, esto no proteger� por completo la consulta de la alteraci�n.</p>

		<p>El cuadro de texto ha sido reemplazado por una lista desplegable predefinida y usa POST para enviar el formulario.</p>
		<pre>Spoiler: <span class="spoiler">?id=a UNION SELECT 1,2;-- -&Submit=Submit</span>.</pre>

		<br />

		<h3>Nivel High</h3>
		<p>Esto es muy similar al nivel bajo, sin embargo esta vez el atacante debe ingresar el valor de una manera diferente.
                 Los valores de entrada se transfieren a la consulta vulnerable a trav�s de variables de sesi�n utilizando otra p�gina, en lugar de una solicitud GET directa.</p>
		<pre>Spoiler: <span class="spoiler">ID: a' UNION SELECT "text1","text2";-- -&Submit=Submit</span>.</pre>

		<br />

		<h3>Nivel Impossible</h3>
		<p>Las consultas ahora son consultas parametrizadas (en lugar de ser din�micas). Esto significa que la consulta ha sido definida por el desarrollador,
y ha distinguido qu� secciones son c�digo, y el resto son datos.</p>
	</div></td>
	</tr>
	</table>

	</div>

	<br />

	<p>Referencia: <?php echo dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/SQL_Injection' ); ?></p>
</div>
