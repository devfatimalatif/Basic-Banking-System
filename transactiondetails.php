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
    <div class="container">
        <h2><b>Transaction Details</b></h2>

        <br>
        <div class="table-responsive-sm">
            <table class="table table-hover table-striped table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">S.No.</th>
                        <th class="text-center">Sender</th>
                        <th class="text-center">Receiver</th>
                        <th class="text-center">Amount</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php

            include 'config.php';

            $sql ="select * from transfers";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

                        <tr>
                            <td class="py-2">
                                <?php echo $rows['sno']; ?>
                            </td>
                            <td class="py-2">
                                <?php echo $rows['sender']; ?>
                            </td>
                            <td class="py-2">
                                <?php echo $rows['receiver']; ?>
                            </td>
                            <td class="py-2">
                                <?php echo $rows['balance']; ?> </td>
                            
                            <?php
            }

        ?>
                </tbody>
            </table>

        </div>
    </div>

</body>
<footer class="bottom">

    <p> Copyright &copy; 2021, Robicreation - All Rights Reserved</p>




</footer>

</html>