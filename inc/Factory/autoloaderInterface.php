<?php # -*- coding: utf-8 -*-

namespace ModuleBasedWordPressPlugin\Factory;

/**
 * Interface AutoloaderInterface
 *
 * @package ModuleBasedWordPressPlugin\Factory
 */
interface AutoloaderInterface{

    /**
     * @param $module
     *
     * @return array
     */
    public static function initializeModule($module): array;

    /**
     * @return mixed
     */
    public static function create();

}