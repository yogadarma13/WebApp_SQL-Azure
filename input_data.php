<!DOCTYPE html>
<html lang="en">

<head>
    <title>Input Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="header">
        <a class="logo">UD. Makanan Sehat</a>
        <div class="header-right">
            <a href="index.php">Home</a>
        </div>
    </div>
    <div class="container-main">
        <div class="container-input">
            <h2 style="text-align: center"><b>Input data produk</b></h2>
            <form method="post" action="input_data.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-25">
                        <label for="kategori">Kategori</label>
                    </div>
                    <div class="col-75">
                        <select id="kategori" name="kategori">
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="namaproduk">Nama produk</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="namaproduk" name="namaproduk" placeholder="Nama Produk">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="hargaproduk">Harga Produk</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="hargaproduk" name="hargaproduk" placeholder="Harga">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="deskripsi">Deskripsi</label>
                    </div>
                    <div class="col-75">
                        <textarea id="deskripsi" name="deskripsi" placeholder="Deskripsi produk" style="height:200px"></textarea>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
    $host = "myfirstprojectappserver.database.windows.net";
    $user = "yogadarma";
    $pass = "yogaITEHCREW92";
    $db = "Menu";

    try {
        $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch(Exception $e) {
        echo "Failed: " . $e;
    }

    if (isset($_POST['submit'])) {
        try {
            $kategori = $_POST['kategori'];
            $nama = $_POST['namaproduk'];
            $harga = $_POST['hargaproduk'];
            $deskripsi = $_POST['deskripsi'];
            // Insert data
            $sql_insert = "INSERT INTO Menu (kategori, nama, harga, deskripsi) 
                        VALUES (?,?,?,?)";
            $stmt = $conn->prepare($sql_insert);
            $stmt->bindValue(1, $kategori);
            $stmt->bindValue(2, $nama);
            $stmt->bindValue(3, $harga);
            $stmt->bindValue(4, $deskripsi);
            $stmt->execute();
        } catch(Exception $e) {
            echo "Failed: " . $e;
        }
        echo '<script language="javascript">';
        echo 'alert("message successfully sent")';
        echo '</script>';
    }
?>