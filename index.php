<?php
include 'db-config.php';

// Connect
$conn = new mysqli ($servername, $username, $password, $dbname);

// Check connecion
if($conn && $conn->connect_error){
  echo ('connection failed:' .$conn->connect_error);
  exit();
}

$sql = "SELECT * FROM stanze";
$result = $conn->query($sql); //se va in errore la query ritorna FALSE
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>php-hotelcrud</title>
    <link rel="stylesheet" href="public/css/app.css">
  </head>
  <body>
    <header>
      <div class="container">
        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/3/39/HiltonHotelsLogo.svg/1200px-HiltonHotelsLogo.svg.png" alt="logo">
        <nav>
          <a href="#">HOME</a>
          <a href="#">CHI SIAMO</a>
          <a href="#">GALLERIA</a>
          <a href="#">CONTATTI</a>
        </nav>
      </div>
    </header>
    <div id="main" class="container">
      <div class="row">
        <div class="col-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th class="text-center" scope="col">Room number</th>
                <th class="text-center" scope="col">Floor</th>
                <th class="text-center" scope="col">Beds</th>
                <th class="text-center" scope="col">Created at</th>
                <th class="text-center" scope="col">Updated at</th>
              </tr>
            </thead>
            <tbody>
            <?php
            if($result) {
              if($result->num_rows > 0) {
                while($row = $result -> fetch_assoc()){ ?>
                  <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td class="text-center"><?php echo $row['room_number'] ?></td>
                    <td class="text-center"><?php echo $row['floor'] ?></td>
                    <td class="text-center"><?php echo $row['beds'] ?></td>
                    <td class="text-center"><?php echo $row['created_at'] ?></td>
                    <td class="text-center"><?php echo $row['updated_at'] ?></td>
                  </tr>
                  <?php
                }
              } else {
                echo '0 results';
              }
            } else {
              echo 'query error';
            }
             ?>
           </tbody>
          </table>
        </div> <!--col-12-->
      </div> <!--row-->
    </div> <!--container-->
  </body>
</html>
