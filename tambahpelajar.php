<?php

$servername = "localhost" ;
$username = "root" ;
$password = "";
$database = "datapelajar" ;

// Create connection
$connection = new mysqli($servername, $username, $password, $database);


$nama_pelajar =  "";
$no_kp = "";
$jantina = "";
$no_hp = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pelajar = $_POST["nama_pelajar"];
    $no_kp = $_POST["no_kp"];
    $jantina = $_POST["jantina"];
    $no_hp = $_POST["no_hp"];

    do {
        if (empty($nama_pelajar) || empty($no_kp) || empty($jantina) || empty($no_hp) ) {
            $errorMessage = "All the fields are required";
            break;
        }

        // add new pelajar to database
        $sql = "INSERT INTO info_pelajar (nama_pelajar, no_kp, jantina, no_hp) " .
               "VALUES ('$nama_pelajar', '$no_kp', '$jantina', 'no_hp',)";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: ". $connection->error;
            break;
        }

        $nama_pelajar =  "";
        $no_kp = "";
        $jantina = "";
        $no_hp = "";

        $successMessage = "Pelajar telah di tambah dengan betul";

        header("location:/ILPKLS/index.php");
        exit;

    } while(false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ILPKLS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Tambah Pelajar</h2>

        <?php
        if (!empty($errorMessage) ) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>  
                 <strong>$errorMessage</strong>
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_pelajar" value="<?php echo $nama_pelajar; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-3">No KP</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="no_kp" value="<?php echo $no_kp; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-3">Jantina</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="jantina" value="<?php echo $jantina; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-3">No HP</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="no_hp" value="<?php echo $no_hp; ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage) ) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label> 
                        </div>
                    </div>
                </div>
                ";
            }
            ?>

            <div class="row mb-3">                
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/megaholdings/index.php" role="buton">Cancel</a>
                </div>
                <div class="col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
        </form>

    </div>
</body>
</html>
