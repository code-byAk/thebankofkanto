<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Customers</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="icon" href="images/imag5.jpg">
</head>

<!-- Navigation Bar with a Currency Convertor-->
<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">The Bank of Kanto Region</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="customers.php">Our Customers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="transactions.php">Transfer History</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" aria-current="page" href="https://www1.oanda.com/currency/converter/">Currency Convertor</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Customer Details from The Database -->
<body>
  <?php
      include 'config.php';
      $sql = "SELECT * FROM users";
      $result = mysqli_query($conn,$sql);
  ?>

  <div class="container">
    <h2 class="text-center pt-4">Our Customers</h2>
    <div class="row">
      <div class="col">
        <div class="table-responsive-sm">
          <table class="table table-hover table-sm table-condensed table-bordered">
              <thead>
                  <tr>
                  <th scope="col" class="text-center py-2">Account No.</th>
                  <th scope="col" class="text-center py-2">Account Holder Name</th>
                  <th scope="col" class="text-center py-2">E-Mail</th>
                  <th scope="col" class="text-center py-2">Account Balance(₹)</th>
                  <th scope="col" class="text-center py-2">Transaction</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td class="text-center py-2"><?php echo $rows['id'] ?></td>
                    <td class="text-center py-2"><?php echo $rows['name']?></td>
                    <td class="text-center py-2"><?php echo $rows['email']?></td>
                    <td class="text-center py-2"><?php echo $rows['balance']?></td>
                    <td class="text-center"><a href="selecteduserdetail.php?id= <?php echo $rows['id'] ;?>"<butttype="button" class="btn bg-warning">Transfer money</butttype=></a></td> 
                </tr>
                <?php
                    }
                ?>
              </tbody>
          </table>
        </div>
      </div>
    </div> 
  </div>
  <!-- Footer Of Copyright -->
  <footer class="text-center mt-2 py-5">
        <p>&copy 2021  <b>CodeByAk</b> </br>Digital Head, The Bank of Kanto Region</p>
  </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
</body>
</html>