<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $host = "127.0.0.1";
    $user = "root";
    $password = "";
    $db = "bambabygg_database_entry_website";

    if (isset($firstAndLastname) || isset($phone) || isset($email) || isset($question) || isset($message)) {

        $firstAndLastname = $_POST['firstAndLastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $question = $_POST['question'];
        $message = $_POST['message'];
    }
    $conn = new mysqli($host, $user, $password, $db);

    if ($conn === false) {
        die("Connection Failed: " . $conn->connect_errore);
    } else {
        $stmt = $conn->prepare("INSERT INTO resgisterandquestion(firstAndLastname, phone, email, question, message) VALUES(?, ?, ?, ?, ?)");
        $stmt->bind_param("sisss", $firstAndLastname, $phone, $email, $question, $message);


        $stmt->execute();
        //  echo "Message Send";
        $stmt->close();
        $conn->close();
    }


    ?>

    <body style="font-family:Arial;">
        <form action="connect.php" method="post">
            <label for="name"></label> <br>
            <input type="text" placeholder="First and Last Name" name="firstAndLastname" style="background: #FFD9D9;
                            border: none;
                            border-radius: 5px;
                            font-size: 16px;
                            width: 300px;
                             height:25px;"> <br>
            <label for="ncall"></label> <br>
            <input type="text" placeholder="Phone" name="phone" style="background: #FFD9D9;
                 border: none;
                 border-radius: 5px;
                 font-size: 16px; 
                 width: 300px;
                   height:25px;"> <br>
            <label for="email"></label> <br>
            <input type="text" placeholder="Email" name="email" style="background: #FFD9D9;
                   border: none;
                   border-radius: 5px;
                   font-size: 16px;
                   width: 470px;
                   height:25px;"> <br>
            <label for="question"></label> <br>
            <input type="text" placeholder="Your Question" name="question" style="background: #FFD9D9;
                                    border: none;
                                    border-radius: 5px;
                                    font-size: 16px;
                                    width: 470px;
                                    height:25px;"> <br>
            <label for="message"></label> <br>
            <textarea name="" id="" cols="50" rows="10" placeholder=" Welcome to Bamba Bygg Renovering" name="message" style="background: #FFD9D9;
                           border: none;
                           border-radius: 5px;
                           font-size: 16px;"></textarea> <br>
            <button type="submit" style="width: 200px;
                                     max-width: 200px;
                                     height: 50px;
                                     font-weight: 700;
                                     font-size: 20px;
                                     background: white;
                                     border: rgba(48, 48, 48, 0.5) solid 1px;
                                     border-radius: 5px;
                                     box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.25);
                                     color: #303030;
                                     font-family: Montserrat, " sans-serif";">Submit</button>
        </form>
    </body>
</body>

</html>