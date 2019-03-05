<!DOCTYPE html>
<html>
<head>
    <title>CAHSI | Faculty</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="css/main.css" />


    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">

</head>
<body>
<!-- Header -->
<header id="header">
    <div class="inner"> <a href="faculty.php" class="logo"><img src="img/logo.png" style = "float:center" width:"104px" height="104px"></a>
        <nav id="nav">
            <a href="faculty.php">Faculty</a>
            <a href="reviewer.php">Reviewer</a>
            <a href="mentor.php">Mentor</a> |
            <a href="logout.php">Log Out</a>
        </nav>
    </div>
</header>
<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>



<!-- Banner -->
<section id="banner">
    <div style="padding:60px;margin-top:-160px;background-color:#1A2154;height:10px;">
        <div class="inner">
            <h1>Faculty</span></h1>
        </div>
</section>
<p></p>

<div class ="container">
    <center><h1>Account Info</h1></center>
<center>
<?php
    include('fsession.php');
    
    $user_check = $_SESSION['email'];
    $query="SELECT * FROM FACULTY where Femail = '$user_check'";
    $result=mysqli_query($db, $query);
    if(!$result) {
        die('Could not query: '. mysqli_error());
    }
    echo "<b>Signed in As: </b>" .$user_check ."<br>"."<br>";
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_array($result)) {
            if($row["Fis_active"]==TRUE) {
                $active = "Yes";
            } else {
                $active = "No";
            }
            //CREATE VIEW facultyInfo AS SELECT FACULTY.Fid, FACULTY.Fis_active,FACULTY.Fgender, FACULTY.Ffirst_name, FACULTY.F_initial, FACULTY.Flast_name, FACULTY.Femail, INSTITUTION.Iname from INSTITUTION JOIN FACULTY USING(Iid);
            echo "<b>ID:</b> " . $row["Fid"].  "  |  <b>Active:</b> " . $active."  |  <b>Gender:</b> " . $row["Fgender"]."<br>".  "<b>First Name:</b> " . $row["Ffirst_name"]."  |  <b>Middle Name:</b> " . $row["F_initial"]."  |  <b>Last Name:</b> " . $row["Flast_name"]."  |  <b>Email:</b> " . $row["Femail"]. "<br>"."<br>";
        }
    } else {
        echo "0 results";
    }
?>
</center>
    <left>
        <img src="img/logo3.jpg" style = "float:center" width:"80px" height="80px">
    </left>
    <right>
        <img src="img/nsflogo.png" style = "float:center" width:"80px" height="80px" align="right">
    </right>

</div>
</div>

<!-- Footer -->
<section id="footer">
    <div class="inner">
        <center>
            <div class="copyright"> &copy; UTEP | ICT 2017</div>
        </center>
    </div>
</section>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>



</body>
</html>
