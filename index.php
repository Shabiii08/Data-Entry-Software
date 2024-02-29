<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Data Entry Software</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <?php include 'nevbar.php'; ?>



  <div class="container-fluid pt-3 bg-dark text-white pb-3">
    <div class="Top">
      <h1>Suppliers Data Info</h1>
      <p>Please input data with great care, avoiding any mistakes. Thank you.</p>
    </div>
    <form action="savedata.php" method="post" enctype="multipart/form-data">
    <div class="row m-3" class="input-group">
      <label class="col sm-3">Supplier Name:</label>
      <input type="text" name="suppliers_name" placeholder="Enter supplier name"
        class="col sm-3 form-control bg-dark text-white" />
    </div>
    <div class="row m-3" class="input-group">
      <label class="col sm-3">Email Address:</label>
      <input type="email" required name="email" placeholder="Enter email address"
        class="col sm-3 form-control bg-dark text-white" />
    </div>
    <div class="row m-3" class="input-group">
      <label class="col sm-3">Website URL:</label>
      <input type="url" name="url" placeholder="Enter URL address" class="col sm-3 form-control bg-dark text-white" />
    </div>
    
    <div class="row m-3" class="input-group">
      <label class="col sm-3">Address:</label>
      <input type="text" name="address" placeholder="Enter supplier address"
        class="col sm-3 form-control bg-dark text-white" />
    </div>
    <fieldset>
  <legend></legend>
      <div class="row m-3" class="input-group">
        <label class="col sm-3"></label>
        <input type="number" name="NumberA" placeholder="Enter Phone Number A"
        class="col sm-3 form-control bg-dark text-white" />
      </div>
      
      <div class="row m-3" class="input-group">
        <label class="col sm-3">Numbers</label>
        <input type="number" name="NumberB" placeholder="Enter Phone Number B"
        class="col sm-3 form-control bg-dark text-white" />
      </div>
      
      <div class="row m-3" class="input-group">
        <label class="col sm-3"></label>
        <input type="number" name="NumberC" placeholder="Enter Phone Number C"
        class="col sm-3 form-control bg-dark text-white" />
      </div>
    </fieldset>
    <div class="row m-3" class="input-group">
      <label class="col sm-3">File Reference Number:</label>
      <input type="text" name="reference_number" placeholder="Enter reference number"
      class="col sm-3 mr-3 form-control bg-dark text-white" />
    </div>
    <fieldset>
    <!-- <legend>Product Detail</legend> -->
  <div class="row m-3" class="input-group">
    <label class="col sm-3">Brand Names:</label>
      <input type="text" name="brand_name" placeholder="Enter brand name"
      class="col sm-3 form-control bg-dark text-white" />
    </div>
    <div class="row m-3" class="input-group">
      <label class="col sm-3">Product Name:</label>
      <input type="text" name="product_name" placeholder="Enter product name "
      class="col sm-3 form-control bg-dark text-white" />
    </div>
    <div class="row m-3" class="input-group">
      <label class="col sm-3">Product specifications:</label>
      <input type="text" name="product_specs" placeholder="Enter product specifications"
        class="col sm-3 form-control bg-dark text-white" />
      </div>
    <div class="row m-3" class="input-group">
      <label class="col sm-3">Extra Products Provided:</label>
      <textarea type="text" name="extra_products" placeholder="Enter extra products"
        class="col sm-3 form-control bg-dark text-white"></textarea>
      </div>
    </fieldset>
    
    <div class="row m-3" class="input-group">
      <label class="col sm-3">Attached Files:</label>
      <input type="file" name="myfile" id="myfile" placeholder="Attach the file"
        class="col sm-3 mr-3 form-control bg-dark text-white" />
    </div>
    <div class="row m-3">
      <button class="btn btn-success" type="submit">Submit</button>
    </div>
    </form>
  </div>
</body>

</html>