<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mega Holdings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Senarai Pelajar</h2>
        <a class="btn btn-primary" href="/ILPKLS/tambahpelajar.php" role="button">Tambah Pelajar</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pelajar</th>
                    <th>No KP</th>
                    <th>No HP</th>
                    <th>Jantina</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost" ;
                $username = "root" ;
                $password = "";
                $database = "datapelajar" ;

                // Create connection
                $connection = new mysqli($servername, $username, $password, $database);

                //Check connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                //read all row from database table
                $sql = "SELECT * FROM info_pelajar";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid querry: " . $connection->error);
                }

                //read data of each row 
                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    
                    <td>$row[id]</td>
                    <td>$row[nama_pelajar]</td>
                    <td>$row[no_kp]</td>
                    <td>$row[no_hp]</td>
                    <td>$row[jantina]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/megaholdings/ubah.php?id=$row[id]'>Ubah</a>
                        <a class='btn btn-danger btn-sm' href='/megaholdings/padam.php?id=$row[id]'>Padam</a>
                    </td>
                </tr>
                    " ;
                    
                }
                ?>
            </tbody>
        </table>

    </div>
</body>
</html>
