<?php 
    include('koneksi.php');
 
    $SQL = mysqli_query($conn, "SELECT * FROM vip ORDER BY Atributes DESC");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Tokyo Olympics 2020</title>
        <link rel="stylesheet" href="style.css">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="description" content="Demo project with jQuery">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
		<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
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
		<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Country</th>
                <th>Time Arrival</th>
                <th>Arrival Status</th>
                <th>Attributes</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Country</th>
                <th>Time Arrival</th>
                <th>Arrival Status</th>
                <th>Attributes</th>
            </tr>
        </tfoot>
        <tbody>
            <?php while($data = mysqli_fetch_array($SQL)){ ?>
                <tr>
                    <td><img src="img/<?php echo $data['Photo'] ?>" width="100px" height="100px"></td>
                    <td><?= $data['Name'] ?></td>
                    <td><?= $data['Country'] ?></td>
                    <td><?= $data['Time_Arrival'] ?></td>
                    <td><?= $data['Arrival_Status'] ?></td>
                    <td><?= $data['Atributes'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
			    $('#example').DataTable();
			} );
		</script>
	</body>
</html>