<?php
require_once ('model/user.php'); // chargement du modèle
    class WelcomController{
        public static function loggedOnly(){
            session_start();
            if((!isset($_SESSION['userName'])) && (!isset($_SESSION['password']))){
                require ('view\login\login.php');
                exit();
              }
            
        }
        public static function welcom() {
            self::loggedOnly();
            $controller='welcom';
            $user=User::getbyUserName($_SESSION['userName']);
            if($user->admin==1){
                $userAction="Users";
                $userActionPath="index1.php?controller=user&action=getAll";
                $articlAction="Articles";
                $articlActionPath="";
            }
            else{
                $userAction="";
                $userActionPath="";
                $articlAction="";
                $articlActionPath="";
            }
            require ('view/welcom/index.php'); //redirige vers la vue
        }


        public static function loginProcess(){
            session_start();
            $controller='welcom';

            setcookie('userName' , null, time()-1 );
            setcookie('password' , null, time()-1 );
            if($_POST){
                $userName=$_POST['userName'];
                $password=$_POST['password'];
                if(!empty($userName) && !empty($password)){
                    $user=User::getbyUserName($userName);
                    if(!$user){
                        echo "wrong user name !!!!!!";
                    }
                    else{
                        $truePassword=$user->password;
                        if($password==$truePassword){
                            $_SESSION['userName']=$userName;
                            $_SESSION['password']=$password;
                            if(isset($_POST["check"])){
                                setcookie('userName' , $userName, time()+ 3600*24*15 );
                                setcookie('password' , $password, time()+ 3600*24*15 );
                            }
                            else{
                                unset($_COOKIE['userName']);
                                unset($_COOKIE['password']);
                                setcookie('username' , null, time()-1 );
                                setcookie('password' , null, time()-1 );
                            }

                            if($user->admin==1){
                                $userAction="Users";
                                $userActionPath="index1.php?controller=user&action=getAll";
                                $articlAction="Articles";
                                $articlActionPath="";
                            }
                            else{
                                $userAction="";
                                $userActionPath="";
                                $articlAction="";
                                $articlActionPath="";
                            }
                            // $action="welcom";
                            require ('view/welcom/index.php');
                            exit();
                        }
                        else{

                            require ('view/login/login.php'); //redirige vers la vue
                            echo "wrong password !!!!!!";
                            // exit();
                        }
                    }
                    
                }
                
            }
        }

        public static function page(){
            session_start();
            $controller='welcom';
            if (isset($_SESSION['username'])) {
                //if (isset($_GET['p'])) {
                    $userName = $_SESSION['username']; 
                    //$page=$_GET['p'] ;
                    $user=User::getbyUserName($userName);
                    if($user->admin==1){
                        $userAction="Users";
                        $userActionPath="index1.php?controller=user&action=getAll";
                        $articlAction="Articles";
                        $articlActionPath="";
                    }
                    else{
                        $userAction="";
                        $userActionPath="";
                        $articlAction="";
                        $articlActionPath="";
                    }
                    //if ($page == "single") {
                        require ('view/welcom/single.php');
                   // }

                //}
        }
        else {
            header("Location: view/login/login.php");
        }


        }


        public static function signupProcess(){

            if($_POST){

                $user=User::getbyUserName($_POST['userName']);
                if(!$user){
                    $firstName=$_POST['firstName'];
                    $lastName=$_POST['lastName'];
                    $userName=$_POST['userName'];
                    $email=$_POST['email'];
                    $password=$_POST['password'];
                    $gender=$_POST['gender'];
                    $user=new User($firstName,$lastName,$userName,$email,$password,$gender,0);
                    $user->save();
                    require 'view/login/login.php';
                    echo "user created ";
                }
                else{
                    echo "this user name already existe!!!!!";
                }

            }

        }

        public static function login(){
            require ('view/login/login.php'); //redirige vers la vue
            exit();

        }

        public static function signup(){
            
            require ('view/login/signup.php');
            exit();
        }

        public static function logout(){
            session_start();
           
            unset($_SESSION['userName']);
            unset($_SESSION['password']);
            unset($_POST['userName']);
            
            require ('view/login/login.php');
            exit();
        }

        public static function getUsername(){
            if(isset($_COOKIE['userName'])){
                return $_COOKIE['userName'];
            }
        }

        public static function getPassword(){
            if(isset($_COOKIE['password'])){
                return $_COOKIE['password'];
            }
        }
    }
?>