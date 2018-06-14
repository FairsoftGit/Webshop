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
    const DB_HOST = '178.251.31.13:3306';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'liannela_fsdb2';

    /**
     * Database user
     * @var string
     */
    const DB_USER = 'liannela_superuser';

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = '6Z0wKRrPyg';

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
}
