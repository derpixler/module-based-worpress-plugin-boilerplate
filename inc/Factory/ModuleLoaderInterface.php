<?php # -*- coding: utf-8 -*-

namespace ModuleBasedWordPressPlugin\Factory;

interface ModuleLoaderInterface{

	/**
	 * @return array
	 */
	public static function getModules(): array;

	/**
	 * @param mixed $modulePath
	 */
	public static function setModulePath( $modulePath = false );

}