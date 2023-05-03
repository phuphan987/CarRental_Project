<?php
session_start();
$con=mysqli_connect("localhost","root","","CarRental_DB");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/b33e8d6cbf.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="bg-dark mb-4">
        <div class="navbar container-md bg-dark">
            <div class="nav-logo">
                <a href="#"> Car Rental</a>
            </div>
            <hl class="nav-menu" id="myMenu">
                <li> <a href="#"> Home</a> </li>
                <li> <a href="#"> About</a> </li>
                <li> <a href="#"> Contact</a> </li>
                <li id="menu-login"> <a href="#"> Log In</a> </li>
                <li id="menu-signup"> <a href="#"> Sign up</a> </li>
            </hl>
            <div class="nav-login" id="mylogin">
                <button class="login-button">Log In</button>
                <button class="signup-button">Sign up</button>
            </div>
            <div class="ham-menu" onclick="toggleHam(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        </div>
    </nav>

    <div class="container-md d-flex justify-content-center align-items-center">
        <div class="regis-table p-4 border rounded border-dark bg-white">
            <form class="d-flex justify-content-center" name="inpfrm" method="post" action="Register.php">
                <table>
                    <tr class="d-flex justify-content-center">
                        <td>
                            <h2 class="title text-uppercase fs-4">Create Account</h2>
                        </td>
                    </tr>
                    <tr class="regis-info">
                        <td><span class="ms-4 me-3"><i class="fa-solid fa-envelope"></i></span></td>
                        <td><input class="regis-input fs-6" name="email" type="text" id="email" size="52" value=""
                                maxlength="30" placeholder="Email"></td>
                    </tr>
                    <tr class="regis-info">
                        <td><span class="ms-4 me-3"><i class="fa-solid fa-lock"></i></span></td>
                        <td><input class="regis-input fs-6" name="password" type="password" id="password" size="52"
                                value="" maxlength="30" placeholder="Password"></td>
                    </tr>
                    <tr class="regis-info">
                        <td><span class="ms-4 me-3"><i class="fa-solid fa-lock"></i></span></td>
                        <td><input class="regis-input fs-6" name="repassword" type="password" id="repassword" size="52"
                                value="" maxlength="30" placeholder="Confirm Password"></td>
                    </tr>
                    <tr class="regis-info">
                        <td><span class="ms-4 me-3"><i class="fa-solid fa-user"></i></span></td>
                        <td><input class="regis-input regis-name me-1" name="FirstName" type="text" id="FirstName" size="22"
                                value="" maxlength="30" placeholder="First Name"></td>
                        <td><input class="regis-input regis-name" name="LastName" type="text" id="LastName" size="22" value=""
                                maxlength="30" placeholder="Last Name"></td>
                    </tr>
                    <tr class="regis-info">
                        <td><span class="ms-4 me-3"><i class="fa-solid fa-phone"></i></span></td>
                        <td class="number"><input class="regis-input" name="phone" type="text" id="phone" size="52"
                                value="" maxlength="10" placeholder="Phone Number">
                        </td>
                    </tr>
                    <tr class="regis-info gender ms-2 p-3 ps-3">
                        <td><label class="text-muted me-5">Gender: &nbsp;</label></td>
                        <td>
                            <input type="radio" name="gender" value="male" checked> Male
                            <span class="me-3"></span>
                            <input type="radio" name="gender" value="female" checked> Female
                        </td>
                    </tr>
                    <tr class="regis-info dob ms-2 p-3 ps-3">
                        <td><label class="text-muted me-3">Date of birth: &nbsp;</label></td>
                        <td><input name="date" type="date" id="date"></td>
                    </tr>
                    <tr class="regis-info interestedcar ms-2 p-3 ps-3">
                        <td><label class="text-muted" style="width: 120px;">Interested Car: &nbsp;</label></td>
                        <td>
                            <input type="checkbox" name="interestedcar[Sedan]" value="Sedan"> Sedan
                            <span class="me-4"></span>
                            <input type="checkbox" name="interestedcar[Van]" value="Van"> Van
                            <span class="me-4"></span>
                            <input type="checkbox" name="interestedcar[PPV]" value="PPV"> PPV
                            <span class="me-4"></span>
                            <input type="checkbox" name="interestedcar[SUV]" value="SUV"> SUV
                            <span class="me-5"></span><span class="me-5"></span><span class="me-5"></span>
                            <span class="me-4"></span>
                            <input type="checkbox" name="interestedcar[Pickup]" value="Pickup"> Pickup
                            <span class="me-4"></span>
                            <input type="checkbox" name="interestedcar[MPV]" value="MPV"> MPV
                            <span class="me-4"></span>
                            <input type="checkbox" name="interestedcar[Hatchback]" value="Hatchback"> Hatchback
                        </td>
                    </tr>
                    <tr class="regis-submit mt-4">
                        <td><input class="regis-submit-btn text-uppercase text-white fs-6" name="INSERT" type="submit"
                                id="INSERT" value="Register" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <script src="../js/bootstrap.min.js"></script>

</body>

</html>