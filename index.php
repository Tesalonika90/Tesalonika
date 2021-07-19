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
        <center><h1>Tokyo Olympics 2020</h1></center>
        <a href="tambah.php"><button>Tambah Data</button></a> <br><br>
        <table border="1" width="100%">
            <tr>
                <td align=center>No</td>
                <td align=center>Photo</td>
                <td align=center>Name</td>
                <td align=center>Country</td>
                <td align=center>Time Arrival</td>
                <td align=center>Arrival Status</td>
                <td align=center>Attributes</td>
                <td align=center>Action</td>
            </tr>

            <?php 
            // sambungin ke file koneksi.php
            include "koneksi.php";
            $query = mysqli_query($conn, "SELECT * FROM vip");
            while($row = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td align=center><?php echo $row['id'] ?></td>
                <td align=center><img src="img/<?php echo $row['Photo'] ?>" width="100px" height="100px"></td>
                <td align=center><?php echo $row['Name'] ?></td>
                <td align=center><?php echo $row['Country'] ?></td>
                <td align=center><?php echo $row['Time_Arrival'] ?></td>
                <td align=center><?php echo $row['Arrival_Status'] ?></td>
                <td align=center><?php echo $row['Atributes'] ?></td>
                <td align=center>
                    <a href="edit.php?id=<?php echo $row['id'] ?>"><button>Edit</button></a> |
                    <a href="delete.php?id=<?php echo $row['id'] ?>"><button>Delete</button></a>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>