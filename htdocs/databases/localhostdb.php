<?php
    echo 'Page loaded <br>';
    $instance = new mysqli('localhost', 'root', '1234', 'localhostdb') or die("connection failure" . $instance->connect_error());

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['serverIndex_PostSubmit']))
    {
        echo 'Request found <br>';

        if (
        isset($_POST['serverIndex_PostName'])
        && isset($_POST['serverIndex_PostEmail'])
        && isset($_POST['serverIndex_PostPhoneNumber'])
        )
        {
            $name = $_POST['serverIndex_PostName'];
            $email = $_POST['serverIndex_PostEmail'];
            $phoneNumber = $_POST['serverIndex_PostPhoneNumber'];
            echo $name . '<br>';
            echo $email . '<br>';
            echo $phoneNumber . '<br>';

            $script = "INSERT INTO `users` (`name`, `email`, `phoneNumber`) VALUES ('$name', '$email', '$phoneNumber')";
            echo $script . '<br>';

            $query = $instance->query($script) or die($instance->error);
            echo $query . '<br>';

            if ($query == 1)
            {
                echo 'SQL query was successful';
            }
            else
            {
                echo 'SQL query was unsuccessful';
            }
        }
    }
?>