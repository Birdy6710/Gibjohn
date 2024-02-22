<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Carmax - Your Website Title</title>
    <link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body>

    <header>
        <div class="logo-container">
            <p><strong><img src="../images/carmaxlogo (2).png" alt="Carmax Logo" width="400" height="100"></strong></p>
            
        </div>
    
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About us</a></li>
                <li><a href="cars.php">Cars</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="manufacturers.php">Manufacturers</a></li>
                <li><a href="Admin.php">Admin</a></li>
                <li><a href="support.php">Support</a></li>



                <script>
  let currentIndex = 0;

  function showSlide(index) {
    const slides = document.querySelectorAll('#slider-container img');
    const totalSlides = slides.length;

    if (index < 0) {
      currentIndex = totalSlides - 1;
    } else if (index >= totalSlides) {
      currentIndex = 0;
    } else {
      currentIndex = index;
    }

    slides.forEach((slide, i) => {
      if (i === currentIndex) {
        slide.style.display = 'block';
      } else {
        slide.style.display = 'none';
      }
    });
  }

  // Auto advance to the next slide every 3 seconds (adjust as needed)
  setInterval(function () {
    showSlide(currentIndex + 1);
  }, 3000);
</script>
<br>
<br>
</body>
<?php
    // Change these credentials according to your MySQL setup
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "login_system";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Use prepared statements to prevent SQL injection
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            echo "Login successful!";
            header("Location: http://localhost/website/code/pages/Login.php");
        } else {
            echo "Login failed. Check your username and password.";
        }

        // Close the statement
        $stmt->close();
    }

    // Close the connection
    $conn->close();
    ?>


       
        <form action="index.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required><br>
            <input type="submit" value="Login">
        </form>
            </ul>
        </nav>
    </header>
    <main>
<p>Well Done
<br>
You have successfully logged in..</p>
<body>


</body>
</html>