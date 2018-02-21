<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'DVWA Security' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'security';

$securityHtml = '';
if( isset( $_POST['seclev_submit'] ) ) {
	// Anti-CSRF
	checkToken( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], 'security.php' );

	$securityLevel = '';
	switch( $_POST[ 'security' ] ) {
		case 'low':
			$securityLevel = 'low';
			break;
		case 'medium':
			$securityLevel = 'medium';
			break;
		case 'high':
			$securityLevel = 'high';
			break;
		default:
			$securityLevel = 'impossible';
			break;
	}

	dvwaSecurityLevelSet( $securityLevel );
	dvwaMessagePush( "Nivel de seguridad establecido en {$securityLevel}" );
	dvwaPageReload();
}

if( isset( $_GET['phpids'] ) ) {
	switch( $_GET[ 'phpids' ] ) {
		case 'on':
			dvwaPhpIdsEnabledSet( true );
			dvwaMessagePush( "PHPIDS ahora est� habilitado" );
			break;
		case 'off':
			dvwaPhpIdsEnabledSet( false );
			dvwaMessagePush( "PHPIDS ahora est� deshabilitado" );
			break;
	}

	dvwaPageReload();
}

$securityOptionsHtml = '';
$securityLevelHtml   = '';
foreach( array( 'low', 'medium', 'high', 'impossible' ) as $securityLevel ) {
	$selected = '';
	if( $securityLevel == dvwaSecurityLevelGet() ) {
		$selected = ' selected="selected"';
		$securityLevelHtml = "<p>El Nivel de seguridad actualmente es: <em>$securityLevel</em>.<p>";
	}
	$securityOptionsHtml .= "<option value=\"{$securityLevel}\"{$selected}>" . ucfirst($securityLevel) . "</option>";
}

$phpIdsHtml = 'PHPIDS Estado: ';

// Able to write to the PHPIDS log file?
$WarningHtml = '';

if( dvwaPhpIdsIsEnabled() ) {
	$phpIdsHtml .= '<em>Habilitado</em>. [<a href="?phpids=off">Deshabilitar PHPIDS</a>]';

	# Only check if PHPIDS is enabled
	if( !is_writable( $PHPIDSPath ) ) {
		$WarningHtml .= "<div class=\"warning\"><em>No se puede escribir en el archivo de registro PHPIDS</em>: ${PHPIDSPath}</div>";
	}
}
else {
	$phpIdsHtml .= '<em>Deshabilitado</em>. [<a href="?phpids=on">Habilitar PHPIDS</a>]';
}

// Anti-CSRF
generateSessionToken();

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>DVWA Seguridad <img src=\"" . DVWA_WEB_PAGE_TO_ROOT . "dvwa/images/lock.png\" /></h1>
	<br />

	<h2>Nivel de Seguridad</h2>

	{$securityHtml}

	<form action=\"#\" method=\"POST\">
		{$securityLevelHtml}
		<p>Puede establecer el nivel de seguridad en bajo, medio, alto o imposible. El nivel de seguridad cambia la dificultad de las vulnerabilidaes en DVWA:</p>
		<ol>
			<li> Low - Este nivel de seguridad es completamente vulnerable y <em> no tiene medidas de seguridad en absoluto</em>. Su uso es un ejemplo de c�mo las vulnerabilidades de las Aplicaciones Web se manifiestan a trav�s de malas pr�cticas de codificaci�n y servir como una plataforma para ense�ar o aprender t�cnicas b�sicas de explotaci�n.</li>
			<li> Medium - Esta configuraci�n es principalmente para dar un ejemplo al usuario de <em> malas pr�cticas de seguridad </em>, donde el desarrollador ha intentado pero no ha podido asegurar una aplicaci�n. Tambi�n act�a como un desaf�o para los usuarios para refinar sus t�cnicas de explotaci�n.</li>
			<li> High - Esta opci�n es una extensi�n de la dificultad media, con una mezcla de <em> malas pr�cticas  o alternativas </em> para intentar asegurar el c�digo. La vulnerabilidad puede no permitir el mismo grado de explotaci�n, similar en varias competiciones de Capture The Flags (CTF).</li>
			<li> Impossible - Este nivel debe ser <em> seguro contra todas las vulnerabilidades </em>. Se usa para comparar el c�digo fuente vulnerable con el c�digo fuente seguro.<br />
				Antes de DVWA v1.9, este nivel era conocido como 'alto'</li>
		</ol>
		<select name=\"security\">
			{$securityOptionsHtml}
		</select>
		<input type=\"submit\" value=\"Submit\" name=\"seclev_submit\">
		" . tokenField() . "
	</form>

	<br />
	<hr />
	<br />

	<h2>PHPIDS</h2>
	{$WarningHtml}
	<p>" . dvwaExternalLinkUrlGet( 'https://github.com/PHPIDS/PHPIDS', 'PHPIDS' ) . " v" . dvwaPhpIdsVersionGet() . " (PHP-Intrusion Detection System) Es una capa de seguridad para aplicaciones web basadas en PHP.</p>
	<p>PHPIDS funciona filtrando cualquier entrada proporcionada por el usuario contra una lista negra de c�digo potencialmente malicioso. Se usa en DVWA para servir como un ejemplo de c�mo los firewalls de aplicaciones web (WAFs) puede ayudar a mejorar la seguridad y, en algunos casos, c�mo se pueden eludir los WAF.</p>
	<p>Puede habilitar PHPIDS en este sitio durante la duraci�n de su sesi�n.</p>

	<p>{$phpIdsHtml}</p>
	[<a href=\"?test=%22><script>eval(window.name)</script>\">Simular Ataque</a>] -
	[<a href=\"ids_log.php\">Ver Logs del IDS</a>]
</div>";

dvwaHtmlEcho( $page );

?>
