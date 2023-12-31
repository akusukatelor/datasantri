<?php 
session_start();

if(!isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;

}
require 'functions.php';
$datas = query("SELECT * FROM datas");

if( isset($_POST["search"]) ) {
    $datas = search($_POST["keyword"]);
}


// $db = mysqli_connect("localhost", "root", "", "basicphp");

// $result = mysqli_query($db, "SELECT * FROM datas");

// ambil data (fetch) mahasiswa dari object result
// mysqli_fetch_row() mengembalikan array numerik
// mysqli_fetch_assoc() mengembalikan array associative/namanya
// mysqli_fetch_array() mengembalikan array keduanya
// mysqli_fetch_object() 

// while($data = mysqli_fetch_assoc($result)) {
// var_dump($data);
// }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="s.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Dancing+Script&family=Lobster&family=Montserrat:ital,wght@1,100&family=Open+Sans:wght@300&family=Philosopher&display=swap" rel="stylesheet">
    <title>Halaman Users</title>
</head>
<body>
    
    <header>
        <div class="logo">
            <img src="logo.png" alt="" class="logo-img">
            <a href="logout.php">Logout</a>
        </div>
    </header>
    
    <h2>Data Santri MAWI Kebarongan</h2>
   

    <div class="contain">
    <form action="" method="post">
        <div class="search">
            <input type="text" name="keyword" placeholder="Masukan data yang ingin dicari" autocomplete="off" size="40">
            <button type="submit" name="search">Search</button>
        </div>
        <div class="tambah">
            <a href="insert.php">Tambah Data Santri</a>
        </div>
    </form>
    </div>
    <!-- end header -->
    

   
        
        
        <?php  foreach($datas as $row) { ?>
            <section class="container">
                <div class="card">
                    <div class="card-image">
                        <img src="<?= $row["gambar"];?>" >
                    </div>
                    <h4><?= $row["nama"];?></h4>
                    <h4><?= $row["kelas"];?> </h4>
                    <p><?= $row["kata"]; ?> </p>
                </div>
            </section>
            
            
        <?php }; ?>  
    
    

</body>
</html>
