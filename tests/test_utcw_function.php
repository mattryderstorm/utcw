<?php

class UTCW_Test_Function extends WP_UnitTestCase {

	function test_function_exists() {
		$this->assertTrue( function_exists('do_utcw') );
	}

	function test_function_outputs_html() {
		$this->expectOutputRegex( UTCW_TEST_HTML_REGEX );
		do_utcw( array() );
	}

	function test_function_and_shortcode_is_equal() {
		$utcw = UTCW_Plugin::get_instance();
		$this->expectOutputString( $utcw->utcw_shortcode( array() ) );
		do_utcw( array() );
	}

}