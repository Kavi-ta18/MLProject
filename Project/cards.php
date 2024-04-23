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

// Fetch data from the database
$sql = "SELECT * FROM job_internship_description";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listed Opportunities</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card {
            width: 80%;
            max-width: 600px; /* Adjust maximum width as needed */
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card p {
            margin: 5px 0;
        }

        .apply-button {
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
        <?php
        // Display data in scrollable cards
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="card">
                    <p><strong>Company Name:</strong> <?php echo $row['company_name']; ?></p>
                    <p><strong>Role:</strong> <?php echo $row['role']; ?></p>
                    <p><strong>Location:</strong> <?php echo $row['location']; ?></p>
                    <p><strong>Stipend Amount:</strong> <?php echo $row['stipend_amount']; ?></p>
                    <p><strong>Starting Date:</strong> <?php echo $row['starting_date']; ?></p>
                    <p><strong>Tenure:</strong> <?php echo $row['tenure']; ?></p>
                    <p><strong>Application Date:</strong> <?php echo $row['application_date']; ?></p>
                    <p><strong>Total Openings:</strong> <?php echo $row['total_openings']; ?></p>
                    <p><strong>About Company:</strong> <?php echo $row['about_company']; ?></p>
                    <p><strong>About Role:</strong> <?php echo $row['about_role']; ?></p>
                    <p><strong>Skills Required:</strong> <?php echo $row['skills_required']; ?></p>
                    <p><strong>Eligibility Criteria:</strong> <?php echo $row['eligibility_criteria']; ?></p>
                    <button class="apply-button">Apply</button>
                </div>
                <?php
            }
        } else {
            echo "No data found.";
        }
        ?>
    </div>
</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>
