<?php
if(isset($_POST['submit'])){
    // Check if all required fields are set
    if(isset($_POST['company_name'], $_POST['role'], $_POST['location'], $_POST['stipend_amount'], $_POST['starting_date'], $_POST['tenure'], $_POST['application_date'], $_POST['total_openings'], $_POST['about_company'], $_POST['about_role'], $_POST['skills_required'], $_POST['eligibility_criteria'])) {
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "studentinfo";

        $con = mysqli_connect($server, $username, $password, $database);

        if(!$con){
            die("Connection to the database failed: " . mysqli_connect_error());
        }

        $company_name = $_POST['company_name'];
        $role = $_POST['role'];
        $location = $_POST['location'];
        $stipend_amount = $_POST['stipend_amount'];
        $starting_date = $_POST['starting_date'];
        $tenure = $_POST['tenure'];
        $application_date = $_POST['application_date'];
        $total_openings = $_POST['total_openings'];
        $about_company = $_POST['about_company'];
        $about_role = $_POST['about_role'];
        $skills_required = $_POST['skills_required'];
        $eligibility_criteria = $_POST['eligibility_criteria'];

        // Prepare and execute the SQL statement using prepared statements
        $sql = "INSERT INTO `job_internship_description` (`company_name`, `role`, `location`, `stipend_amount`, `starting_date`, `tenure`, `application_date`, `total_openings`, `about_company`, `about_role`, `skills_required`, `eligibility_criteria`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($con, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt,"ssssssssssss", $company_name, $role, $location, $stipend_amount, $starting_date, $tenure, $application_date, $total_openings, $about_company, $about_role, $skills_required, $eligibility_criteria);
            mysqli_stmt_execute($stmt);
            echo '<script type="text/javascript"> alert("Data Saved")</script>';
            mysqli_stmt_close($stmt);
        } else {
            echo '<script type="text/javascript"> alert("Data not Saved")</script>'; 
        }

        mysqli_close($con);
    } else {
        echo "One or more required fields are missing.";
    }
}
?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet"  type="text/css" href="compform.css"></link>
    </head>
    <body>
    <div class="container">
    <div class="text">
       Job / Internship Description Form
    </div>
    <form action="compform.php" method="POST">
       <div class="form-row">
          <div class="input-data">
             <input type="text" name="company_name" required>
             <div class="underline"></div>
             <label for="" >Company Name</label>
          </div>
          <div class="input-data">
             <input type="text" name="role" required>
             <div class="underline"></div>
             <label for="" >Role</label>
          </div>
       </div>
       <div class="form-row">
          <div class="input-data">
             <input type="text" name="location" required>
             <div class="underline"></div>
             <label for="" >Location</label>
          </div>
          <div class="input-data">
             <input type="text" name="stipend_amount" required>
             <div class="underline"></div>
             <label for="" >Stipend Amount</label>
          </div>
       </div>

       <div class="form-row">
        <div class="input-data">
            <input type="date" name="starting_date">
           <div class="underline"></div>
           <label for="" >Starting Date</label>
        </div>
        <div class="input-data">
           <input type="text" name="tenure" required>
           <div class="underline"></div>
           <label for="" >Tenure</label>
        </div>
     </div>

     <div class="form-row">
        <div class="input-data">
            <input type="date" name="application_date">
           <div class="underline"></div>
           <label for="" >Application Date</label>
        </div>
        <div class="input-data">
           <input type="text" name="total_openings" required>
           <div class="underline"></div>
           <label for="" >Total Number of Openings</label>
        </div>
     </div>

       <div class="form-row">
       <div class="input-data textarea">
          <textarea rows="8" cols="80" name="about_company" required></textarea>
          <br />
          <div class="underline"></div>
          <label for="" >About Company</label>
          <br />
          </div>
          </div>

          <div class="form-row">
            <div class="input-data textarea">
               <textarea rows="8" cols="80" name="about_role" required></textarea>
               <br />
               <div class="underline"></div>
               <label for="" >About Role</label>
               <br />
               </div>
               </div>

               <div class="form-row">
                <div class="input-data textarea">
                   <textarea rows="8" cols="80" name="skills_required" required></textarea>
                   <br />
                   <div class="underline"></div>
                   <label for="" >Skills Required</label>
                   <br />
                   </div>
                   </div>

                   <div class="form-row">
                    <div class="input-data textarea">
                       <textarea rows="8" cols="80" name="eligibility_criteria" required></textarea>
                       <br />
                       <div class="underline"></div>
                       <label for="" >Eligibility Criteria</label>
                       <br />
                       </div>
                       </div>

                       
          <div class="form-row submit-btn">
            <div class="input-data">
               <div class="inner"></div>
               <input type="submit" value="submit" name="submit">
            </div>
            </div>
    </form>
    </div>
</body>
</html>
