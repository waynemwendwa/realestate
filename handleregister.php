<?php

$link = mysqli_connect("localhost", "root", "", "estate");

if (isset($_POST["register"])) {
   
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    #lenght of pass

    if (strlen($password) < 6) {
        $l_pass_error = "Password must have 6 characters";
        echo $l_pass_error;
    }

    if (empty($l_pass_error)) {

    $sql = "INSERT INTO `residents`(`id`, `email`, `password`) VALUES ('','$email','$password')";


        $result = mysqli_query($link, $sql);

        if ($result) {
            header("location:catalogue.html");
        } else {
            echo "error executing query $sql" . mysqli_error($link);
        }


    }

}
?>