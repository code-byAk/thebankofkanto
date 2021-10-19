<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style3.css">
    <link rel="icon" href="images/imag5.jpg">
</head>

<body>
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
            <a class="nav-link" aria-current="page" href="customers.php">Our Customers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="transactions.php">Transfer History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="https://www1.oanda.com/currency/converter/">Currency Convertor</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Transaction History Log of all the transactions from the Database -->
  <div class="container">
    <h2 class="text-center pt-4">Transfer History</h2>
    <div class="table-responsive-sm">
      <table class="table table-hover table-condensed table-bordered">
          <thead>
            <tr>
              <th class="text-center">Sl. No.</th>
              <th class="text-center">Sender</th>
              <th class="text-center">Receiver</th>
              <th class="text-center">Amount</th>
              <th class="text-center">Date & Time</th>
            </tr>
          </thead>
          <tbody>
          <?php
              include 'config.php';
              $sql ="select * from transaction";
              $query =mysqli_query($conn, $sql);
              while($rows = mysqli_fetch_assoc($query))
              {
          ?>
              <tr>
              <td class="py-2 text-center"><?php echo $rows['sno']; ?></td>
              <td class="py-2 text-center"><?php echo $rows['sender']; ?></td>
              <td class="py-2 text-center"><?php echo $rows['receiver']; ?></td>
              <td class="py-2 text-center"><?php echo $rows['balance']; ?> </td>
              <td class="py-2 text-center"><?php echo $rows['datetime']; ?> </td>    
          <?php
              }
          ?>
          </tbody>
      </table>
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