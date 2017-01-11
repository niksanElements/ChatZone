<?php
/**
 * Created by PhpStorm.
 * User: Nikolay
 * Date: 1/10/2017
 * Time: 5:25 PM
 */

class HomeController extends BaseController
{
    function __construct($controllerName, $actionName)
    {
        parent::__construct($controllerName, $actionName);
    }

    function index()
    {
        $this->renderView('index');
    }
}