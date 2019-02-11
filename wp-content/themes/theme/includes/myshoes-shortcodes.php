<?php
	/*
	 * Shares shortcode: 
	 */
	function shares_func( $atts ) {
		extract( shortcode_atts( array(		
			'id' => 0
		), $atts ) );
	
		ob_start();                
	        include(locate_template( '/shortcodes/shares.php' ));
	        return ob_get_clean();
	}
	add_shortcode( 'shares', 'shares_func' );