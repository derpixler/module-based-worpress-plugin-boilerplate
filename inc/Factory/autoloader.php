<?php # -*- coding: utf-8 -*-

namespace ModuleBasedWordPressPlugin\Factory;

use Requisite\Requisite;
use Requisite\Rule\Psr4;
use Requisite\SPLAutoLoader;

class Autoloader implements AutoloaderInterface{

	private static $autoloader;

	private static $module;

	/**
	 * Create the autoloader
	 *
	 * @return mixed
	 */
	public static function create() {

		self::getRequisite();

		self::$autoloader = new SPLAutoLoader;

		self::$autoloader->addRule(
			new Psr4(
				ModuleBasedWordPressPlugin_PLUGIN_BASEDIR . 'inc',       // base directory
				ModuleBasedWordPressPlugin_BASENAMESPACE // base namespace
			)
		);

		self::$module = (new ModuleLoader())::getModules();

		return self::$module;
	}

	public static function initializeModule($modul): array {
        $modul = "\\" . ModuleBasedWordPressPlugin_BASENAMESPACE . "\\" . $modul;
        return new $modul();
    }

    /**
	 * Load the Requisite library. Alternatively you can use composer's
	 */
	private static function getRequisite(){
		$declared_classes = array_flip( get_declared_classes() );

		if ( ! array_key_exists( 'Requisite\Requisite', $declared_classes ) ) {
			require_once ModuleBasedWordPressPlugin_PLUGIN_VENDOR . '/requisite/src/Requisite/Requisite.php';
			Requisite::init();
		}
	}
}