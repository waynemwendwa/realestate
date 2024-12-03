<?php


$link = mysqli_connect("localhost", "root", "", "estate");


if (isset($_POST["login"])) {


    $useremail = $_POST["email"];
    $userpassword = $_POST["password"];

    $sql = "SELECT * FROM `residents` WHERE email='$useremail'";

    $result = mysqli_query($link, $sql);

    if ($result) {
        $data = mysqli_num_rows($result);

        if ($data == 1) {
            while ($row = mysqli_fetch_array($result)) {
                $id = $row["id"];
                $email = $row["email"];
                $password = $row["password"];


                #verify password

                if ($userpassword == $password) {

                    header("location:catalogue.html");


                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $id;
                    $_SESSION["username"] = $email;


                } else {
                    echo "<h3>Passwords do not match</h3>";
                }
            }
        } else {
            echo "<h3>User not found</h3>";
        }

    } else {
        echo "Error executing query $sql" . mysqli_error($link);
    }
}
?>