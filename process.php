<?php

echo '
<style>
.custom_button {
    justify-content: center;
    width: 380px;
    height: 40px;
    font-size: large;
    color: rgb(5, 5, 252);
}
</style>
';

$conn = mysqli_connect('localhost', 'root', '', 'AQI');
if (!$conn) {
      die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
      $name = htmlspecialchars($_POST['fname']);
      $email = htmlspecialchars($_POST['email']);
      $gender = htmlspecialchars($_POST['gender']);
      $birthday = htmlspecialchars($_POST['birthday']);
      $country = htmlspecialchars($_POST['country']);
      $opinion = htmlspecialchars($_POST['opinion']);

      echo "<h1>Registration Details</h1>";
      echo "<form method='post'>";
      echo "<input type='hidden' name='fname' value='$name'>";
      echo "<input type='hidden' name='email' value='$email'>";
      echo "<input type='hidden' name='gender' value='$gender'>";
      echo "<input type='hidden' name='birthday' value='$birthday'>";
      echo "<input type='hidden' name='country' value='$country'>";
      echo "<input type='hidden' name='opinion' value='$opinion'>";
      echo "<table border='1' cellpadding='10' cellspacing='0'>";
      echo "<tr><th>Field</th><th>Value</th></tr>";
      echo "<tr><td>Full Name</td><td>$name</td></tr>";
      echo "<tr><td>Email</td><td>$email</td></tr>";
      echo "<tr><td>Gender</td><td>$gender</td></tr>";
      echo "<tr><td>Date of Birth</td><td>$birthday</td></tr>";
      echo "<tr><td>Country</td><td>$country</td></tr>";
      echo "<tr><td>Opinion</td><td>$opinion</td></tr>";
      echo "</table><br>";
      echo "<button type='submit' name='confirm' class='custom_button'>Confirm</button>";
      echo "</form>";
}

if (isset($_POST["confirm"])) {
      $name = $_POST['fname'];
      $email = $_POST['email'];
      $gender = $_POST['gender'];
      $birthday = $_POST['birthday'];
      $country = $_POST['country'];
      $opinion = $_POST['opinion'];

      $stmt = $conn->prepare("INSERT INTO registrations (name, email, gender, birthday, country, opinion) VALUES (?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssss", $name, $email, $gender, $birthday, $country, $opinion);

      if ($stmt->execute()) {
            echo "You have been registered successfully.";
            header("refresh: 2; url = index.html");
            exit();
      }
}

if (!isset($_POST["submit"]) && !isset($_POST["confirm"])) {
      echo "No data submitted.";
      header("refresh: 2; url = index.html");
}
?>
