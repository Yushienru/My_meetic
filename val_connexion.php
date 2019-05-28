<?php
require "header.php";
$log = mysqli_connect("localhost","root","root","my_meetic");

if (mysqli_connect_errno()) {
    echo "Failed;", mysqli_connect_error();
}
$email = $_POST['email']; 
$password = $_POST['password']; 
if(isset($email, $password)) 
{
        $sql = "SELECT * FROM user WHERE id_user=? OR email=?;";
        $stmt = mysqli_stmt_init($log);
        if (!mysqli_stmt_prepare($stmt, $sql)) 
        { 
            echo " c'est encore encore de la merde";
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "ss", $email,$email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)){
                $passcheck = password_verify($password, $row['password']);
                if ($passcheck == false) {
                    echo "Connexion failed";
                    exit();
                }
                else if ($passcheck == true) {
                    session_start();
                    $_SESSION['user_id'] = $row['id_user'];
                    $_SESSION['nom'] = $row['nom'];
                    $_SESSION['prenom'] = $row['prenom'];
                    $_SESSION['sex'] = $row['sex'];
                    $_SESSION['birthdate'] = $row['birthdate'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['ville'] = $row['ville'];
                    $_SESSION['password'] = $row['password'];
                    header("location:index.php");
                    echo "Connexion réussie";
                    exit();
                }
            }
        }
    }
require "footer.php";

?>