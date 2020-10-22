<?php
    $con = mysqli_connect("localhost","root","empire123","notes");
    if ($con)
    {
            $website = $_POST['website'];
            $username = $_POST['username'];
            $password = md5($_POST['pass']);
            $user_id = $_GET['user_id'];
            $res = "INSERT INTO list(username, user_id, website,pass) VALUES ('$username','$user_id','$website','$password')";
            mysqli_query($con, $res);


            $res1 = "SELECT * FROM notes WHERE user_id = '$user_id'";
            $result = $con->query($res1);
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {
                    $name = $row['username'];
                    $website = $row['website'];
                    $pass = $row["pass"];

                    $user_name = $name;
                    $web = $website;
                    $password_a = $pass;

                }

                $messgae = 'success';
            }
            $requestData = array(
                'username' => $user_name,
                'website' => $web,
                'password' => $password_a
            );
            $responseData = array(
                'status_message' => $messgae
            );
            header('Content-Type: application/json');
            echo json_encode($requestData);
            echo json_encode($responseData);
        
            
    }
?>
