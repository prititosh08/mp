<?php
$insert = false;
if(isset($_POST['PRN'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);
    if(!$con){
        die("Connection to this database failed due to ".
        mysqli_connect_error());
    }
    // echo "Sucess connecting to DataBase";
    
    $PRN = $_POST['PRN'];
    $Date = $_POST['Date'];
    
    $sql = "INSERT INTO `college_id_card`.`login` (`PRN`,`Date`)
    VALUES ('$PRN','$Date');" ;
    // echo $sql;

    if($con->query($sql) == true){
        //  echo "Sucessfully inserted";
        $insert = true;
    }
    else{
        echo "ERROR : $sql <br> $con->error";
    }
    header("location: index1.php");
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateForm() {
            var PRN = document.getElementById("PRN").value;
            var dob = document.getElementById("Date").value;

            if (PRN == "" || dob == "") {
                alert("PRN and Date Of Birth are required.");
                return false;
            }

            else{
                window.location.href = "index1.php";
            }

            return false;
        }
    </script>
</head>
<body>
    <form action="index.php" method="post" onsubmit="return validateForm()">
    <p style="text-align: center;">Enter your information</p>
    <br><br>
    <!-- <?php
        if($insert == true){
            echo "<p class='submitMsg'> Thanks for submitting your information </p>";
        }
    ?> -->
        <input type="text" style="text-align: center;" id="PRN" name="PRN" placeholder = "Enter PRN" required><br><br>
        <input type="date" style="text-align: center;" id="Date" name="Date" required><br>
        <input type="submit" value="Submit" onclick="validateForm()" class="link-button">
        <!-- <a href="index1.php">Submit</a> -->
    </form>
</body>
</html>