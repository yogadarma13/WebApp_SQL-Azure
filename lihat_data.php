<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lihat Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="header">
        <a class="logo">Yoga's Restaurant</a>
        <div class="header-right">
            <a href="index.php">Home</a>
        </div>
    </div>
    <h2 style="text-align: center"><b>Data Menu Yoga's Restaurant</b></h2>
    <div class="container-main">
        <?php
            $host = "yogarestaurantappserver.database.windows.net";
            $user = "yogadarma";
            $pass = "yogaTIFUB2017";
            $db = "yogarestaurantdb";
            try {
                $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
                $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            } catch(Exception $e) {
                echo "Failed: " . $e;
            }

            try{
                $sql_select = "SELECT * FROM Menu";
                $stmt = $conn->query($sql_select);
                $menus = $stmt->fetchAll(); 

                if(count($menus) > 0){
                    echo "<table>
                        <tr>
                            <th>Id</th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga Produk</th>
                            <th>Deskripsi Produk</th>
                        </tr>";
                    foreach($menus as $menu) {
                        echo "<tr><td>".$menu['id']."</td>";
                        echo "<td>".$menu['kategori']."</td>";
                        echo "<td>".$menu['nama']."</td>";
                        echo "<td>".$menu['harga']."</td>";
                        echo "<td>".$menu['deskripsi']."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("Data menu belum ada")';
                    echo '</script>';
                }
            } catch(Exception $e) {
                echo "Failed: " . $e;
            }
        ?>

    </div>
</body>
</html>