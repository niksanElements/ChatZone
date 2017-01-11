<?php
/**
 * Created by PhpStorm.
 * User: Nikolay
 * Date: 1/10/2017
 * Time: 3:17 PM
 */

require_once ('config.php');
require_once ('functions.php');
session_start();
$requestParsed = parseRequest();
processRequest($requestParsed);