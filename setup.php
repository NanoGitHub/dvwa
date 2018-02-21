<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Configuraci�n' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'setup';

if( isset( $_POST[ 'create_db' ] ) ) {
	// Anti-CSRF
	checkToken( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], 'setup.php' );

	if( $DBMS == 'MySQL' ) {
		include_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/DBMS/MySQL.php';
	}
	elseif($DBMS == 'PGSQL') {
		// include_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/DBMS/PGSQL.php';
		dvwaMessagePush( ' PostgreSQL a�n no es totalmente soportado.' );
		dvwaPageReload();
	}
	else {
		dvwaMessagePush( 'ERROR: Base de datos seleccionada inv�lida. Revise la sintaxis del archivo de configuraci�n.' );
		dvwaPageReload();
	}
}

// Anti-CSRF
generateSessionToken();

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>Configuraci�n de Dase de Datos<img src=\"" . DVWA_WEB_PAGE_TO_ROOT . "dvwa/images/spanner.png\" /></h1>

	<p>Haga clic en el bot�n 'Crear/Restablecer base de datos' para crear o restablecer su base de datos.<br />
	Si obtiene un error, aseg�rese de tener las credenciales de usuario correctas en: <em>" . realpath(  getcwd() . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.inc.php" ) . "</em></p>

	<p>Si la base de datos ya existe, <em>se borrar� y los datos se restablecer�n</em>.<br />
	Tambi�n puede usar esto para restablecer las credenciales de administrador (\"<em>admin</em> // <em>password</em>\") En cualquier etapa.</p>
	<hr />
	<br />

	<h2>Verificaci�n de Instalaci�n</h2>

	{$DVWAOS}<br />
	Base de datos Back-End: <em>{$DBMS}</em><br />
	Version de PHP : <em>" . phpversion() . "</em><br />
	<br />
	{$SERVER_NAME}<br />
	<br />
	{$phpDisplayErrors}<br />
	{$phpSafeMode}<br/ >
	{$phpURLInclude}<br/ >
	{$phpURLFopen}<br />
	{$phpMagicQuotes}<br />
	{$phpGD}<br />
	{$phpMySQL}<br />
	{$phpPDO}<br />
	<br />
	{$MYSQL_USER}<br />
	{$MYSQL_PASS}<br />
	{$MYSQL_DB}<br />
	{$MYSQL_SERVER}<br />
	<br />
	{$DVWARecaptcha}<br />
	<br />
	{$DVWAUploadsWrite}<br />
	{$DVWAPHPWrite}<br />
	<br />
	<br />
	{$bakWritable}
	<br />
	<i><span class=\"failure\">Estado en rojo</span>, indican que habr� un problema al tratar de completar algunos m�dulos.</i><br />
	<br />
	Si ve deshabilitado en cualquiera <i>allow_url_fopen</i> o <i>allow_url_include</i>, configure lo siguiente en su archivo php.ini y reinicie Apache.<br />
	<pre><code>allow_url_fopen = On
allow_url_include = On</code></pre>
	Estos solo son necesarios para los laboratorios de inclusi�n de archivos, as� que a menos que quieras jugar con ellos, puedes ignorarlos.

	<br /><br /><br />

	<!-- Create db button -->
	<form action=\"#\" method=\"post\">
		<input name=\"create_db\" type=\"submit\" value=\"Crear / Restablecer Base de Datos\">
		" . tokenField() . "
	</form>
	<br />
	<hr />
</div>";

dvwaHtmlEcho( $page );

?>
