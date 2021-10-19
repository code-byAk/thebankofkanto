<?php
include 'config.php';
if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];
    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // Returns Sender Account.
    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);
    // If negative amount is transferred.
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo 'alert("Sorry, a Negative Value is being Transferred! Please Retry!")';  // Alert BOX.
        echo '</script>';
    }
    //If Balance is insufficent.
    else if($amount > $sql1['balance']) 
    {
        echo '<script type="text/javascript">';
        echo 'alert("Sorry! Insufficient Balance!")';
        echo '</script>';
    }
    //If Zero amount is transferred.
    else if($amount == 0)
    {
         echo "<script type='text/javascript'>";
         echo 'alert("Sorry, Zero amount cannot be Transferred! Please Retry!")';
         echo "</script>";
    }
    else 
    {
      $newbalance = $sql1['balance'] - $amount;
      $sql = "UPDATE users set balance=$newbalance where id=$from";
      mysqli_query($conn,$sql);
      $newbalance = $sql2['balance'] + $amount;
      $sql = "UPDATE users set balance=$newbalance where id=$to";
      mysqli_query($conn,$sql);
      $sender = $sql1['name'];
      $receiver = $sql2['name'];
      $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
      $query=mysqli_query($conn,$sql);
      if($query){
           echo "<script> alert('Thank You! Your Transaction is Successful. Check Transaction History by clicking OK.');
                           window.location='transactions.php';
                 </script>"; 
      }
      $newbalance= 0;
      $amount =0;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="images/imag5.jpg">
  <!-- Navigation Bar with a Currency Convertor-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">The Bank of Kanto Region</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
              <a class="nav-link" aria-current="page" href="transactions.php">Transfer History</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="https://www1.oanda.com/currency/converter/">Currency Convertor</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Money Transfer</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style4.css">
</head>
<body>
	<div class="container">
        <h2 class="text-center pt-4">Money Transfer in Seconds</h2>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
                <div>
                    <table class="table table-condensed table-bordered">
                        <tr>
                            <th class="text-center">Account No.</th>
                            <th class="text-center">Account Name</th>
                            <th class="text-center">E-mail</th>
                            <th class="text-center">Account Balance(₹)</th>
                        </tr>
                        <tr>
                            <td class="py-2 text-center"><?php echo $rows['id'] ?></td>
                            <td class="py-2 text-center"><?php echo $rows['name'] ?></td>
                            <td class="py-2 text-center"><?php echo $rows['email'] ?></td>
                            <td class="py-2 text-center"><?php echo $rows['balance'] ?></td>
                        </tr>
                    </table>
                </div>
                <label><b>Transfer To:</b></label>
                <select name="to" class="form-control" required>
                    <option value="" disabled selected>Choose Recipient Account</option>
                    <?php
                        include 'config.php';
                        $sid=$_GET['id'];
                        $sql = "SELECT * FROM users where id!=$sid";
                        $result=mysqli_query($conn,$sql);
                        if(!$result)
                        {
                            echo "Error ".$sql."<br>".mysqli_error($conn);
                        }
                        while($rows = mysqli_fetch_assoc($result)) 
                        {
                    ?>
                    <option class="table" value="<?php echo $rows['id'];?>" >
                        <?php echo $rows['name'] ;?>
                    </option>
                    <?php 
                        } 
                    ?>
                </select>
                <div>
                    <br><br>
                    <label><b>Amount:</b></label>
                    <input type="number" class="form-control" name="amount" required>   
                    <br><br>
                    <div class="text-center" >
                        <button class="btn btn-warning" name="submit" type="submit" id="myBtn" >Transfer Money</button>
                    </div>
                </div>
            </form>
    <!-- Footer Of Copyright -->
    <footer class="text-center mt-2 py-5">
        <p>&copy 2021  <b>CodeByAk</b> </br>Digital Head, The Bank of Kanto Region</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>