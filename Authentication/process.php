<?php
//DbConnection to local database 
class DbConnection {
    public $host = 'localhost';
    public $root = 'root';
    public $rootpass = '';
    public $dbName = 'dbarf';
    public $conn;

    public function __construct()
    {
        try{
            $this->DbConnection = new PDO("mysql:host=$this->host; dbname=$this->dbName", $this->root, $this->rootpass);
            $this->DbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $exp){
            echo $exp->getMessage();
        }
    }
}

class createUser extends DbConnection {
    public $login;
    public $password;
    
    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
        parent::__construct();
    }

    public function inseption(){
        try{
            $insert = "INSERT INTO `users` (login, password) VALUE (:login, :password)";

            $sql = $this->DbConnection->prepare($insert);
            $sql->bindParam(':login', $_POST['login'], PDO::PARAM_STR);
            $sql->bindParam(':password', $_POST['password'], PDO::PARAM_STR);

            $sql->execute(); 
        }
        catch (PDOException $exp){
            echo $exp->getMessage();
        }
    }
}

class checkUser extends DbConnection {
    public $login;
    public $password;
    
    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;

        parent::__construct();
    }

    public function userCheck() {
        try{
            if(empty($_POST['login']) || empty($_POST['password']))  { 

                $message = 'All fields are required';
                return $message; 
            } else{  
                $checker = "SELECT * FROM `users` WHERE login=:login AND password=:password";
            
                $sql = $this->DbConnection->prepare($checker); 
                $sql->bindParam(':login', $this->login, PDO::PARAM_STR);
                $sql->bindParam(':password', $this->password, PDO::PARAM_STR);

                $sql->execute(); 
                
                $row=$sql->rowCount(); 

                if($row > 0) {   
                    $_SESSION['login'] = $_POST['login'];
                    header('location:../App/crud/crud.php'); 
                }  
                else {  
                    $message = 'Wrong inputs';  
                    return $message;
                }  
            }   
        }
        catch (PDOException $exp){

            echo $exp->getMessage();
        }
    }
}

$login = $_POST['login'];
$password = $_POST['password']; 
$passwordconfirm = $_POST['passwordconfirm'];
//TODO password incryption
// AND confirmation password!

if ($_POST['password']!== $_POST['passwordconfirm']){
    echo "Your passwords did not match";
} else {
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $register = new createUser($login, $password);
        $register->inseption();

        echo header('./register.php');
    }
}

//login part
$login = $_POST['login'];
$password = $_POST['password']; 

$logIn = new checkUser($login, $password, $message);
$logIn-> userCheck();

if (isset($_SESSION['login'])){
    header('location:../App/crud/crud.php');
}