<?php
      require_once 'session.php';
      require_once 'dbconnect.php';
      echo "database is connected";
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project repair</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="aboutme.html">About Us</a></li>
              <li><a href="service.html">Service</a></li>
              <li><a href="contact.html">contact</a></li>
              <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <div class="bg1">
            <img src="images/bg1.jpg" alt="bg1" style="width: 100%; height: 800px;">
        </div>
        <div class="loginbox">
            <img src="images/logo.jpg" class="avatar">
                <h1>Register Here</h1>
                <form method='post' >
                  <p>FULLNAME</p>
                  <input type="text" name="name" placeholder="Enter NAME(SAME IS USED AS USERNAME)">
                  <p>EMAIL</p>
                  <input type="email" name="email" placeholder="Enter EMAIL">
                  <p>PHONENUMBER</p>
                  <input type="text" name="phonenumber" placeholder="Enter PHONENUMBER ">
                  <p>PASSWORD</p>
                  <input type="password" name="password" placeholder="Enter PASSWORD">
                  <p> CONFIRM PASSWORD</p>
                  <input type="password" name="confirmpassword" placeholder="CONFIRM PASSWORD">
                  <p>Profession</p>

                      <select class="form-select"  name="profession">
                         <option value="1">Doctor</option>
                         <option value="2">Teacher</option>
                         <option value="3">Student</option>
                         <option value="4">Police</option>
                         <option value="5">Business</option>
                         <option value="6">others</option>
                         <!-- <option value="Police">Police</option> -->
                      </select>
<!--
Code for profession
1-Doctor
2-Teacher
3-Student
4-Police
5-Business
6-Others-->

                  <p>address_area</p>
                  <select class="custom" name="address_area">
                     <option value="1">MVP</option>
                     <option value="2">Bhemili</option>
                     <option value="3">Waltair</option>
                     <option value="4">Dwaraka Nagar</option>
                      <option value="5">Rushikonda</option>
                       <option value="6">NAD</option>
                  </select>
<!--
codes for areas
1-MVP
2-Bheemili
3-Waltair
4-Dwaraka Nagar
5-Rushikonda
6- Nad
 -->
                  <p>city</p>
                  <select class="custom" name="city">
                     <option value='1'>Vizag</option>
                     <option value='2'>Hyderabad</option>
                     <!-- <option value="waltair">Waltair</option>
                     <option value="dwaraka nagar">Dwaraka Nagar</option> -->
                  </select>
<!-- Codes for cities
1-Vizag
2-Hyderabad  -->

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                  <a href="login.php">Login</a>
                </form>

            </div>
    </section>
    <?php  if(isset($_POST['submit'])) {
      echo "button is clicked";

          $username = $_POST['name'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $phone=$_POST['phonenumber'];
          $confirmpassword=$_POST['confirmpassword'];
          $profession=$_POST['profession'];
          $address_area=$_POST['address_area'];
          $city=$_POST['city'];


          $hashed_password = password_hash($password, PASSWORD_DEFAULT);
          // if($password==$confirmpassword){
            try {
              $SQLInsert = "INSERT INTO users (username, password, email, phone,profession,address_area,city,to_date)
                           VALUES (:username, :password, :email, :phone,:profession,:address_area,:city,now())";

              $statement = $conn->prepare($SQLInsert);
              $statement->execute(array(':username' => $username, ':password' => $hashed_password, ':email' => $email,':phone' => $phone,':profession'=>$profession,':address_area'=>$address_area,':city'=>$city));

              if($statement->rowCount() == 1) {
                header('location: login.php');
                echo "Signup successful";
              }
            }
            catch (PDOException $e) {
              echo "Error: " . $e->getMessage();
            }
          }
          // else {
          //   echo('password not matching!');
          // }



    // } ?>
</body>
</html>
