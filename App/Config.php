<?php

namespace App;
/**
 * Application configuration
 *
 * PHP version 7.0
 */
class Config
{
    /*
    const DB_HOST = '178.251.31.13:3306';
    const DB_NAME = 'liannela_fsdb';
    const DB_USER = 'liannela_superuser';
    const DB_PASSWORD = '6Z0wKRrPyg';
    */

    /**
     * Database host
     * @var string
     */
    const DB_HOST = '127.0.0.1:3306';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'Fairsoft';

    /**
     * Database user
     * @var string
     */
    const DB_USER = 'root';

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = '';

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = false;

    /**
     * Image folder
     * @var string
     */
    const IMAGE_FOLDER = 'img';

    const DEFAULT_LANGUAGE = 'nl';

    const AVAILABLE_LANGUAGES =['nl' => 'Nederlands', 'en' => 'English'];
}
