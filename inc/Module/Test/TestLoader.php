<?php
/**
 * Created by PhpStorm.
 * User: renereimann
 * Date: 05.04.18
 * Time: 07:52
 */

namespace ModuleBasedWordPressPlugin\Module\Test;

class TestLoader {

	public function __construct() {

		echo '<pre>';print_r( [ 'DEBUG_LOCATION' => [ 'PATH' => dirname( __FILE__ ), 'FILE' => basename( __FILE__ ), 'FUNCTION' => __FUNCTION__ . ':' . __LINE__ ], 'DEBUG' => [
			'll' => 'lll',
		]
		                      ] );
		die();


	}

}