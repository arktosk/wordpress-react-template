<?php 


/**
 * Simple loader for BLOCKS.
 * Load all *.php files match \blocks\*\*.php glob.
 */
foreach ( glob( get_parent_theme_file_path( '/blocks/*/*.php' ) ) as $block_path ) {
    
    /**
     * BLOCK: Custom Block.
     */
    // require $block_path;
}
?>