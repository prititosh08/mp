<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);
    if(!$con){
        die("Connection to this database failed due to ".
        mysqli_connect_error());
    }
    // echo "Sucess connecting to DataBase";
    $name = $_POST['PRN'];
    $Date = $_POST['Date'];
    
    $sql = "INSERT INTO `college_id_card`.`login` (`PRN`, `Date`)
    VALUES ('$PRN', '$Date');" ;
    // echo $sql;

    if($con->query($sql) == true){
        //  echo "Sucessfully inserted";
        $insert = true;
    }
    else{
        echo "ERROR : $sql <br> $con->error";
    }
    $con->close();
}
?>

<!-- INSERT INTO `login` (`PRN`, `Date`) VALUES ('21UCS138', '2004-02-08'); -->


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page for student ID</title>
    <link rel="stylesheet" href="style_home.css">

    <script>
        // function redirectToNextPage() {
        //     location.href = "page.html";
        // }

        function validateForm() {
            var First_Name = document.getElementById("First Name").value;
            var PRN = document.getElementById("PRN").value;

            if (First_Name == "" || PRN == "") {
                alert("Name and PRN are required.");
                return false;
            }

            else{
                window.location.href = "index.php";
            }

            return false;
        }
    </script>
</head>
<body>
    <div class="header">
        <div class="logoutclass">
            <a href="login.html" class="logout">Logout</a>
        </div>

        <div>
            <a href="settings.html" class="logout">Settings</a>
        </div>

    </div>
    
    <div>
        <form action="index.php" method="post" onsubmit="return validateForm()">

            <div class="container">
                <p>Enter your information</p>
                <?php
                    if($insert == true){
                    echo "<p class = 'submitMsg'> Thanks for submitting your information </p>";
                    }
                ?>
                <p>Enter your PRN</p>
                <input type="text" id="PRN" name="PRN">
                <p>Enter your Date of Birth</p>
                <input type="date" name="Date" id="Date">
                <input type="submit" value="Submit" onclick="validateForm()">
            </div>
        </form>
    </div>
</body>
</html>