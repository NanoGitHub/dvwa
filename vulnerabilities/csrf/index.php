<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Vulnerabilidad: Falsificaci�n de Solicitud Cruzada de Sitio (CSRF)' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'csrf';
$page[ 'help_button' ]   = 'csrf';
$page[ 'source_button' ] = 'csrf';

dvwaDatabaseConnect();

$vulnerabilityFile = '';
switch( $_COOKIE[ 'security' ] ) {
	case 'low':
		$vulnerabilityFile = 'low.php';
		break;
	case 'medium':
		$vulnerabilityFile = 'medium.php';
		break;
	case 'high':
		$vulnerabilityFile = 'high.php';
		break;
	default:
		$vulnerabilityFile = 'impossible.php';
		break;
}

require_once DVWA_WEB_PAGE_TO_ROOT . "vulnerabilities/csrf/source/{$vulnerabilityFile}";

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h2>Vulnerabilidad: Falsificaci�n de Solicitud Cruzada de Sitio (CSRF)</h2>

	<div class=\"vulnerable_code_area\">
		<h3>Cambia tu contrase�a de administrador:</h3>
		<br />

		<form action=\"#\" method=\"GET\">";

if( $vulnerabilityFile == 'impossible.php' ) {
	$page[ 'body' ] .= "
			Contrase�a actual:<br />
			<input type=\"password\" AUTOCOMPLETE=\"off\" name=\"password_current\"><br />";
}

$page[ 'body' ] .= "
			Nueva contrase�a:<br />
			<input type=\"password\" AUTOCOMPLETE=\"off\" name=\"password_new\"><br />
			Confirmar nueva contrase�a:<br />
			<input type=\"password\" AUTOCOMPLETE=\"off\" name=\"password_conf\"><br />
			<br />
			<input type=\"submit\" value=\"Cambiar\" name=\"Change\">\n";

if( $vulnerabilityFile == 'high.php' || $vulnerabilityFile == 'impossible.php' )
	$page[ 'body' ] .= "			" . tokenField();

$page[ 'body' ] .= "
		</form>
		{$html}
	</div>

	<h2>M�s Informaci�n</h2>
	<ul>
		<li>" . dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Cross-Site_Request_Forgery' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'http://www.cgisecurity.com/csrf-faq.html' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://en.wikipedia.org/wiki/Cross-site_request_forgery ' ) . "</li>
	</ul>
</div>\n";

dvwaHtmlEcho( $page );

?>
