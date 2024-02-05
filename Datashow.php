<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DataShowing Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>


  <nav class="navbar navbar-expand bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.html">Data Entry</a>
      <div class="" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.html">Add</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="Datashow.php">Search</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
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
      </select>
      <input name="data" class="form-control bg-dark text-white my-2" type="search" name="Search"
        placeholder="Search here">
      <button class="btn btn-success w-100" type="submit">Search</button>
    </div>
  </form>


  <hr class="m-0">
  <table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Supplier Name</th>
        <th scope="col">Brand Names</th>
        <th scope="col">Email</th>
        <th scope="col">File Reference Number</th>
        <th scope="col">Product Name</th>
        <th scope="col">Product specifications</th>
        <th scope="col">Extra Products</th>
        <th scope="col">URL</th>
        <th scope="col">Address</th>
        <th scope="col">Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include './dbconnect.php';

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
          echo '<tr>
                  <th scope="row">' . $count . '</th>
                  <td>' . $row['suppliers_name'] . '</td>
                  <td>' . $row['brand_name'] . '</td>
                  <td><a href = mailto:' . $row['email'] . ' target = "_blank">' . $row['email'] . '</a></td>
                  <td>' . $row['reference_number'] . '</td>
                  <td>' . $row['product_name'] . '</td>
                  <td>' . $row['product_specs'] . '</td>
                  <td>' . $row['extra_products'] . '</td>
                  <td><a href = ' . $row['url'] . ' target = "_blank">' . $row['url'] . '</a></td>
                  <td>' . $row['address'] . '</td>
                  <td>' . $row['Date'] . '</td>
                  ';
        }
      } else {



        $sql = "SELECT * FROM `suppliers`";
        $result = mysqli_query($conn, $sql);
        $count = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr>
                <th scope="row">' . $count . '</th>
                <td>' . $row['suppliers_name'] . '</td>
                <td>' . $row['brand_name'] . '</td>
                <td><a href = mailto:' . $row['email'] . ' target = "_blank">' . $row['email'] . '</a></td>
                <td>' . $row['reference_number'] . '</td>
                <td>' . $row['product_name'] . '</td>
                <td>' . $row['product_specs'] . '</td>
                <td>' . $row['extra_products'] . '</td>
                <td><a href = ' . $row['url'] . ' target = "_blank">' . $row['url'] . '</a></td>
                <td>' . $row['address'] . '</td>
                <td>' . $row['Date'] . '</td>
              </tr>';
          $count++;
        }
        mysqli_close($conn);
      }
      ?>
    </tbody>
  </table>
</body>

</html>