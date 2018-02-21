<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Vulnerabilidad: Inyecci�n de SQL (Ciegas)' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'sqli_blind';
$page[ 'help_button' ]   = 'sqli_blind';
$page[ 'source_button' ] = 'sqli_blind';

dvwaDatabaseConnect();

$method            = 'GET';
$vulnerabilityFile = '';
switch( $_COOKIE[ 'security' ] ) {
	case 'low':
		$vulnerabilityFile = 'low.php';
		break;
	case 'medium':
		$vulnerabilityFile = 'medium.php';
		$method = 'POST';
		break;
	case 'high':
		$vulnerabilityFile = 'high.php';
		break;
	default:
		$vulnerabilityFile = 'impossible.php';
		break;
}

require_once DVWA_WEB_PAGE_TO_ROOT . "vulnerabilities/sqli_blind/source/{$vulnerabilityFile}";

// Is PHP function magic_quotee enabled?
$WarningHtml = '';
if( ini_get( 'magic_quotes_gpc' ) == true ) {
	$WarningHtml .= "<div class=\"warning\">La Funci�n PHP \"<em>Magic Quotes</em>\" est� Habilitada.</div>";
}
// Is PHP function safe_mode enabled?
if( ini_get( 'safe_mode' ) == true ) {
	$WarningHtml .= "<div class=\"warning\">La Funci�n PHP  \"<em>Safe mode</em>\" est� Habilitad.</div>";
}

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>Vulnerabilidad: Inyecci�n de SQL (Ciegas)</h1>

	{$WarningHtml}

	<div class=\"vulnerable_code_area\">";
if( $vulnerabilityFile == 'high.php' ) {
	$page[ 'body' ] .= "Click <a href=\"#\" onclick=\"javascript:popUp('cookie-input.php');return false;\">aqu� para cambiar su identificaci�n</a>.";
}
else {
	$page[ 'body' ] .= "
		<form action=\"#\" method=\"{$method}\">
                <p> Usuario ID:";
	if( $vulnerabilityFile == 'medium.php' ) {
		$page[ 'body' ] .= "\n<select name=\"id\">";
		$query  = "SELECT COUNT(*) FROM users;";
		$result = mysqli_query($GLOBALS["___mysqli_ston"],  $query ) or die( '<pre>' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>' );
		$num    = mysqli_fetch_row( $result );
		$i      = 0;
		while( $i < $num ) { $i++; $page[ 'body' ] .= "<option value=\"{$i}\">{$i}</option>"; }
		$page[ 'body' ] .= "</select>";
	}else{
		$page[ 'body' ] .= "\n <input type=\"text\" size=\"15\" name=\"id\">";
	        $page[ 'body' ] .= "\n <input type=\"submit\" name=\"Submit\" value=\"Enviar\">
			</p>\n";
         }
	if( $vulnerabilityFile == 'impossible.php' ){
		$page[ 'body' ] .= "  " . tokenField();
	        $page[ 'body' ] .= "</form>";
         }

        $page[ 'body' ] .= " {$html}
	</div>

	<h2>M�s Informaci�n</h2>
	<ul>
		<li>" . dvwaExternalLinkUrlGet( 'http://www.securiteam.com/securityreviews/5DP0N1P76E.html' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://en.wikipedia.org/wiki/SQL_injection' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'http://ferruh.mavituna.com/sql-injection-cheatsheet-oku/' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'http://pentestmonkey.net/cheat-sheet/sql-injection/mysql-sql-injection-cheat-sheet' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Blind_SQL_Injection' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'http://bobby-tables.com/' ) . "</li>
	</ul>
        </div>\n";
}
dvwaHtmlEcho( $page );

?>
