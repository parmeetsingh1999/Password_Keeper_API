<?php
    $con = mysqli_connect("localhost","parmeet","parmeet123","pass_key");
    if($con)
    { 
            $email = $_POST['mail'];
            $pass = md5($_POST['pass']);
            $res = "SELECT * FROM user WHERE email = '$email'";
            $result = $con->query($res);
            if (mysqli_num_rows($result) > 0) 
            {
                while ($row = mysqli_fetch_array($result))
                {
                    $id = $row["id"];
                    $user_name = $row["name"];
                    $pass = $row["pass"];
                    $user_id = $id;
                    $password = $pass;
                }
                $messgae = 'success';
            }
            $requestData = array(
                'username' => $user_name,
                'password' => $password
            );
            $responseData = array(
                'status' => $messgae,
                'user_id' => $user_id
            );
            header('Content-Type: application/json');
            echo json_encode($requestData);
            echo json_encode($responseData);
    }
?>
