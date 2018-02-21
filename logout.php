<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'phpids' ) );

if( !dvwaIsLoggedIn() ) {	// The user shouldn't even be on this page
	// dvwaMessagePush( "No has iniciado sesi�n" );
	dvwaRedirect( 'login.php' );
}

dvwaLogout();
dvwaMessagePush( "Usted ha cerrado sesi�n" );
dvwaRedirect( 'login.php' );

?>
