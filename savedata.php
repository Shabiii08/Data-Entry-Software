<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Save Data</title>
  <link rel="stylesheet" href="./style.css" />
  <style>
    body {
      padding: 10px;
      background-color: rgb(40, 40, 40) !important;
      color: #f5f5f5 !important;
    }
    
.homebtn{
  color: white;
  background: green;
  padding: 7px;
  margin: 5px;
  border-radius: 5px;
  border:2px solid black;
  cursor: pointer;
}
.homebtn:hover{
  background: rgb(0, 169, 0);
}
  </style>
</head>

<body>
  <?php
  // save data into mysql database
  include './dbconnect.php';


  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $suppliers_name = test_input($_POST["suppliers_name"]);
    $brand_name = test_input($_POST["brand_name"]);
    $email = test_input($_POST["email"]);
    $reference_number = test_input($_POST["reference_number"]);
    $product_name = test_input($_POST["product_name"]);
    $product_specs = test_input($_POST["product_specs"]);
    $extra_products = test_input($_POST["extra_products"]);
    $url = test_input($_POST["url"]);
    $address = test_input($_POST["address"]);
    $NumberA = test_input($_POST['NumberA']);
    $NumberB = test_input($_POST['NumberB']);
    $NumberC = test_input($_POST['NumberC']);



    if ($email) {
      // if ($suppliers_name && $brand_name && $email && $reference_number && $product_name && $product_specs && $extra_products && $url && $address) {
      // echo add data 
      $sql = "INSERT INTO `suppliers` (`suppliers_name`, `brand_name`, `email`, `reference_number`, `product_name`, `product_specs`, `extra_products`, `url`, `address`,`NumberA`,`NumberB`,`NumberC`, `Date`,`file_url`) 
                          VALUES ('$suppliers_name', '$brand_name', '$email', '$reference_number', '$product_name', '$product_specs', '$extra_products', '$url', '$address','$NumberA','$NumberB','$NumberC', current_timestamp(), '');";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo "Data Saved successfully. 
      <button class='homebtn' onclick='window.location.href = \"index.php\";' type='button'>Go to Home</button><br><br>
      ";
        // echo '
        // <script>
        //   setTimeout(() => {
        //     window.location.href = "index.html";
        //   }, 5000);
        // </script>';
        echo '<br />';
        //==================== make file name function( START ) ===========================
        function replaceSpacesWithDashes($filename)
        {
          // Replace spaces with dashes using str_replace
          $newFilename = str_replace(' ', '-', $filename);
          return $newFilename;
        }
        //==================== make file name function ( END )  ===========================
        //================ upload file ( START ) ========================
        $file_name = $_FILES['myfile']['name'];
        $file_tmp_name = $_FILES['myfile']['tmp_name'];
        if (!$file_name) {
          echo "File not selected";
          exit;
        }
        $newFilename = replaceSpacesWithDashes($file_name);
        if (move_uploaded_file($file_tmp_name, "uploads/" . $newFilename)) {
          echo "File uploaded successfully.";
        } else {
          echo "File Upload Error";
        } ?>
        <a href='uploads/<?php echo $newFilename; ?>' target="_blank">
          See File
          <?php echo $newFilename; ?>
        </a>

        <?php
        //================= save url ( START ) =====================
        $file_url = "uploads/" . $newFilename;
        $sql = "UPDATE `suppliers` SET `file_url` = '$file_url' WHERE `email` = '$email'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          echo "File url saved successfully.";
        } else {
          echo "File url save Error";
        }
        //================= save url  ( END )  =====================
  
        //================ upload file  ( END )  ========================
      }
    }
  }

  echo 'ok';

  ?>
</body>

</html>