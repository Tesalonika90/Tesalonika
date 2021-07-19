<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Tokyo Olympics 2020</title>
    </head>
    <body>
        <nav class="nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="search.php">Search</a></li>

                <?php
                include "koneksi2.php";
                session_start();
                if (!isset($_SESSION['username'])){
                    header ("location:login.php");
                }
                ?>

                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <center>
            <h2>Silahkan Tambah Data</h2>
            <br><br>
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Photo</td>
                        <td>:</td>
                        <td><input type="file" name="gambar"></td>
                    </tr>

                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td><input type="text" name="nama"></td>
                    </tr>

                    <tr>
                        <td>Country</td>
                        <td>:</td>
                        <td><input type="text" name="negara"></td>
                    </tr>

                    <tr>
                        <td>Time Arrival</td>
                        <td>:</td>
                        <td><input type="date" name="jam_datang"></td>
                        <td>*contoh ”2021-06-30 09:21:20”</td>
                    </tr>

                    <tr>
                        <td>Arrival Status</td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="status_datang" value="Yes (true)">Yes (true)
                            <input type="radio" name="status_datang" value="No (false)">No (false)
                        </td>
                    </tr>

                    <tr>
                        <td>Attributes</td>
                        <td>:</td>
                        <td><input type="text" name="atribut"></td>
                    </tr>
                </table>
                <br><br>
                <input type="submit" name="kirim" value="Kirim">
                <a href="index.php"><input type="button" value="Batal"></a>
            </form>
        <?php
        include "koneksi.php";

        if(isset($_POST['kirim'])) {
            $photo = $_FILES['gambar']['name'];
            $nama = $_POST['nama'];
            $negara = $_POST['negara'];
            $jam_datang = $_POST['jam_datang'];
            $status_datang = $_POST['status_datang'];
            $atribut = $_POST['atribut'];
            $source = $_FILES['gambar']['tmp_name'];
            $folder = './img/';

            move_uploaded_file($source, $folder.$photo);

            $insert = mysqli_query($conn, "INSERT INTO vip VALUES (
                NULL, /*buat id nya dan 'vip' itu nama tabel databasenya */
                '$photo',
                '$nama',
                '$negara',
                '$jam_datang',
                '$status_datang',
                '$atribut')");
            
            if ($insert) {
                header("location: index.php");
            } else {
                echo 'Gagal tambah data';
            }
        }
        ?>
        </center>
    </body>
</html>