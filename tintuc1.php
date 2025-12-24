<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webbanhang";

    //B1: Create connetion
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    //check connection
    
    if (!$conn) {
        die("connection failer" . mysqli_connect_error());
    }
    //B2:
    $sql_nhom = "SELECT * FROM `sanpham_nhom` ";
   
    //Bước 3
    $result_nhom = mysqli_query($conn, $sql_nhom);
    ?>	
    <style>
.header_section {
    width: 100%;
    float: left;
    background-image: none !important;
    height: auto;
    background-size: 100%;
    background-repeat: no-repeat;
}

    </style>
      <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/grid.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/scss/style.scss">
    <link rel="stylesheet" href="assets/css/responsive.css">
    

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <main class="main-wrapper">
    <div class="container" id="trangchu">
        <div class="news">
            <div class="grid wide">
                <div class="news__items">
                    <div class="row">
                    <div class="col l-3">
                        <div class="news__category">
                            <div class="news__category-gr">
                                <h3 class="news__category-heading">Danh Mục Sản Phẩm</h3>
                                <ul class="news__category-list">
                               
                                    <?php while ($row_nhom = mysqli_fetch_assoc($result_nhom)) { ?>
                    <li><a class="news__category-items" href=" cat.php?nhom_id=<?php echo $row_nhom["id"]?>"><?php echo  $row_nhom["tennhom"] ?></a></li>
                        
                <?php } ?>
                                </ul>
                            </div>