<div class="body_padded">
	<h1>Ayuda - ID de sesi�n d�bil</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>Acerca de </h3>
		<p>El conocimiento de una ID de sesi�n suele ser lo �nico necesario para acceder a un sitio como usuario espec�fico despu�s de que haya iniciado sesi�n, si esa ID de sesi�n puede calcularse o adivinarse f�cilmente, entonces un atacante tendr� una manera f�cil de obtener acceso a cuentas de usuario sin tener que usar fuerza bruta o encontrar otras vulnerabilidades como Cross-Site Scripting.</p>

		<p><hr /></p>

		<h3>Objectivo</h3>
		<p>Este m�dulo utiliza cuatro formas diferentes de establecer el valor de cookie dvwaSession, el objetivo de cada nivel es determinar c�mo se genera el ID y luego inferir los ID de otros usuarios del sistema.</p>

		<p><hr /></p>

		<h3>Nivel Low</h3>
		<p>El valor de la cookie debe ser muy obviamente predecible.</p>

		<h3>Nivel Medium</h3>
		<p>El valor parece un poco m�s aleatorio que en bajo, pero si recopila algunos IDS, deber�a comenzar a ver un patr�n.</p>

		<h3>Nivel High</h3>
		<p>Primero, determine en qu� formato est� el valor y luego intente determinar qu� se est� utilizando como entrada para generar los valores.</p>
		<p>Tambi�n se agregan marcadores adicionales a la cookie, esto no afecta el desaf�o, pero resalta las protecciones adicionales que se pueden agregar para proteger las cookies.</p>


		<h3>Nivel Impossible</h3>
		<p>El valor de la cookie no debe ser predecible en este nivel, pero si�ntase libre de intentarlo.</p>
		<p>Adem�s de las banderas adicionales, la cookie est� vinculada al dominio y a la ruta del desaf�o.</p>
	</div></td>
	</tr>
	</table>

	</div>

	<p>Referencia: <?php echo dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Top_10_2013-A2-Broken_Authentication_and_Session_Management' ); ?></p>
</div>
