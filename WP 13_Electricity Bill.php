 <html>
 <head>
 <title>Electricity bill</title>
 </head>
 <body>
 <center>
 <h2>Electricity BIll</h2>
 <form name="form" action="" method="POST">
 <label for="name">Enter Your Name: </label><br>
 <input type="text" name="name"><br><br>
 <label for="units">How Much Units are used</label><br>
 <input type="number" name="unit"><br>
 <input type="submit" value="submit">
 </form>
 </center>
 <?php
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
 $name = $_POST["name"];
 $units = $_POST["unit"];
 $rate1=0.50;
 $rate2=1;
 $rate3=1.5;
 if(empty($name))
 {
 echo"<script>alert('please enter yor name correctly')</script>";
 }
 else if(empty($units))
 {
 echo"<script>alert('units must be requierd')</script>";
 }
 else{
 if($units <= 100){
 $bill = $units * $rate1;
 }
 else if($units <= 300){
 $bill = $units * $rate2;
 }
 else{
 $bill = $units * $rate3;
 }
 echo"<center>";
 echo"Name: $name <br>";
 echo"Electricity bill: $bill";
 echo"</center>";
 }
 }
 ?>
 </body>
 </html>