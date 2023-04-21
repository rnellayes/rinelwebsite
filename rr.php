<?php
          // Connect to database
          $host = "localhost";
              $user = "root";
         $password = "";
           $dbname = "semi";
      $conn = mysqli_connect($host, $user, $password, $dbname);
 
         // Check connection
         if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
         }      

    // Check if form submitted
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];

    // Check if name already exists in database
    $sql = "SELECT * FROM finals WHERE firstName='$firstName' AND lastName='$lastName'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo " Name already exists!!";
    } else {
        // Add name to database
        $sql = "INSERT INTO finals (firstName, lastName) VALUES ('$firstName', '$lastName')";
        if (mysqli_query($conn, $sql)) {
            echo "Record has been saved.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    // Close database connection
    mysqli_close($conn);
 }
      ?>