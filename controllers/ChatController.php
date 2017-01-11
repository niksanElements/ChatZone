<?php

/**
 * Created by PhpStorm.
 * User: Nikolay
 * Date: 1/11/2017
 * Time: 12:31 AM
 */
class ChatController extends BaseController
{
    function index()
    {
        $this->friends = $this->model->getFriends($_SESSION["userID"]);
        //$this->renderView('index');
    }

    function friends()
    {
        $this->friends = $this->model->getFriends($_SESSION["userID"]);
        $this->renderView('friends',false);
    }

    public function conversation($userId)
    {
        $currentID = $_SESSION['userID'];
        $date = new DateTime();
        $date->sub(new DateInterval('P10D'));
        $date = $date->format('Y-m-d H:i:s');
        $this->messages = $this->model->newMessages($currentID,$userId,$date);
        $this->renderView('newMessages',false);
    }

    public function message($userId)
    {
        $text = $_POST['text'];
        $currentID = $_SESSION['userID'];
        $this->message = $this->model->setMessage($currentID,$userId,$text);
        $this->message[0]['author'] = $_SESSION['username'];
        $this->renderView("message",false);
    }

    public function newMessages($toUser)
    {
        $date = $_POST['date'];
        $fromUser = $_SESSION['userID'];
        $this->messages = $this->model->newMessages($fromUser,$toUser,$date);
        $this->renderView("newMessages",false);
    }

}