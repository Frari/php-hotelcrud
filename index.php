<?php
include 'db-config.php';

// Connect
$conn = new mysqli ($servername, $username, $password, $dbname);

// Check connecion
if($conn && $conn->connect_error){
  echo ('connection failed:' .$conn->connect_error);
  exit();
}

// query per andare a vedere i dettagli stanza dal pusante secondo l'id della stanza
$sql = "SELECT * FROM stanze";
$result = $conn->query($sql); //se va in errore la query ritorna FALSE
 ?>
<!-- includo il file con la parti di html per potrli riutilizzare nelle altre pagine-->
<?php
  include 'layout/head.php';
  include 'layout/navbar.php';
 ?>

    <div id="main" class="container">
      <div class="row">
        <div class="col-12">
          <table class="table">
            <h1>Stanze Hotel</h1>
            <a id="but_aggiungi" class="btn btn-info" href="create.php">Inserisci nuova stanza</a>
            <thead>
              <tr>
                <th class="text-center" scope="col">ID</th>
                <th class="text-center" scope="col">Room number</th>
                <th class="text-center" scope="col">Floor</th>
                <th class="text-center" scope="col">Beds</th>
                <th class="text-center" scope="col">Created at</th>
                <th class="text-center" scope="col">Updated at</th>
                <th class="text-center" scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php
            if($result) {
              if($result->num_rows > 0) {
                while($row = $result -> fetch_assoc()){ ?>
                  <tr>
                    <td class="text-center"><?php echo $row['id'] ?></td>
                    <td class="text-center"><?php echo $row['room_number'] ?></td>
                    <td class="text-center"><?php echo $row['floor'] ?></td>
                    <td class="text-center"><?php echo $row['beds'] ?></td>
                    <td class="text-center"><?php echo $row['created_at'] ?></td>
                    <td class="text-center"><?php echo $row['updated_at'] ?></td>
                    <td class="text-center">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="show.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-primary">Dettagli</a>
                        <!-- link del pulsante modifica a edit.php avendo come riferimento sempre l'id della stanza -->
                        <a href="edit.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-warning">Modifica</a>
                        <!-- link del pulsante cancella a delete.php avendo come riferimento sempre l'id della stanza -->
                        <a href='delete.php?id=<?php echo $row['id'] ?>' type="button" class="btn btn-danger">Cancella</a>
                      </div>
                    </td>
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
<?php $conn->close(); ?>
