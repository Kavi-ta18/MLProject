<?php
if(isset($_POST['submit'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "studentinfo";

    $con = mysqli_connect($server, $username, $password, $database);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    

    // SQL injection vulnerability: Use prepared statements instead
    $sql  = "INSERT INTO `Contact` (`name`, `email`, `subject`, `message`) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $subject, $message);
        mysqli_stmt_execute($stmt);
        echo '<script type="text/javascript"> alert("Contact Data is Saved")</script>';
        mysqli_stmt_close($stmt);
    } else {
        echo '<script type="text/javascript"> alert("Data not Saved")</script>'; 
    }

    mysqli_close($con);
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/index.css" />
    <script src="js/index.js"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    />
    <title>Internship & job provider</title>
  </head>
  <body>
    <header>
      <nav class="navbar">
        <div class="logo"><i class="bi bi-code-slash"></i> Intern</div>
        <input type="checkbox" name="check" id="check" />
        <label for="check" id="checkbtn"><i class="bi bi-list"></i></label>
        <ul class="menu-items">
          <li><a href="#hero">Home</a></li>
          <li><a href="http://localhost:8501/">Career prediction</a></li>
          <li><a href="index.php">Internship Apply</a></li>
          <li><a href="compform.php">Post job/internship</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>
    </header>
    <section id="hero">
      <div class="text">
        <h1>Find the most exciting startup jobs</h1>
        <p>
          "The future belongs to those who believe in the beauty of thier dreams."
        </p>
        <button onClick="redirect()">Find jobs</button>
      </div>
      <div class="img">
        <img src="./img/image2.jpg" alt="" />
      </div>
    </section>
    <section id="features">
      <div class="content">
        <p>Internship</p>
        <h2>"I'm starting to gain a good insight in to how the industry works already."</h2>
        <img src="./img/image3.jpg" alt="" />
      </div>
      <div class="cards">
        <div class="card">
          <i class="bi bi-check"></i>
          <h3>Personal Development</h3>
        </div>
        <div class="card">
          <i class="bi bi-check"></i>
          <h3>Experiences</h3>
        </div>
        <div class="card">
          <i class="bi bi-check"></i>
          <h3>Goals</h3>
        </div>
        <div class="card">
          <i class="bi bi-check"></i>
          <h3>Skills</h3>
        </div>
        <div class="card">
          <i class="bi bi-check"></i>
          <h3>Opportunity</h3>
        </div>
        <div class="card">
          <i class="bi bi-check"></i>
          <h3>Quality development</h3>
        </div>
      </div>
    </section>
    
    <section id="contact">
      <div class="content">
        <p>Contact</p>
        <h2>Contact Us</h2>
      </div>
      <form action="index2.php" method="POST" accept-charset="utf-8">
        <label for="name">Your Name</label>
        <input type="text" name="name" id="name" value="" />
        <label for="email">Your Email</label>
        <input type="email" name="email" id="email" value="" />
        <label for="subject">Subject</label>
        <input type="text" name="subject" id="subject" value="" />
        <label for="message">Message</label>
        <textarea name="message" id="message" rows="8" cols="40"></textarea>
        <button type="submit" name="submit">Send</button>
      </form>
    </section>
    <footer>
      <div class="footer-content">
        <h3><i class="bi bi-code-slash"></i> Intern</h3>
        <p>
          Providing internship Opporchunities changes the whole equation....
        </p>
        <ul class="socials">
          <li>
            <a href="#"><i class="bi bi-facebook"></i></a>
          </li>
          <li>
            <a href="#"><i class="bi bi-twitter"></i></a>
          </li>
          <li>
            <a href="#"><i class="bi bi-github"></i></a>
          </li>
          <li>
            <a href="#"><i class="bi bi-youtube"></i></a>
          </li>
          <li>
            <a href="#"><i class="bi bi-linkedin"></i></a>
          </li>
        </ul>
      </div>
    </footer>
  </body>
</html>
