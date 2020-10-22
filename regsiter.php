<?php
    $con = mysqli_connect("localhost","parmeet","parmeet123","pass_key");
    if ($con)
    {
            $name = $_row['name'];
            $email = $_POST['mail'];
            $pass = md5($_POST['pass']);
            $res = "INSERT INTO user(name, email, pass) VALUES ('$name','$email','$pass')";
            mysqli_query($con, $res);
            $res1 = "SELECT * FROM user WHERE email = '$email'";
            $result = $con->query($res1);
            if (mysqli_num_rows($result) > 0) 
            {
                while ($row = mysqli_fetch_array($result)) 
                {
                    $id = $row["id"];
                    $pass = $row["pass"];
                    $username = $name;
                    $password = $pass;
                }
                $messgae = 'account created';
            }
            $requestData = array(
                'username' => $username,
                'password' => $password
            );
            $responseData = array(
                'status' => $messgae
            );
            header('Content-Type: application/json');
            echo json_encode($requestData);
            echo json_encode($responseData);
    }
?>
