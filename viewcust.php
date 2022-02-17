<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="viewcust.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="icontab.png" type="image/x-icon">

    <style>
    #disp{
    height: 50%;
    overflow-y: auto;
    width: 100%;
    top: 36%;
    position: absolute;
    z-index: 0;
    }

    #disp > table{
    width: 70%;
    text-align: center;
    background: white;
    line-height: 50px;
    left: 0%;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    </style>
    
    <title>Customers</title>
</head>
<body>

    <div id="logo">
        <img src="icontab.png" alt="logo">
        <h1>The <a href="index.html" style="text-decoration: none; color: white;">GRIP</a> Bank</h1>
    </div>

    <div id="contact">
        &nbsp;<i class="fa fa-fw fa-linkedin"></i> : &nbsp; <a href="https://www.linkedin.com/in/akshita-raut/">Akshita Raut</a>
    </div>

    <div id="cr">
        <div>
            <i class="fa fa-fw fa-copyright"></i>
            Made by <b>Akshita Raut</b> as a part of GRIP Internship Program by <a href="https://internship.thesparksfoundation.info/">The Sparks Foundation</a>
        </div>
    </div>

    <div id="topic">
        <h1 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Customers</h1>
    </div>

    <div id="disp">
        <table align="center" border="1px" cellspacing="0">

                <tr style="background: rgb(37, 92, 28); color: white;">
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>BALANCE (Rs.)</th>
                <th>TRANSFER</th>
                </tr>

            <?php
            $conn=mysqli_connect("localhost", "root", "", "banking");
            if($conn -> connect_error){
                die("Connection Failed".$conn->connection_error);
            }

            $sql="select * from customer";
            $result=$conn-> query($sql);
        
            while($rows=mysqli_fetch_assoc($result)){
            ?>
            <form action="transfer.php" method="POST">
                <tr>
                <td><?php echo $rows['id'] ?></td>
                <td><?php echo $rows['name']?></td>
                <td><?php echo $rows['email']?></td>
                <td><?php echo $rows['balance']?></td>
                <input type="hidden" name="uid" value="<?php echo $rows['id'] ?>">
                <td>
                <button type="submit"
                style="
                font-size: 20px; 
                border: none; 
                background: rgb(0, 110, 0); 
                color: white; 
                border-radius: 30px; 
                cursor: pointer;" 
                onclick="window.location.href='transfer.php'">
                <i class="fa fa-fw fa-rupee"></i>
                </button>
                </td> 
                </tr>
            </form>
            <?php
            }
            ?>

        </table>
    </div>

</body>
</html>