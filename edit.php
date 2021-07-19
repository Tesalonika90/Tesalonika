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
            <h2>Silahkan Edit Data</h2>
            <br><br>

            <?php
             include "koneksi.php";
             // manggil data di database
             $data = mysqli_query($conn, "SELECT * FROM vip WHERE id = '".$_GET['id']."'");
             $read = mysqli_fetch_array($data);
     
             $photo = $read['Photo'];
             $nama = $read['Name'];
             $negara = $read['Country'];
             $jam_datang = $read['Time_Arrival'];
             $status_datang = $read['Arrival_Status'];
             $atribut = $read['Atributes'];
            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Photo</td>
                        <td>:</td>
                        <td>
                            <input type="hidden" name="img" value="<?php echo $photo ?>">
                            <input type="file" name="gambar"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><img src="img/<?php echo $photo ?>" width="100px" height="100px"></td>
                    </tr>

                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
                    </tr>

                    <tr>
                        <td>Country</td>
                        <td>:</td>
                        <td><input type="text" name="negara" value="<?php echo $negara; ?>"></td>
                    </tr>

                    <tr>
                        <td>Time Arrival</td>
                        <td>:</td>
                        <td><input type="text" name="jam_datang" value="<?php echo $jam_datang; ?>"></td>
                        <td>*contoh ”2021-06-30 09:21:20”</td>
                    </tr>

                    <tr>
                        <td>Arrival Status</td>
                        <td>:</td>
                        <td>
                            <?php
                            if($status_datang == "Yes (true)"){
                                echo "<input type='radio' name='status_datang' value='Yes (true)' checked='checked'> Yes (true) ";
                                echo "<input type='radio' name='status_datang' value='No (false)'> No (false) ";
                            }else{
                                echo "<input type='radio' name='status_datang' value='Yes (true)'> Yes (true) ";
                                echo "<input type='radio' name='status_datang' value='No (false)' checked='checked'> No (false) ";
                            }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Attributes</td>
                        <td>:</td>
                        <td><input type="text" name="atribut" value="<?php echo $atribut; ?>"></td>
                    </tr>
                </table>
                <br><br>
                <input type="submit" name="update" value="Update">
                <a href="index.php"><input type="button" value="Cancel"></a>
            </form>

        <?php
        if(isset($_POST['update'])) {
            $photo = $_FILES['gambar']['name'];
            $nama = $_POST['nama'];
            $negara = $_POST['negara'];
            $jam_datang = $_POST['jam_datang'];
            $status_datang = $_POST['status_datang'];
            $atribut = $_POST['atribut'];
            $source = $_FILES['gambar']['tmp_name'];
            $folder = './img/';

            if ($photo != '') {
                move_uploaded_file($source, $folder.$photo);
                $update = mysqli_query($conn, "UPDATE vip SET
                    Photo = '".$photo."',
                    Name = '".$nama."',
                    Country = '".$negara."',
                    Time_Arrival = '".$jam_datang."',
                    Arrival_Status = '".$status_datang."',
                    Atributes = '".$atribut."'
                    WHERE id = '".$_GET['id']."'
                    ");
                if ($update) {
                    header("location: index.php");
                } else {
                    echo 'Gagal ubah data';
                }
            }else {
                $update = mysqli_query($conn, "UPDATE vip SET
                    Name = '".$nama."',
                    Country = '".$negara."',
                    Time_Arrival = '".$jam_datang."',
                    Arrival_Status = '".$status_datang."',
                    Atributes = '".$atribut."'
                    WHERE id = '".$_GET['id']."'
                    ");
                if ($update) {
                    header("location: index.php");
                } else {
                    echo 'Gagal ubah data';
                }
            }
            
        }
        ?>
        </center>
    </body>
</html>