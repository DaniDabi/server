<?php
// Set the database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Run a SQL query
$sql = "SELECT * FROM message";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Loop through the result set and display the data
    while ($row = mysqli_fetch_assoc($result)) {
        echo "message: " . $row["message"] . "<br>";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
