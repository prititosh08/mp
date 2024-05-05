<!DOCTYPE html>
<html>
<head>
    <title>Edit Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

       .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;

        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            border-right: 2px solid #000;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        a.edit-link {
            color: #f2f2f2;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
        }

        a.id-link {
            color: #f2f2f2;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
        }

        .edit-link,
        .id-link {
            display: inline-block;
            padding: 10px 10px;
            background-color: rgb(201, 120, 120);
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 5px;
            text-decoration: none;
        }

        .edit-link:hover,
        .id-link:hover {
            background-color: rgb(73, 51, 51);
        }
    </style>
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
    <a href="index1.php" class="edit-link">Edit The Information</a>
    <br><br><br>
    <a href="index4.php" class="id-link">Click on to get the ID</a>
</div>

</body>
</html>