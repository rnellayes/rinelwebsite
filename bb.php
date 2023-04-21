<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Record</title>
    <link rel="stylesheet"type="text/css" href="style.css">
</head>
<body style= "background: white";>
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

      <!DOCTYPE html>
     <html>
          <head>
    <title>Add Name</title>
      </head>
           <body>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <marquee width="100%" direction="right" height="20px">
Be part of Southern Mindanao Institute of Technology Inc.
</marquee>
  <div class="imgcontainer">
    <img src=""  class="Avatar">
  </div>

  <div class="container">
    <label for="firstName"><b>FIRSTNAME</b></label>

    <input type="text" placeholder="Firstname" name="firstName" required>

    <label for="lastname"><b>LASTNAME</b></label>
    <input type="text" placeholder="Lastname" name="lastName" required>

    <button type="submit">Submit</button>
    
  </div>
    </form>
</body>
</html>

</body>
<style>
    form {
  border: 3px solid #f1f1f1;

                margin: 0;
                padding: 0;
                background: url(wow.jpeg);
                background-size: cover;
                background-position: center;
                font-family: Georgia;

    }
/* Full-width inputs */
input[type=text], input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 40%;
  justify-content: center;
  
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the avatar image inside this container */
.imgcontainer {
  text-align: center;
  margin: 15px 0 5px 0;
 
  
}

/* Avatar image */
img.avatar {
    width: 15%;
  border-radius: 50%;
  padding-bottom: 30%;
  
}

/* Add padding to containers */
.container {
  padding: 16px;
  width: 40%;
  height: 60vh;
}
.container b{
    color: blue;
}
marquee{
  color: blue;
  font-size: 18px;
}
</style>
</html>