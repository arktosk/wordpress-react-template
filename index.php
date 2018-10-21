<?php 
require get_parent_theme_file_path( '/router/Router.php' );

use C11\Router;

/**
 * Set up simple router for Sinle Page Applications.
 */
$request = new Router\FrontRequest( $_SERVER['REQUEST_URI'] );
$request->goToRoute();

http_response_code( 404 );
die;
?>