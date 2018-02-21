<div class="body_padded">
	<h1>Ayuda - Cross Site Request Forgery (CSRF)</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>Acerca de</h3>
		<p>CSRF es un ataque que obliga a un usuario final a ejecutar acciones no deseadas en una aplicaci�n web en la que est� autenticado actualmente.
		Con un poco de ayuda de ingenier�a social (como enviar un enlace por correo electr�nico / chat), un atacante puede obligar a los usuarios de una aplicaci�n web a ejecutar acciones de
		la elecci�n del atacante.</p>

		<p>Un exploit CSRF exitoso puede comprometer los datos y la operaci�n del usuario final en el caso de ser un usuario normal. Si el usuario final objetivo esla cuenta de administrador, esto puede comprometer toda la aplicaci�n web.</p>

		<p>Este ataque tambi�n se puede llamar "XSRF", similar a "Cross Site Scripting (XSS)", y a menudo se usan juntos.</p>

		<br /><hr /><br />

		<h3>Objectivo</h3>
		<p>Su tarea es hacer que el usuario actual cambie su propia contrase�a, sin que ellos conozcan sus acciones, utilizando un ataque CSRF.</p>

		<br /><hr /><br />

		<h3>Nivel Low</h3>
		<p>No hay medidas establecidas para protegerse contra este ataque. Esto significa que se puede dise�ar un enlace para lograr una determinada acci�n (en este caso, cambiar la contrase�a actual de los usuarios).
		Luego, con un poco de ingenier�a social b�sica, haga clic en el enlace (o simplemente visite una p�gina determinada) para activar la acci�n.</p>
		<pre>Spoiler: <span class="spoiler">?password_new=password&password_conf=password&Change=Change</span>.</pre>

		<br />

		<h3>Nivel Medium</h3>
		<p>Para el desaf�o de nivel medio, hay un check para ver de d�nde vino la �ltima p�gina solicitada. El desarrollador cree que si coincide con el dominio actual,debe provenir de la aplicaci�n web para que pueda ser confiable.</p>
		<p>Puede ser necesario vincular m�ltiples vulnerabilidades para explotar este vector, como el XSS reflectivo.</p>

		<br />

		<h3>Nivel High</h3>
		<p>En el nivel superior, el desarrollador ha agregado un "token anti falsificaci�n de solicitudes entre sitios (CSRF)". Para evitar este m�todo de protecci�n, se requerir� otra vulnerabilidad.</p>
		<pre>Spoiler: <span class="spoiler">ejemplo: Javascript es ejecutado en el lado del cliente, en el navegador</span>.</pre>

		<br />

		<h3>Nivel Impossible</h3>
		<p>En el nivel imposible, el desaf�o ampliar� el nivel alto y pedir� la contrase�a del usuario actual. Como esto no se puede descubrir (solo puedes hacer predicciones o Fuerza bruta),no hay un vector de ataque aqu�.</p>
	</div></td>
	</tr>
	</table>

	</div>

	<br />

	<p>Referencia: <?php echo dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Cross-Site_Request_Forgery_(CSRF)' ); ?></p>
</div>
