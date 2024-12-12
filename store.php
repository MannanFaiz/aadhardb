<?php
// Database connection
$servername = "localhost"; // Use "127.0.0.1" if localhost doesn't work
$username = "root";        // Replace with your MySQL username
$password = "";            // Replace with your MySQL password
$database = "aadhar_registration"; // Name of the database

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize input data
    $name = $conn->real_escape_string($_POST['name']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $gmail = $conn->real_escape_string($_POST['gmail']);
    $address = $conn->real_escape_string($_POST['address']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $religion = $conn->real_escape_string($_POST['religion']);
    $gender = $conn->real_escape_string($_POST['gender']);

    // Insert data into the database
    $sql = "INSERT INTO registrations (name, dob, gmail, address, phone, religion, gender) 
            VALUES ('$name', '$dob', '$gmail', '$address', '$phone', '$religion', '$gender')";

    if ($conn->query($sql) === TRUE) {
        // Display success message
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Registration Successful</title>
            <link rel='stylesheet' href='style.css'>
        </head>
        <body>
            <header>
                <h1>Registration Successful</h1>
            </header>
            <main>
                <h2>Your Details</h2>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Date of Birth:</strong> $dob</p>
                <p><strong>Gmail:</strong> $gmail</p>
                <p><strong>Address:</strong> $address</p>
                <p><strong>Phone Number:</strong> $phone</p>
                <p><strong>Religion:</strong> $religion</p>
                <p><strong>Gender:</strong> $gender</p>
            </main>
            <footer>
                <p>© 2024 Aadhar Registration</p>
            </footer>
        </body>
        </html>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
