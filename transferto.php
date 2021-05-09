<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/transfer.css">
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

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from customers where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Invalid Input Enter A Positive Number!")';  
        echo '</script>';
    }


  
    
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Sorry Your Balance is insufficiant for this Transaction!")';  // showing an alert box.
        echo '</script>';
    }
    


    
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo 'alert("Invalid Input Enter A Positive Number!")';
         echo "</script>";
     }


    else {
        
            
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE customers set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE customers set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transfers(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Your Transaction is Successful');
                                     window.location='transactiondetails.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>
        <div class="container">
            <br>
            <h2><b>Transaction</b></h2>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  customers where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
                <form method="post" name="tcredit" class="tabletext"><br>
                    <div>
                        <table class="table table-striped table-condensed table-bordered">
                            <tr style="color : black;">
                                <th class="text-center">Id</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Balance</th>
                            </tr>
                            <tr style="color : grey;">
                                <td class="py-2">
                                    <?php echo $rows['id'] ?>
                                </td>
                                <td class="py-2">
                                    <?php echo $rows['name'] ?>
                                </td>
                                <td class="py-2">
                                    <?php echo $rows['email'] ?>
                                </td>
                                <td class="py-2">
                                    <?php echo $rows['balance'] ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br><br><br>
                    <label style="color : grey;"><b>Transfer To:</b></label>
                    <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM customers where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
                    <br>
                    <br>
                    <label style="color : grey;"><b>Amount:</b></label>
                    <input type="number" class="form-control" name="amount" required>
                    <br><br>
                    <div class="text-center">
                        <button class="btn mt-3" name="submit" type="submit" id="myBtn" style="display: inline-block; padding: 0.6em 2em;  background-color: #79076f; margin: 4px 2px ;"; >Transfer</button>
                    </div>
                </form>
        </div>

</body>
<footer>
    <p> Copyright &copy; 2021, Robicreation - All Rights Reserved</p>




</footer>

</html>