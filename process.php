<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['fname']);
    $email = htmlspecialchars($_POST['email']);
    $gender = htmlspecialchars($_POST['gender']);
    $birthday = htmlspecialchars($_POST['birthday']);
    $country = htmlspecialchars($_POST['country']);
    $opinion = htmlspecialchars($_POST['opinion']);

    echo "<h1>Registration Details</h1>";
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<tr><th>Field</th><th>Value</th></tr>";
    echo "<tr><td>Full Name</td><td>$name</td></tr>";
    echo "<tr><td>Email</td><td>$email</td></tr>";
    echo "<tr><td>Gender</td><td>$gender</td></tr>";
    echo "<tr><td>Date of Birth</td><td>$birthday</td></tr>";
    echo "<tr><td>Country</td><td>$country</td></tr>";
    echo "<tr><td>Opinion</td><td>$opinion</td></tr>";
    echo "</table><br>";

    echo '<form method="post" action="confirm.php" style="display:inline-block; margin-right:10px;">
            <input type="hidden" name="fname" value="' . $name . '">
            <input type="hidden" name="email" value="' . $email . '">
            <input type="hidden" name="gender" value="' . $gender . '">
            <input type="hidden" name="birthday" value="' . $birthday . '">
            <input type="hidden" name="country" value="' . $country . '">
            <input type="hidden" name="opinion" value="' . $opinion . '">
            <input type="submit" value="Confirm">
          </form>';

    echo '<form method="post" action="cancel.php" style="display:inline-block;">
            <input type="submit" value="Cancel">
          </form>';
} else {
    echo "<p>No data submitted.</p>";
}
?>
