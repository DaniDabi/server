<?php
ini_set('soap.wsdl_cache_enabled', 0);
ini_set('display_errors', 1);

class MySoapServer {
  public function displayString($message) {
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

    // Escape special characters to prevent SQL injection
    $message = mysqli_real_escape_string($conn, $message);

    // Run a SQL query to insert the message into the database
    $sql = "INSERT INTO message (message) VALUES ('$message')";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        $response = "Message stored to the database: " . $message;
    } else {
        $response = "Error: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);

    return $response;
  }
}

$options = array(
  'uri' => 'http://example.com/soap',
  'location' => 'http://localhost:8080/Test/server.php'
);

$server = new SoapServer(null, $options);
$server->setClass('MySoapServer');
$server->handle();

?>
