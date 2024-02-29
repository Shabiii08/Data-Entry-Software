<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body style="background-color:rgb(33, 37, 41)">


  <!--==================== nav bar ( START ) =========================-->
  <?php include 'nevbar.php'; ?>
  <!--==================== nav bar  ( END )  =========================-->


  <!--==================== search bar ( START ) ===========================-->

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="container-fluid bg-dark py-2">
      <select name="data_type" class="form-select bg-dark text-white my-2" aria-label="Default select example">
        <option value="show_all">SHOW ALL</option>
        <option selected value="suppliers_name">Supplier Name</option>
        <option value="brand_name">Brand Name</option>
        <option value="email">Email</option>
        <option value="reference_number">File Reference Number</option>
        <option value="product_name">Product Name</option>
        <option value="product_specs">Product specifications</option>
        <option value="extra_products">Extra Products</option>
        <option value="url">URL</option>
        <option value="address">Address</option>
        <option value="date">Date</option>
        <option value="file_url">File Url</option>
        <option value="NumberA">Number_1</option>
        <option value="NumberB">Number_2</option>
        <option value="NumberC">Number_3</option>
      </select>
      <input autofocus name="data" class="form-control bg-dark text-white my-2" type="search" name="Search"
        placeholder="Search here">
      <button class="btn btn-success w-100" type="submit">Search</button>
    </div>
  </form>
  <!--==================== search bar  ( END )  ===========================-->


  <!--==================== Data Table ( START ) ==========================-->

  <hr class="m-0">
  <table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Supplier Name</th>
        <th scope="col">Brand Names</th>
        <th scope="col">File Reference Number</th>
        <th scope="col">Product Name</th>
        <th scope="col">Product specifications</th>
        <th scope="col">Extra Products</th>
        <th scope="col">Date</th>
        <th scope="col">Address</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include './dbconnect.php';

      //==================== show searched data ( START ) ===========================
      if (isset($_POST['data']) && isset($_POST['data_type'])) {
        $data = $_POST['data'];
        $data_type = $_POST['data_type'];
        if ($data_type == "show_all") {
          header("Location: Datashow.php");
          exit();
        }
        // echo $data_type;
        // echo $data;
        $sql = "SELECT * FROM `suppliers` WHERE $data_type LIKE '%$data%'";
        $result = mysqli_query($conn, $sql);
        $count = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          echo ' <tr class="collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapse' . $count . '" aria-expanded="false" aria-controls="flush-collapse' . $count . '">
                  <td scope="row">' . $count . '</td>
                  <td>' . $row['suppliers_name'] . '</td>
                  <td>' . $row['brand_name'] . '</td>
                  <td>' . $row['reference_number'] . '</td>
                  <td>' . $row['product_name'] . '</td>
                  <td>' . $row['product_specs'] . '</td>
                  <td>' . $row['extra_products'] . '</td>
                  <td>' . $row['date'] . '</td>
                  <td>' . $row['address'] . '</td>
                  </tr>
                
                
                <tr id="flush-collapse' . $count . '" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
               
              <th colspan="2">Numbers: </th>
              <td>' . $row['NumberA'] . '</td>
              <td>' . $row['NumberB'] . '</td>
              <td>' . $row['NumberC'] . '</td>
              <th>E-Mail: </th>
              <td><a href = mailto:' . $row['email'] . ' target = "_blank">' . $row['email'] . '</a></td>
              <td>URL: <a  href = ' . $row['url'] . ' target = "_blank">' . $row['url'] . '</a></td>
              <td>File: <a href = ' . $row['file_url'] . ' target = "_blank">' . $row['file_url'] . '</a></td>
            </tr>';
                
                $count++;
          //==================== show searched data  ( END )  ===========================
        }
      } else {


        //==================== Show all data ( START ) ===========================
      
        $sql = "SELECT * FROM `suppliers`";
        $result = mysqli_query($conn, $sql);
        $count = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          echo '
            <tr class="collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapse' . $count . '" aria-expanded="false" aria-controls="flush-collapse' . $count . '">
              <th scope="row">' . $count . '</th>
              <td>' . $row['suppliers_name'] . '</td>
              <td>' . $row['brand_name'] . '</td>
              <td>' . $row['reference_number'] . '</td>
              <td>' . $row['product_name'] . '</td>
              <td>' . $row['product_specs'] . '</td>
              <td>' . $row['extra_products'] . '</td>
              <td>' . $row['Date'] . '</td>
              <td>' . $row['address'] . '</td>
              </tr>
              
              <tr id="flush-collapse' . $count . '" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              
              <th colspan="2">Numbers: </th>
              <td><a href = tel:' . $row['NumberA'] . '>' . $row['NumberA'] . '</a></td>
              <td><a href = tel:' . $row['NumberB'] . '>' . $row['NumberB'] . '</a></td>
              <td><a href = tel:' . $row['NumberC'] . '>' . $row['NumberC'] . '</a></td>
              <th>E-Mail: </th>
              <td><a href = mailto:' . $row['email'] . ' target = "_blank">' . $row['email'] . '</a></td>
              <td>URL: <a  href = ' . $row['url'] . ' target = "_blank">' . $row['url'] . '</a></td>
              <td>File: <a href = ' . $row['file_url'] . ' target = "_blank">' . $row['file_url'] . '</a></td>
            </tr>';

          $count++;
        }
        echo '</div>';
        mysqli_close($conn);
      }
      //==================== Show all data  ( END )  ===========================
      ?>
    </tbody>
  </table>
  <!--==================== Data Table  ( END )  ==========================-->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>