<?php
session_start();
require_once "database/__DB__.php";
$DB = new __database__();
$fname = mysqli_real_escape_string($DB->__conn__, $_POST["fname"]);
$lname = mysqli_real_escape_string($DB->__conn__, $_POST["lname"]);
$username = $fname." ".$lname;
$email = mysqli_real_escape_string($DB->__conn__, $_POST["email"]);
$password = mysqli_real_escape_string($DB->__conn__, $_POST["password"]);
if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $sql = mysqli_query(
      $DB->__conn__,
      "SELECT * FROM users WHERE email = '{$email}'"
    );
    if (mysqli_num_rows($sql) > 0) {
      echo "$email - This email already exist!";
    } else {
      if (isset($_FILES["image"])) {
        $img_name = $_FILES["image"]["name"];
        $img_type = $_FILES["image"]["type"];
        $tmp_name = $_FILES["image"]["tmp_name"];

        $img_explode = explode(".", $img_name);
        $img_ext = end($img_explode);

        $extensions = ["jpeg", "png", "jpg"];
        if (in_array($img_ext, $extensions) === true) {
          $types = ["image/jpeg", "image/jpg", "image/png"];
          if (in_array($img_type, $types) === true) {
            $time = time();
            $random = substr(md5(mt_rand()), 0, 5);
            $img_name = "ghs__" . $random . ".jpg";
            if (move_uploaded_file($tmp_name, "images/" . $img_name)) {
              $ran_id = rand(time(), 100000000);
              $status = "Active now";
              $encrypt_pass = md5($password);
              $insert_query = mysqli_query(
                $DB->__conn__,
                "INSERT INTO
                                users(user_name, user_email, user_password, user_avtar,
                                unique_id,user_status)VALUES ({$username},
                                '{$email}','{$encrypt_pass}','{$img_name}', '$ran_id', '{$status}')"
              );
              if ($insert_query) {
                $select_sql2 = mysqli_query(
                  $DB->__conn__,
                  "SELECT * FROM users WHERE email = '{$email}'"
                );
                if (mysqli_num_rows($select_sql2) > 0) {
                  $result = mysqli_fetch_assoc($select_sql2);
                  $_SESSION["unique_id"] = $result["unique_id"];
                  echo "success";
                } else {
                  echo "This email address not Exist!";
                }
              } else {
                echo "Something went wrong. Please try again!";
              }
            }
          } else {
            echo "Please upload an image file - jpeg, png, jpg";
          }
        } else {
          echo "Please upload an image file - jpeg, png, jpg";
        }
      }
    }
  } else {
    echo "$email is not a valid email!";
  }
} else {
  echo "All input fields are required!";
}
?>
