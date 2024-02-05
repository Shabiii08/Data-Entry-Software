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
  // $file = test_input($_POST["file"]);


  if ($suppliers_name && $brand_name && $email && $reference_number && $product_name && $product_specs && $extra_products && $url && $address) {
    // echo add data 
    $sql = "INSERT INTO `suppliers` (`suppliers_name`, `brand_name`, `email`, `reference_number`, `product_name`, `product_specs`, `extra_products`, `url`, `address`, `Date`) 
                          VALUES ('$suppliers_name', '$brand_name', '$email', '$reference_number', '$product_name', '$product_specs', '$extra_products', '$url', '$address', current_timestamp());";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "Data added successfully
      <button onclick='window.location.href = \"index.html\";' type='button'>Go to Home</button>
      ";
      // echo '
      // <script>
      //   setTimeout(() => {
      //     window.location.href = "index.html";
      //   }, 5000);
      // </script>';
    }
  }
}

echo 'ok';