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
    left: 0%;
    z-index: 0;
    }

    #disp > table{
    width: 90%;
    text-align: center;
    background: white;
    line-height: 50px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    </style>

    <title>History</title>
</head>
<body>
    
    <div id="logo">
        <img src="icontab.png" alt="logo">
        <h1>The <a href="index.html" style="text-decoration: none; color: white;;">GRIP</a> Bank</h1>
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
        <h1>Transaction History</h1>
    </div>

    <div id="disp">
        <table align="center" border="1px" cellspacing="0">
                <tr style="background: rgb(37, 92, 28); color: white;">
                <!-- <th>ID</th> -->
                <th>ID</th>
                <th>SENDER</th>
                <th>RECEIVER</th>
                <th>AMOUNT (Rs.)</th>
                <th>TIMESTAMP</th>
                </tr>
            <?php
            $conn=mysqli_connect("localhost", "root", "", "banking");
            if($conn -> connect_error){
                die("Connection Failed".$conn->connection_error);
            }
            $sql="select * from transfers";
            $result=$conn-> query($sql);
                while($row=$result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["sender"]."</td>";
                    echo "<td>".$row["receiver"]."</td>";
                    echo "<td>".$row["amount"]."</td>";
                    echo "<td>".$row["time"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            $conn->close();
            ?>
        </table>
    </div>

</body>
</html>