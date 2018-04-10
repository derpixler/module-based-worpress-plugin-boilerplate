<?php # -*- coding: utf-8 -*-

namespace ModuleBasedWordPressPlugin\Factory;

/**
 * Class ModuleLoader
 *
 * @package ModuleBasedWordPressPlugin\Factory
 */
class ModuleLoader extends Autoloader implements ModuleLoaderInterface{

	/**
	 * @var array
	 */
	private static $modules = [];

	/**
	 * @var
	 */
	private static $modulePath;

	/**
	 * @return array
	 */
	public static function getModules(): array{
		self::initModule();
		return self::$modules;
	}


    /**
     * @param string $modulePath
     *
     * @return string
     */
    public static function setModulePath($modulePath = '' ): string {
		self::$modulePath = (!empty($modulePath)) ? $modulePath : ModuleBasedWordPressPlugin_PLUGIN_BASEDIR . 'inc/Module';
		return self::$modulePath;
	}

	/**
	 * @return void
	 */
	private static function initModule(){
		self::$modules = self::scanModuleDir();

		foreach(self::$modules as $module => $moduleClasses){
			if(!empty($moduleClasses)) {
				foreach ($moduleClasses as $moduleClass){
					self::initializeModule('Module\\' . $module . '\\' . $moduleClass);
				}
			}
		}
	}

	/**
	 * @return array
	 */
	private static function scanModuleDir(): array{
		$modules = [];
		$modulesPath = (empty(self::$modulePath) ? self::setModulePath() : self::$modulePath );
		$moduleContent = scandir($modulesPath);

		foreach($moduleContent as $module){
			$modulePath = $modulesPath . '/' . $module;

			if(is_dir($modulePath) && $module != '.' && $module != '..'){
				$modules[$module] = self::getModuleClasses(glob($modulePath.'/*.php'));

			}
		}

		return $modules;
	}

	/**
	 * @param $classes
	 *
	 * @return array
	 */
	private static function getModuleClasses($classes): array{
		$moduleClasses = [];

		foreach($classes as $class){
			$moduleClasses[] = str_replace('.php', '', basename($class));
		}

		return $moduleClasses;
	}

}