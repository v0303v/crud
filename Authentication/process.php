<?php
// include './DbConnection.php';
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
class insertUser extends DbConnection {
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
            // var_dump($_POST);die;
            } else{  
                $checker = "SELECT * FROM `users` WHERE login=:login AND password=:password";
            
                $sql = $this->DbConnection->prepare($checker); 
                $sql->bindParam(':login', $this->login, PDO::PARAM_STR);
                $sql->bindParam(':password', $this->password, PDO::PARAM_STR);

                      

                $sql->execute(); 
                
                // var_dump($sql); die;
                $row=$sql->rowCount(); 
                // $fetch=$sql->fetch(PDO::FETCH_ASSOC);
        
                // var_dump($row); die;
                // var_dump($fetch); die;
                if($row > 0) {   
                    $_SESSION['login'] = $_POST['login'];
                    header('location:../CRUD/crud.php'); 
                    // var_dump($_SESSION); die;
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




    