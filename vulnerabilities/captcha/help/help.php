<div class="body_padded">
	<h1>ayuda - CAPTCHA Inseguro</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>Acerca de</h3>
		<p>Un <?php echo dvwaExternalLinkUrlGet( 'http://www.captcha.net/', 'CAPTCHA' ); ?> Es un programa que puede decir si su usuario es un humano o una computadora. Probablemente has visto
ellos - im�genes coloridas con texto distorsionado en la parte inferior de los formularios de registro web. Los CAPTCHA son utilizados por muchos sitios web para evitar el abuso de
"bots", o programas automatizados generalmente escritos para generar spam. Ning�n programa de computadora puede leer texto distorsionado tan bien como los humanos, as� que los bots
no puede navegar por sitios protegidos por CAPTCHA.</p>

		<p>Los CAPTCHA se usan a menudo para proteger la funcionalidad sensible de los bots automatizados. Dicha funcionalidad generalmente incluye el registro y los cambios del usuario,
cambios de contrase�a y publicaci�n de contenido. En este ejemplo, el CAPTCHA protege la funcionalidad de cambio de contrase�a para la cuenta de usuario. Esto proporciona
protecci�n limitada de ataques CSRF as� como adivinaci�n autom�tica de bots.</p>

		<br /><hr /><br />

		<h3>Objetivo</h3>
		<p>Su objetivo es cambiar la contrase�a del usuario actual de manera autom�tica debido al sistema CAPTCHA deficiente.</p>

		<br /><hr /><br />

		<h3>Nivel Low </h3>
		<p>El problema con este CAPTCHA es que se puede omitir f�cilmente. El desarrollador ha asumido que todos los usuarios avanzar�n a trav�s de la pantalla 1, completar�n el CAPTCHA y luego
pasar a la siguiente pantalla donde la contrase�a realmente se actualiza. Al enviar la nueva contrase�a directamente a la p�gina de cambio, el usuario puede omitir el sistema CAPTCHA.</p>

		<p>Los par�metros necesarios para completar este desaf�o en baja seguridad ser�an similares a los siguientes:</p>
		<pre>Spoiler: <span class="spoiler">?step=2&password_new=password&password_conf=password&Change=Change</span>.</pre>

		<br />

		<h3>Nivel Medium</h3>
		<p>El desarrollador ha intentado colocar el estado alrededor de la sesi�n y realizar un seguimiento de si el usuario complet� con �xito el CAPTCHA antes de enviar datos. Porque la variable de estado (Spoiler: <span class = "spoiler"> passed_captcha </span>) est� en el lado del cliente,tambi�n puede ser manipulado por el atacante as�:</p>
		<pre>Spoiler: <span class="spoiler">?step=2&password_new=password&password_conf=password&passed_captcha=true&Change=Change</span>.</pre>

		<br />

		<h3>Nivel High</h3>
		<p>Ha quedado un c�digo de desarrollo, que nunca se elimin� en producci�n. Es posible imitar los valores de desarrollo, para permitir
los valores inv�lidos se colocar�n en el campo CAPTCHA.</p>
		<p>Deber� falsificar su user-agent (Spoiler: <span class="spoiler">reCAPTCHA</span>)as� como tambi�n use el valor CAPTCHA de
			(Spoiler: <span class="spoiler">hidd3n_valu3</span>) para saltar la validaci�n</p>

		<br />

		<h3>Nivel Impossible</h3>
		<p>En el nivel imposible, el desarrollador ha eliminado todas las avenidas de ataque. El proceso se ha simplificado para que los datos y la verificaci�n CAPTCHA ocurran en un solo paso. Alternativamente, el desarrollador podr�a haber movido en el lado del servidor de variable de estado (desde el nivel medio), por lo que el usuario no puede modificarlo.</p>
	</div></td>
	</tr>
	</table>

	</div>

	<br />

	<p>Referencia: <?php echo dvwaExternalLinkUrlGet( 'http://www.captcha.net/' ); ?></p>
</div>
