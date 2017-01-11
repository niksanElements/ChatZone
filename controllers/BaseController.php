<?php
/**
 * Created by PhpStorm.
 * User: Nikolay
 * Date: 1/10/2017
 * Time: 3:46 PM
 */

abstract class BaseController
{
    protected $controllerName;
    protected $actionName;
    protected $model;

    protected $validationErrors = [];

    protected $isPost = false;
    protected $isLoggedIn = false;
    protected $isViewRendered = false;

    function __construct(string $controllerName,string $actionName)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $this->isPost = true;
        }

        $this->isLoggedIn = isset($_SESSION['userID']);

        $modelClassName = ucfirst(strtolower($controllerName)) . 'Model';
        if (class_exists($modelClassName)) {
            $this->model = new $modelClassName();
        }
        $this->onInit();
    }

    public function onInit(){}

    public function index(){}

    public function renderView(string $viewName = null,bool $includeLayout = true)
    {
        if(!$this->isViewRendered){
            ob_start();
            if ($viewName == null) {
                $viewName = $this->actionName;
            }
            $viewFileName = 'views/' . $this->controllerName . '/' . $viewName . '.php';
            include($viewFileName);
            $htmlFromView = ob_get_contents();

            ob_end_clean();
            if ($includeLayout) {
                include('views/_layout/header.php');
            }
            echo $htmlFromView;
            if ($includeLayout) {
                include('views/_layout/footer.php');
            }
            $this->isViewRendered = true;
        }
    }
    
    public function redirectToUrl(string $url)
    {
        header("Location: " . $url);
        die;
    }

    public function redirect(
        string $controllerName, string $actionName = null, array $params = null)
    {
        $url = APP_ROOT . '/' . urlencode($controllerName);
        if ($actionName != null) {
            $url .= '/' . urlencode($actionName);
        }
        if ($params != null) {
            $encodedParams = array_map('urlencode',$params);
            if(count($params) == 1){
                $url.= '/'.$encodedParams[0];
            }
            else {
                $url .= implode('/', $encodedParams);
            }
        }
        $this->redirectToUrl($url);
    }

    public function authorize() {
        if (! $this->isLoggedIn) {
            $this->addErrorMessage("Please login first.");
            $this->redirect("users", "login");
        }
    }

    public function authorizeAdmin() {
        if(!$this->isAdmin) {
            $this->addErrorMessage("Access denied!");
            $this->redirect("home", "index");
        }
    }

    function addMessage(string $msg, string $type)
    {
        if (!isset($_SESSION['messages'])) {
            $_SESSION['messages'] = array();
        };
        array_push($_SESSION['messages'],
            array('text' => $msg, 'type' => $type));
    }

    function addInfoMessage(string $infoMsg)
    {
        $this->addMessage($infoMsg, 'info');
    }

    function addErrorMessage(string $errorMsg)
    {
        $this->addMessage($errorMsg, 'error');
    }

    function setValidationError(string $fieldName, string $errorMsg)
    {
        $this->validationErrors[$fieldName] = $errorMsg;
    }

    function formValid() : bool
    {
        return count($this->validationErrors) == 0;
    }
}