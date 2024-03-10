<?php
session_start();
include 'database.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $last_name = $_POST["last_name"];
    $first_name = $_POST["first_name"];
    $middle_name = $_POST["middle_name"];
    $email = $_POST["email"];
    $lot_number = $_POST["lot_number"];
    $block_number = $_POST["block_number"];
    $street = $_POST["street"];
    $subdivision = $_POST["subdivision"];
    $province = $_POST["province"];
    $city_municipality = $_POST["city_municipality"];
    $barangay = $_POST["barangay"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password for security

    // SQL query to insert user data into the database
    $sql = "INSERT INTO user_tbl (last_name, first_name, middle_name, email, lot_number, block_number, street, subdivision, province, city_municipality, barangay, country, phone, password) 
            VALUES ('$last_name', '$first_name', '$middle_name', '$email', '$lot_number', '$block_number', '$street', '$subdivision', '$province', '$city_municipality', '$barangay', '$country', '$phone', '$password')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo '<div style="text-align: center; background-color: #d4edda; color: #155724; font-size: 20px; padding: 10px; margin: 0 auto; max-width: 500px;">Registration Successful!</div>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup page</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link href="./build/css/demo.css" rel="stylesheet">
    <link href="./build/css/intlTelInput.css" rel="stylesheet">
    <link href="registration.css" rel="stylesheet">
</head>
<body>
<div class="background">

<h1 class="card-title mt-2">Sign up</h1>

    <div class="container">
    <br><br>
    <div class="row justify-content-center">
    <div class="col-md-6">
    <div class="card">
    <article class="card-body">
    <form action="registration.php" method="post">
        <div class="col form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" name="last_name" required>
        </div>
        <div class="col form-group">
            <label>First Name</label>
            <input type="text" class="form-control" name="first_name" required>
        </div>
        <div class="col form-group">
            <label>Middle Name</label>
            <input type="text" class="form-control" name="middle_name" required>
        </div>
        <div class="form-row">
            <div class="col form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col form-group">
                <label>Lot Number</label>
                <input type="text" class="form-control" name="lot_number" required>
            </div>
            <div class="col form-group">
                <label>Block Number</label>
                <input type="text" class="form-control" name="block_number" required>
            </div>
            <div class="col form-group">
                <label>Street</label>
                <input type="text" class="form-control" name="street" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col form-group">
                <label>Subdivision</label>
                <input type="text" class="form-control" name="subdivision" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col form-group">
                <label>Province</label>
                <select id="provinces" name="province" class="form-control" required>
                    <option value="" disabled selected>Select Province</option>
                </select>
            </div>
            <div class="col form-group">
                <label>City/Municipality</label>
                <select id="cities" name="city_municipality" class="form-control" required>
                    <option value="" disabled selected>Select City/Municipality</option>
                </select>
            </div>
            <div class="col form-group">
                <label>Barangay</label>
                <select id="barangay" name="barangay" class="form-control" required>
                    <option value="" disabled selected>Select Barangay</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Country</label>
            <select id="countries" name="country" class="form-control" name="countries" required>
                <option value="" disabled selected>Select Country</option>
            </select>
        </div>
        <div class="form-group">
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required maxlength="20">
        </div>
        <div class="form-row">
            <div class="col form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="col form-group">
                <label>Repeat Password</label>
                <input type="password" class="form-control" name="repeat_password" required>
            </div>
        </div>
        <div class="form-btn">
            <input type="submit" class="btn btn-primary btn-block custom-btn" value="Register" name="submit">
            <br>
        </div> <!-- form-group// -->   
        <div class="form-btn" style="text-align: center;">
    Have an account? <a href="login.php"> <span class="login-link">Login here</span></a>
</div>

    </form>
    </article> <!-- card-body end .// -->
    </div> <!-- card.// -->
    </div> <!-- col.//-->
    </div> <!-- row.//-->
    </div> 
    <!--container end.//-->
    <br><br>
    <script src="./build/js/intlTelInput.js"></script>
    <script src="country.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="prvnc_city_brgy.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var input = document.querySelector("#phone");
            var iti = window.intlTelInput(input, {
                utilsScript: "./build/js/utils.js", 
                separateDialCode: true,         
            });

            // Event listener for handling changes in the input
            input.addEventListener("change", function() {
                // Check if the input value already contains the dial code
                if (!input.value.startsWith('+')) {
                    var selectedCountryData = iti.getSelectedCountryData();
                    var countryCode = selectedCountryData.dialCode;

                    // Remove leading zeros
                    input.value = input.value.replace(/^0+/, '');

                    // Add the dial code only if it's not already present
                    input.value = '+' + countryCode + input.value;
                }
            });
        });
    </script>
</body>
</html>
