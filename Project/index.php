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
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $course = $_POST['course'];
    $education = $_POST['education'];
    $job = $_POST['job'];
    $skill = $_POST['skill'];
    $profile = $_POST['profile'];

    // SQL injection vulnerability: Use prepared statements instead
    $sql  = "INSERT INTO `studentform` (`name`, `email`, `address`, `dob`, `course`, `education`, `job`, `skill`, `profile`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sssssssss', $name, $email, $address, $dob, $course, $education, $job, $skill, $profile);
        mysqli_stmt_execute($stmt);
        echo '<script type="text/javascript"> alert("Data Saved")</script>';
        mysqli_stmt_close($stmt);
    } else {
        echo '<script type="text/javascript"> alert("Data not Saved")</script>'; 
    }

    mysqli_close($con);
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
       Student Form
    </div>
    <form action="index.php" method="POST">
       <div class="form-row">
          <div class="input-data">
             <input type="text" name="name" id="name" required>
             <div class="underline"></div>
             <label for="">Student Name</label>
          </div>
          <div class="input-data">
             <input name="mobile" id="mobile" required>
             <div class="underline"></div>
             <label for="">Moblie No</label>
          </div>
       </div>
       <div class="form-row">
          <div class="input-data">
             <input type="email" name="email" id="email" required>
             <div class="underline"></div>
             <label for="">Email Id</label>
          </div>
          <div class="input-data">
             <input type="text" name="address" id="address" required>
             <div class="underline"></div>
             <label for="">Address</label>
          </div>
       </div>

       <div class="form-row">
        <div class="input-data">
            <input type="date"name="dob" id="dob" >
           <div class="underline"></div>
           <label for="">DOB</label>
        </div>
        

    
        <div class="input-data">
           <input type="text" name="course" id="course" required>
           <div class="underline"></div>
           <label for="">Course Done</label>
        </div>
     </div>

       <div class="form-row">
       <div class="input-data textarea">
          <textarea rows="8" cols="80" name="education" id="education" required></textarea>
          <br />
          <div class="underline"></div>
          <label for="">Education</label>
          <br />
          </div>
          </div>

          <div class="form-row">
            <div class="input-data textarea">
               <textarea rows="8" cols="80" name="job" id="job" required></textarea>
               <br />
               <div class="underline"></div>
               <label for="">Internship & Job Done</label>
               <br />
               </div>
               </div>

               <div class="form-row">
                <div class="input-data textarea">
                   <textarea rows="8" cols="80" name="skill" id="skill" required></textarea>
                   <br />
                   <div class="underline"></div>
                   <label for="">Skills</label>
                   <br />
                   </div>
                   </div>

                   <div class="form-row">
                    <div class="input-data textarea">
                       <textarea rows="8" cols="80" name="profile" id="profile" required></textarea>
                       <br />
                       <div class="underline"></div>
                       <label for="">Linkdin Profile</label>
                       <br />
                       </div>
                       </div>

                       
          <div class="form-row submit-btn">
            <div class="input-data">
               <div class="inner"></div>
               <input type="submit" value="Register" name="submit" id="submit" >
            </div>
            </div>
    </form>
    
    </div>
</body>
</html>
<!--
   INSERT INTO `studentform` (`sno`, `name`, `mobile`, `email`, `address`, `dob`, `course`, `education`, `internship & job`, `skill`, `profile`) VALUES ('1', 'hello world', '2394943223', 'fflsloo2@fk', 'sahfsifoiuorepopjjdl', '2014-03-11', 'java', 'BE in IT ', 'none', 'kjhdkheak', 'vlsfjjflf');
-->