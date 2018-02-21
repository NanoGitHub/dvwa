<div class="body_padded">
	<h1>Ayuda - Fuerza Bruta (Login)</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>Acerca de</h3>
		<p>El descifrado de contrase�as es el proceso de recuperaci�n de contrase�as a partir de datos almacenados o transmitidos por un sistema inform�tico.
                   Un enfoque com�n es intentar repetidamente adivinar la contrase�a.</p>

		<p>Los usuarios a menudo eligen contrase�as d�biles. Ejemplos de opciones inseguras incluyen palabras sueltas que se encuentran en los diccionarios, nombres de familia, cualquier contrase�a demasiado corta(generalmente se cree que tiene menos de 6 o 7 caracteres) o patrones predecibles(por ejemplo, vocales y consonantes, lo que se conoce como leetspeak, por lo que "contrase�a" se convierte en "p@55w0rd").</p>

		<p>La creaci�n de listas de palabras espec�ficas, que se genera hacia el objetivo, a menudo da la mayor tasa de �xito. Hay herramientas p�blicas que crear�n un diccionario
basado en una combinaci�n de sitios web de la empresa, redes sociales personales y otra informaci�n com�n (como cumplea�os o a�o de graduaci�n).

		<p>Un �ltimo recurso es probar cada contrase�a posible, conocida como ataque de fuerza bruta. En teor�a, si no hay l�mite para el n�mero de intentos, un ataque de fuerza bruta siempre tendra �xito, ya que las reglas para contrase�as aceptables deben ser conocidas p�blicamente; pero a medida que aumenta la longitud de la contrase�a, tambi�n aumenta la cantidad de contrase�as posibles, haciendo que el tiempo de ataque sea m�s largo.</p>

		<br /><hr /><br />

		<h3>Objetivo</h3>
		<p>Su objetivo es obtener la contrase�a del administrador mediante el uso de fuerza bruta. �Puntos de bonificaci�n por obtener las otras cuatro contrase�as de usuario!</p>

		<br /><hr /><br />

		<h3>Nivel Low </h3>
		<p>El desarrollador ha omitido por completo todos los m�todos de protecci�n, lo que permite que cualquiera intente tantas veces como lo desee, para iniciar sesi�n con cualquier usuario sin ninguna repercusi�n.</p>

		<br />

		<h3>Nivel Medium</h3>
		<p>Esta etapa agrega un descanso en la pantalla de inicio de sesi�n fallida. Esto significa que cuando inicie sesi�n incorrectamente, habr� una espera adicional de dos segundos antes de que la p�gina est� visible.</p>

		<p>Esto solo ralentizar� la cantidad de solicitudes que pueden procesarse por minuto, lo que hace que sea m�s largo que la fuerza bruta.</p>

		<br />

		<h3>Nivel High</h3>
		<p>Se ha utilizado un "token anti falsificaci�n de solicitud entre sitios (CSRF)". Existe un viejo mito de que esta protecci�n detendr� los ataques de fuerza bruta. Este no es el caso.
Este nivel tambi�n se extiende en el nivel medio, esperando cuando hay un inicio de sesi�n fallido, pero esta vez es una cantidad aleatoria de tiempo entre dos y cuatro segundos.
La idea de esto es intentar confundir cualquier predicci�n de tiempo.</p>

		<p>Usando un <?php echo dvwaExternalLinkUrlGet( 'http://www.captcha.net/', 'CAPTCHA' ); ?> formulario podr�a tener un efecto similar a un token CSRF.</p>

		<br />

		<h3>Nivel Impossible</h3>
		<p>La fuerza bruta (y la enumeraci�n del usuario) no deber�a ser posible en el nivel imposible. El desarrollador ha agregado una funci�n de "bloqueo", donde si hay cinco inicios de sesi�n incorrectos dentro
los �ltimos 15 minutos, el usuario bloqueado no puede iniciar sesi�n.</p>

		<p>Si el usuario bloqueado intenta iniciar sesi�n, incluso con una contrase�a v�lida, dir� que su nombre de usuario o contrase�a es incorrecto. Esto har� que sea imposible saber
si hay una cuenta v�lida en el sistema, con esa contrase�a, y si la cuenta est� bloqueada.</p>

		<p>Esto puede causar una "denegaci�n de servicio" (DoS), haciendo que alguien intente continuamente ingresar a la cuenta de alguien.
Este nivel deber�a extenderse poniendo en lista negra al atacante (por ejemplo, direcci�n IP, pa�s, agente de usuario).</p>
	</div></td>
	</tr>
	</table>

	</div>

	<br />

	<p>Referencia: <?php echo dvwaExternalLinkUrlGet( 'https://en.wikipedia.org/wiki/Password_cracking' ); ?></p>
</div>
