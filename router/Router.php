<?php
namespace C11\Router;

/**
 * 
 */
class FrontRequest {
    protected $path;
    protected $file = false;
    protected $MIME_TYPES = array(
        'css'  => 'text/css',
        'js'   => 'application/javascript',
        'json' => 'application/json',
        'map'  => 'application/json',
    
        // Images
        'png'  => 'image/png',
        'jpe'  => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg'  => 'image/jpeg',
        'gif'  => 'image/gif',
        'bmp'  => 'image/bmp',
        'ico'  => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif'  => 'image/tiff',
        'svg'  => 'image/svg+xml',
        'svgz' => 'image/svg+xml',
    );

    public function __construct( $requestURI ) {

        $this->path = $requestURI;

        $path_parts = pathinfo( $this->path );

        $this->dirName   = $path_parts['dirname'];
        $this->baseName  = $path_parts['basename'];
        $this->fileName  = $path_parts['filename'];
        $this->extension = $path_parts['extension'];
        
        if ( $this->extension !== '' && isset( $this->MIME_TYPES[ $path_parts['extension'] ] ) ) {
            $this->mime_type = $this->MIME_TYPES[ $path_parts['extension'] ];

            /** Sanitize directories separator. */
            $filePath = str_replace( "\\\\", "/", $filePath);
            $filePath = str_replace( "\\",   "/", $filePath);
            
            /** Set folder for front requests. */
            $filePath = get_parent_theme_file_path( 'front/public' . $requestURI );

            $this->filePath = $filePath;

            /** Allow files only for existing files from 'front/public/static' directory */
            if ( $this->getPathParts()[0] === 'static' && file_exists( $this->getFilePath() ) ) {
                $this->file = true;
            }
        }
    }

    public function isFile() {
        return $this->file;
    }

    public function getPath() {
        return $this->path;
    }
    public function getFilePath() {
        return $this->filePath;
    }
    public function getPathParts() {
        return explode( '/', trim( $this->path, '/' ) );
    }
    public function getDirectory() {
        return $this->dirName;
    }
    public function getBaseName() {
        return $this->baseName;
    }
    public function getFileName() {
        if ( ! $this->file ) {
            return false;
        }
        return $this->fileName;
    }
    public function getExtension() {
        if ( ! $this->file ) {
            return false;
        }
        return $this->extension;
    }
    public function getMimeType() {
        if ( ! $this->file ) {
            return false;
        }
        return $this->mime_type;
    }

    public function goToRoute() {
        if ( $this->file ) {
            header_remove();

            if ( ! file_exists( $this->getFilePath() ) ) {
                http_response_code( 404 );
                die;
            }
            else {
                http_response_code( 200 );
                header( 'Content-Type: ' . $this->getMimeType() );
                echo file_get_contents( $this->getFilePath() );
                die;
            }
        }
        else {
            http_response_code( 200 );
            header( 'Content-Type: text/html; charset=utf-8' );
            echo file_get_contents( get_parent_theme_file_path( 'front/public/index.html' ) );
            die;
        }
    }
}