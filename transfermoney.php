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
    $sql = "SELECT * FROM customers";
    $result = mysqli_query($conn,$sql);
?>



        <div class="container">
            <br>
            <h2><b>Transfer Money</b></h2>
            <br>
            <div class="row">
                <div class="col">
                    <div>
                        <table class="table table-hover table-sm table-striped table-condensed table-bordered" style="border-color:black;">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center py-2">Id</th>
                                    <th scope="col" class="text-center py-2">Name</th>
                                    <th scope="col" class="text-center py-2">E-Mail</th>
                                    <th scope="col" class="text-center py-2">Balance</th>
                                    <th scope="col" class="text-center py-2">Transfer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                                <tr>
                                    <td class="py-2">
                                        <?php echo $rows['id'] ?>
                                    </td>
                                    <td class="py-2">
                                        <?php echo $rows['name']?>
                                    </td>
                                    <td class="py-2">
                                        <?php echo $rows['email']?>
                                    </td>
                                    <td class="py-2">
                                        <?php echo $rows['balance']?>
                                    </td>
                                    <td>
                                        <a href="transferto.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn" style="background-color:#79076f;; color:whitesmoke;"><b>Transfer Now</b></button></a>
                                    </td>
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


</body>
<footer class="bottom">

    <p> Copyright &copy; 2021, Robicreation - All Rights Reserved</p>




</footer>

</html>