<?php

/**
 * Created by PhpStorm.
 * User: Nikolay
 * Date: 1/10/2017
 * Time: 10:08 PM
 */

class UserController extends BaseController
{
    public function registration()
    {
        if($this->isPost){
            $username =$_POST['username'];
            if (strlen($username) < 2 || strlen ($username)> 50) {
                $this -> setValidationError("username", "Invalid Username");
            }
            $passwordRepeat =$_POST['password-repeat'];
            $password =$_POST['password'];
            if (strlen($password) < 3) {
                $this -> setValidationError("password", "Invalid Password - password must be at least 3 symbols.");
            }
            if ($password != $passwordRepeat) {
                $this -> setValidationError("password-repeat", "Both passwords do not match.");
            }
            
            if($this->formValid()){
                $userID = $this->model->registration ($username, $password);
                if ($userID){
                    $_SESSION['username'] = $username;
                    $_SESSION['userID'] = $userID;
                    $this -> addInfoMessage("Registration successful.");
                    $this->model->setOnline($userID,1);
                    $this -> redirect('home');
                }else{
                    $this->addErrorMessage("Registration failed. Try again.");
                }

            }

        }
    }

    public function login()
    {
        if($this->isPost){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $userId = $this->model->login($username, $password);
            if ($userId){
                $_SESSION['userID'] = $userId;
                $_SESSION['username'] = $username;
                $this->model->setOnline($userId,1);
                return $this->redirect('home');
            } else{
                $this->addErrorMessage("Error: Login failed.");
            }
        }
    }

    public function logout()
    {
        $this->model->setOnline($_SESSION['userID'],0);
        session_destroy();
        $this->addInfoMessage("Logout successful.");
        $this->redirect("home");
    }

    public function account()
    {
        $this->authorize();

        if($this->isPost)
        {
            $full_name = $_POST["full_name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password_confirm = $_POST["password_confirm"];

            if (strlen($full_name) < 2|| strlen ($full_name)> 200) {
                $this->setValidationError("full_name", "Full Name must be between 2 and 200 characters.");
            }
            if (strlen($email) < 2 || strlen($email) > 80) {
                $this->setValidationError("email", "Please, enter your email address.");
            }

            if($this->formValid())
            {
                $result = $this->model->editUserAccount($_SESSION["userID"], $full_name, $email, $password);
                if($result === true)
                {
                    $this->addInfoMessage("Edit successful.");
                }
                else
                {
                    $this->addErrorMessage("Edit failed. Try again.");
                }
            }
        }

        $this->user = $this->model->getUserAccount($_SESSION["userID"]);
    }
}