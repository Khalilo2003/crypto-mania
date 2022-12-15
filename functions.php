<?php 
function database(){
    return new mysqli("localhost", "root", "", "cryptomania");
}

function login(){
    // als alles elke textbox is ingevuld voert die uit
    if(!empty($_POST["username"])&& !empty($_POST["password"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        // kijkt bij de table users bij username en daar kijkt die nar de account naam wat er in de systeem staan.
        $sql ="SELECT * FROM users WHERE username ='$username'";
        $connection = database();
        $result = $connection->query($sql);
        if($result->num_rows==1){
            $array = [];
            while($row = $result->fetch_assoc()){
                $array = $row;
            }
            if($password == $array['password']){
                // controlleert of de username overheen komt met de wachtwoord
                $_SESSION["user"] = $array;
                header("location: index.php");
            }else{
                echo"Wrong password";
            }
        }else{
            echo"Wrong username";
        }
    }
}

function register(){
    // als alles is ingevoerd anders krijg je een melding
    if(!empty($_POST["username"])&& !empty($_POST["password"]) && !empty($_POST["againpassword"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $againpassword = $_POST["againpassword"];
        $sql ="SELECT * FROM users WHERE username ='$username'";

        $connection = database();
        $result = $connection->query($sql);

        if ($result->num_rows==0){
            if($password == $againpassword){
                $sql2 = "INSERT INTO users(username,password) VALUES('$username', '$password')";
                $connection->query($sql2);
                // als je een account maakt dan krijg je deze ego.
            echo"User created";
            }
            else{
                echo"Password dont match";
            }
        }else{
            echo"Username is taken";
        }

    }
}

function checkLogin(){
    if(isset($_SESSION["user"])){
        // als je bent ingelogd word je naar index gestuurd
        header("location: index.php");
    }
}

function buyCoin(){
    $userId = $_SESSION["user"]["userId"];
    $coinName = $_POST['coinName'];
    $coinAmount = $_POST['coinAmount'];
    $sql = "SELECT * FROM portfolio WHERE userid ='$userId' AND coinName='$coinName'" ;
    $connection = database();
    $result = $connection->query($sql);

    if($result->num_rows==1){
        $array = [];
        while($row=$result->fetch_assoc()){
            $array = $row;
        }
        $NewCoinAmount = $array['coinAmount']+$coinAmount;
        $portfolioId = $array["portfolioId"];
        $sql2 = "UPDATE portfolio SET coinAmount = '$NewCoinAmount' WHERE portfolioId = '$portfolioId'";
        $connection->query($sql2);
        echo"Coin gekocht";
    }else{
        $sql3 = "INSERT INTO portfolio(userId, coinAmount, coinName) VALUES('$userId', '$coinAmount', '$coinName')";
        $connection->query($sql3);
        echo"Coin gekocht";
    }


}
function getAllPortfolioCoins(){
    $userId = $_SESSION["user"]["userId"];
    $sql = "SELECT * FROM portfolio WHERE userId = '$userId'";
    $connection = database();
    $array = [];
    $result = $connection->query($sql);
    while($row=$result->fetch_assoc()){
        $array[] = $row;
    }
    return $array;
}
?>