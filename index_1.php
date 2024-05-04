<!DOCTYPE html>
<html>
<head>
    <title>Edit Information</title>
    <link rel="stylesheet" href="style_edit.css">
</head>
<body>

<div class="container">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>PRN</th>
                <th>Program</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Blood</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "college_id_card";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: ". $conn->connect_error);
            }
            $sql_fetch = "SELECT * FROM id ORDER BY Date DESC LIMIT 1";
            $result = $conn->query($sql_fetch);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<tr>";
                echo "<td>". $row["name"]. "</td>";
                echo "<td>". $row["Date"]. "</td>";
                echo "<td>". $row["PRN"]. "</td>";
                echo "<td>". $row["Program"]. "</td>";
                echo "<td>". $row["email"]. "</td>";
                echo "<td>". $row["phone"]. "</td>";
                echo "<td>". $row["Blood"]. "</td>";
                echo "</tr>";
            } else {
                echo "<tr><td colspan='7'>No results found.</td></tr>";
            }
            $conn->close();
          ?>
        </tbody>
    </table>
    <a href="index.php">Edit The Information</a>
</div>

</body>
</html>