<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Bienvenido' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'home';

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>Bienvenido a Damn Vulnerable Web Application!</h1>
	<p>Damn Vulnerable Web Application (DVWA) es una aplicaci�n web PHP / MySQL que es muy vulnerable. Su objetivo principal es ayudar a los profesionales de seguridad a probar sus habilidades y herramientas en un entorno legal, ayudar a los desarrolladores web a comprender mejor los procesos de protecci�n de aplicaciones web y ayudar a los estudiantes y profesores a conocer la seguridad de las aplicaciones web en una clase con ambiente controlado.</p>
	<p>El objetivo de DVWA es <em> practicar algunas de las vulnerabilidades web m�s comunes </em>, con <em> varios niveles de dificultad </em>, con una interfaz sencilla y directa.</p>
	<hr />
	<br />

	<h2>Instrucciones Generales</h2>
	<p>Depende del usuario c�mo aproveche la herramienta DVWA. Ya sea trabajando en cada m�dulo a un nivel fijo, o seleccionando cualquier m�dulo y trabajando hasta alcanzar el nivel m�s alto que puedan antes de pasar al pr�ximo. No hay un objeto fijo para completar un m�dulo; sin embargo, los usuarios deben sentir que han explotado exitosamente el sistema de la mejor manera posible usando esa vulnerabilidad en particular.</p>
	<p>Tenga en cuenta que hay <em> vulnerabilidades documentadas y no documentadas </em> con este software. Esto es intencional. Le recomendamos que trate de descubrir tantos fallos de seguridad como sea posible.</p>
	<p>DVWA tambi�n incluye un Web Application Firewall (WAF), PHPIDS, que se puede habilitar en cualquier etapa para aumentar a�n m�s la dificultad. Esto demostrar� c�mo otra capa de seguridad puede bloquear ciertas acciones maliciosas. Tenga en cuenta que tambi�n existen varios m�todos p�blicos para eludir estas protecciones (�as� que esto puede verse como una extensi�n para usuarios m�s avanzados)!</p>
	<p>Hay un bot�n de ayuda en la parte inferior de cada p�gina, que le permite ver consejos y sugerencias para la vulnerabilidad. Tambi�n hay enlaces adicionales para leer m�s a fondo, que se relacionan con ese problema de seguridad.</p>
	<hr />
	<br />

	<h2>�ADVERTENCIA!</h2>
	<p>Damn Vulnerable Web Application  es extremadamente vulnerable! <em> No lo cargue en la carpeta html p�blica de su proveedor de hosting ni en ning�n servidor con acceso a Internet </em>, ya que se ver�n comprometidos. Se recomienda usar una m�quina virtual (como " . dvwaExternalLinkUrlGet( 'https://www.virtualbox.org/','VirtualBox' ) . " o " . dvwaExternalLinkUrlGet( 'https://www.vmware.com/','VMware' ) . "), que est� configurado en modo de red NAT. Dentro de una m�quina virtual " . dvwaExternalLinkUrlGet( 'https://www.apachefriends.org/en/xampp.html','XAMPP' ) . "  para el servidor web y la base de datos.</p>
	<br />
	<h3>Declaraci�n</h3>
	<p>No nos responsabilizamos por la forma en que alguien use esta aplicaci�n (DVWA). Hemos aclarado los prop�sitos de la aplicaci�n y no debe usarse de forma malintencionada. Hemos advertido y tomado medidas para evitar que los usuarios instalen DVWA en servidores web activos. Si su servidor web est� comprometido a trav�s de una instalaci�n de DVWA, no es nuestra responsabilidad, es responsabilidad de la/s persona/s que lo carg� e instal�.</p>
	<hr />
	<br />

	<h2>M�s Recursos de Capacitaci�n</h2>
	<p>DVWA tiene como objetivo cubrir las vulnerabilidades m�s comunes que se encuentran en las aplicaciones web de hoy. Sin embargo, hay muchos otros problemas con las aplicaciones web. Si desea explorar cualquier vector de ataque adicional o desea desaf�os m�s dif�ciles, le recomendamos que consulte los siguientes proyectos:</p>
	<ul>
		<li>" . dvwaExternalLinkUrlGet( 'http://www.itsecgames.com/', 'bWAPP') . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'http://sourceforge.net/projects/mutillidae/files/mutillidae-project/', 'NOWASP') . " (anteriormente conocido como " . dvwaExternalLinkUrlGet( 'http://www.irongeek.com/i.php?page=mutillidae/mutillidae-deliberately-vulnerable-php-owasp-top-10', 'Mutillidae' ) . ")</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/OWASP_Broken_Web_Applications_Project', 'OWASP Broken Web Applications Project') . "</li>
                <li>" . dvwaExternalLinkUrlGet( 'https://github.com/SVelizDonoso/asyrv', 'ASYRV') . "</li>
                <li>" . dvwaExternalLinkUrlGet( 'https://github.com/SVelizDonoso/xvwa', 'XVWA en espa�ol') . "</li>
	</ul>
	<hr />
	<br />
</div>";

dvwaHtmlEcho( $page );

?>
