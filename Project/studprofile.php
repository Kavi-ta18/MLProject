<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "studentinfo";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the studentform table for the logged-in student (you can adjust this query accordingly)
$sql = "SELECT * FROM studentform"; // Assuming id 1 belongs to the logged-in student
$result = mysqli_query($conn, $sql);

// Check if data exists
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "No data found.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .profile-info {
            margin-bottom: 20px;
        }

        .profile-info p {
            margin: 5px 0;
        }

        .update-button, .apply-button {
            background-color: #1f3569;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Student Profile</h2>
        <div class="profile-info">
            <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
            <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $row['dob']; ?></p>
            <p><strong>Course:</strong> <?php echo $row['course']; ?></p>
            <p><strong>Education:</strong> <?php echo $row['education']; ?></p>
            <p><strong>Job:</strong> <?php echo $row['job']; ?></p>
            <p><strong>Skill:</strong> <?php echo $row['skill']; ?></p>
            <p><strong>Profile:</strong> <?php echo $row['profile']; ?></p>
        </div>
        <button class="update-button">Update</button>
        <a href="cards.php" class="apply-button">Apply to Internships</a>
    </div>
</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>
