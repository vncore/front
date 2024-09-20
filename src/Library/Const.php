<?php
/**
 * Front define
 */
// check if not exist, define it

if (!defined('VNCORE_FRONT_MIDDLEWARE')) {
    define('VNCORE_FRONT_MIDDLEWARE', ['web', 'front']);
}