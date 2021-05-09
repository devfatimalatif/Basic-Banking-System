<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Customer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/newuser.css">
</head>

<body>
    <div id="navbar">
        <div id="logo">
            <img src="images/image2.jpg" alt="logo" height="100" width="100">
        </div>
        <div class="topnav" id="myTopnav">

            <a href="index.php" class="active">Home</a>
            <a href="createcustomer.php">New Customer</a>
            <a href="transfermoney.php">Transfer Money</a>
            <a href="transactiondetails.php">Transaction Details</a>
            <a href="#">About Us</a>

        </div>
    </div>
    <?php
    include 'config.php';
    if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $balance=$_POST['balance'];
    $sql="insert into customers(name,email,balance) values('{$name}','{$email}','{$balance}')";
    $result=mysqli_query($conn,$sql);
    if($result){
               echo "<script> alert('New User created');
                               window.location='transfermoney.php';
                     </script>";
                    
    }
  }
?>


        <br>
        <div class="container">
            <img src="images/image3.jpg" id="bank">
            <div class="centered">
                <h2>Money Bag </h2>
                <form method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" placeholder="Enter your NAME" type="text" name="name" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Emailid</label>
                        <input class="form-control" placeholder=" Enter your EMAIL" type="email" name="email" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Balance</label>
                        <input class="form-control" placeholder="Enter your BALANCE" type="number" name="balance" required>
                    </div>
                    <br>
                    <div class="form-group button">
                        <input class="form-button" type="submit" value="CREATE" name="submit"></input>
                        <input class="form-button" type="reset" value="RESET" name="reset"></input>
                    </div>
                </form>
            </div>
        </div>



</body>
<footer>
    <p> Copyright &copy; 2021, Robicreation - All Rights Reserved</p>


</footer>

</html>
