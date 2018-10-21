<?php 
require get_parent_theme_file_path( '/router/Router.php' );

use C11\Router;

/**
 * Set up simple router for Sinle Page Applications.
 */
$request = new Router\FrontRequest( $_SERVER['REQUEST_URI'] );
$request->goToRoute();

echo '<pre>';
print_r( $request->isFile() );
echo '</pre>';
echo '<pre>';
var_dump( $request->isFile() );
echo '</pre>';
die();


// if () {

// }

// if ( $_SERVER['REQUEST_URI'] != '/' && file_exists( $publicDir . $_SERVER['REQUEST_URI'] ) ) {
//   header('Content-Type: ' . mime_content_type( $publicDir . $_SERVER['REQUEST_URI'] ) );
//   echo file_get_contents( $publicDir . $_SERVER['REQUEST_URI'] );
//   die;
// }
// else {
//   echo file_get_contents( $publicDir . "index.html" );
//   die;
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <p>Hello World!</p>
  <p><strong>DIRECTORY_SEPARATOR: </strong><?php echo DIRECTORY_SEPARATOR; ?></p>
  <p><strong>Root: </strong><?php echo $_SERVER['DOCUMENT_ROOT']; ?></p>
  <p><strong>__DIR__: </strong><?php echo __DIR__; ?></p>
  <p><strong>Path: </strong><?php echo $path; ?></p>
  <p><strong>Path: </strong><?php echo $theme_path; ?></p>
  <p><strong>Extension: </strong><?php echo $file_ext; ?></p>
  <p><strong>Template directory uri: </strong><?php echo get_template_directory_uri(); ?></p>
  <p><strong>Template directory: </strong><?php echo get_template_directory(); ?></p>
  <p><strong>Template path: </strong><?php echo 'C:/XAMPP/htdocs/wordpress.test/wp-content/themes/reactivity11/front/public/static/test.js'; ?></p>
  <p><strong>Template path: </strong><?php var_dump( file_exists( 'C:\\XAMPP\\htdocs\\wordpress.test\\wp-content\\themes\\reactivity11\\front\\public\\' . $_SERVER['REQUEST_URI'] ) ); ?></p>
</body>
</html>