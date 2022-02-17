<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="transfer.css">

    <style>
    body{
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    #op{
    /* border: 2px red solid; */
    height: 50%;
    width: 100%;
    top: 37%;
    position: absolute;
    display: flex;
    /* align-items: center; */
    justify-content: center;
    }
    </style>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="icontab.png" type="image/x-icon">
    <title>Transfer Money</title>
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
        <h1>Transfer Money</h1>
    </div>


    <div id="op">
        <form name="f1" action="transfersave.php" method="POST">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "banking";
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            
            $sid=$_POST['uid'];

            ?>

            
        <div id="disp">
        <table align="center" border="1px" cellspacing="0" style="text-align: center;width: 70%; height: 30%; position: absolute; left: 15%;">

                <tr style="background: rgb(37, 92, 28); color: white;">
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>BALANCE (Rs.)</th>
                </tr>

            <?php
            $conn=mysqli_connect("localhost", "root", "", "banking");
            if($conn -> connect_error){
                die("Connection Failed".$conn->connection_error);
            }

            $sql="select * from customer where id=$sid";
            $result=$conn-> query($sql);
        
            while($rows=mysqli_fetch_assoc($result)){
            ?>
            
                <tr>
                <td><?php echo $rows['id'] ?></td>
                <td><?php echo $rows['name']?></td>
                <td><?php echo $rows['email']?></td>
                <td><?php echo $rows['balance']?></td>
                <input type="hidden" name="uid" value="<?php echo $rows['id'] ?>">
                <input type="hidden" name="uname" value="<?php echo $rows['name'] ?>">
                </tr>
            
            <?php
            }
            ?>

        </table>
        </div>

        <br><br> <br><br> <br><br>

        <label for="to" id="t" class="lab" style="font-size: 17px; font-weight: bold;">To : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <select name="to" id="to" style="
        height: 40px;
        width: 300px;
        border-radius: 40px;
        background: rgb(236, 236, 236);
        text-align: center;
        border: 2px solid black;
        font-size: 15px;
        cursor: pointer;
        " required>

        <option selected hidden value="">Select</option>
            
            <?php
            $mysqli=NEW MySQLi("localhost", "root", "", "banking");
            $resultset=$mysqli->query("select id, name from customer");
            while($rows=$resultset->fetch_assoc()){
                $name=$rows['name'];
                $id=$rows['id'];
                echo "<option value='$name'>$id : $name</option>";
            }
            ?>

          </select>
          <br><br>

        <label for="amt" id="a" class="lab" style="font-size: 17px; font-weight: bold;">Amount : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="number" id="amt" name="transferamt" placeholder="Enter Amount" style="
        height: 30px;
        width: 200px;
        border-radius: 40px;
        background: rgb(236, 236, 236);
        text-align: center;
        border: 2px solid black;
        font-size: 15px;
        " required><br><br>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" name="sub" style="
        height: 60px;
        width: 200px;
        border-radius: 20px;
        background: rgb(1, 101, 26);
        text-align: center;
        border: none;
        font-size: 20px;
        color: white;
        cursor: pointer;
        " required>Transfer</button>

    <form>
    </div>


</body>
</html>