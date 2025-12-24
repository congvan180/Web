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
        $sql = "SELECT * 
        FROM sanpham1
       
        order by rand()
          limit 12";
    //Bước 3
    $result = mysqli_query($conn, $sql);

?>
<style>

.looking_text{
   color: green !important; /* Màu chữ xanh */
   font-weight: bold; /* In đậm */
   text-align:center;
   text-transform: uppercase;
}
.looking_text_a{
   color: red; /* Màu chữ xanh */
   font-weight: bold; /* In đậm */

}
input[type="submit"] {
            background-color: pink; /* Màu nền */
            color: black; /* Màu chữ */
            border: none;
            font-weight: bold; /* In đậm */
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px; /* Bo góc */
            cursor: pointer;
            transition: background-color 0.3s; /* Hiệu ứng chuyển màu */
        }

        input[type="submit"]:hover {
            background-color: #45a049; /* Màu khi hover */
        }
        .image_1{
         width: 220px;
         height:220px;
         margin-bottom: 20px;
        }
           .col-lg-3 {

            margin-bottom: 30px;
           }
      
    </style>
    
   <!-- banner section start --> 
   <div class="banner_section layout_padding">
            <div class="container">
               <div id="banner_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="banner_img"><img src="./assetss/images/banner-img.png"></div>
                           </div>
                           <div class="col-md-6">
                              <div class="banner_taital_main">
                                 <h1 class="banner_taital">Coffee</h1>
                                 <h5 class="tasty_text">Hương Vị Tuyệt Vời Tại Cafe Arabica</h5>
                                 <p class="banner_text">Thưởng thức những ly cà phê thơm ngon, chuẩn vị mỗi ngày. </p>
                                 <div class="btn_main">
                                    <div class="about_bt"><a href="#">Xem Menu</a></div>
                                    <div class="callnow_bt active"><a href="#">Gọi Ngay </a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="banner_img"><img src="./assetss/images/banner-img.png"></div>
                           </div>
                           <div class="col-md-6">
                              <div class="banner_taital_main">
                                 <h1 class="banner_taital">Sinh Tố & Nước Ép</h1>
                                 <h5 class="tasty_text">Tươi Ngon & Bổ Dưỡng</h5>
                                 <p class="banner_text">Thưởng thức các loại sinh tố tươi ngon và nước ép trái cây tự nhiên. </p>
                                 <div class="btn_main">
                                    <div class="about_bt"><a href="#">Xem Menu</a></div>
                                    <div class="callnow_bt active"><a href="#">Gọi Ngay</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                 <!-- Slide Kem Dừa -->
                 <div class="carousel-item">
                    <div class="row">
                         <div class="col-md-6">
                             <div class="banner_img"><img src="images/kem-dua.png" alt="Kem Dừa"></div>
                                </div>
                       <div class="col-md-6">
                          <div class="banner_taital_main">
                             <h1 class="banner_taital">Kem Dừa</h1>
                             <h5 class="tasty_text">Mát Lạnh & Ngọt Ngào</h5>
                             <p class="banner_text">Thưởng thức kem dừa thơm béo, mát lạnh, tan chảy trong miệng.</p>
                             <div class="btn_main">
                                <div class="about_bt"><a href="#">Về Chúng Tôi</a></div>
                                <div class="callnow_bt active"><a href="#">Gọi Ngay</a></div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>

                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="banner_img"><img src="./assetss/images/banner-img.png"></div>
                           </div>
                           <div class="col-md-6">
                              <div class="banner_taital_main">
                                 <h1 class="banner_taital">Bánh Ngọt</h1>
                                 <h5 class="tasty_text">Ngọt Ngào & Thơm Lừng</h5>
                                 <p class="banner_text">Thưởng thức các loại bánh và món ăn nhẹ kèm đồ uống yêu thích. </p>
                                 <div class="btn_main">
                                    <div class="about_bt"><a href="#">Xem Menu</a></div>
                                    <div class="callnow_bt active"><a href="#">Gọi Ngay</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#banner_slider" role="button" data-slide="prev">
                  <i class="fa fa-arrow-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#banner_slider" role="button" data-slide="next">
                  <i class="fa fa-arrow-right"></i>
                  </a>
               </div>
            </div>
         </div>
         <!-- banner section end --> 
   </div>

        <!-- coffee section start -->
        <div class="coffee_section layout_padding">
         <div class="container">
            <div class="row">
               <h1 class="coffee_taital">Menu</h1>
               <div class="bulit_icon"><img src="./assetss/images/bulit-icon.png"></div>
            </div>
         </div>
         <div class="coffee_section_2">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container-fluid">
                        <div class="row">
                        <?php       $limit = 8; 
                            $count = 0; 
                            while ($row= mysqli_fetch_assoc($result)) { 
                                if ($count >= $limit) {
                                    break; 
                                }    
                        ?> 
                           <div class="col-lg-3 col-md-6">
                              <div class="coffee_img">
                                 
                              <a href="chitiet.php?masp=<?php echo $row["masp"] ?>">
                              <img  src="upload/<?php echo $row["img1"] ?>" class="image_1"> </a> 
                           </div>
                           <a href="chitiet.php?masp=<?php echo $row["masp"] ?>">  
                               <h3 class="looking_text_a"><?php echo $row["dongiamoi"] ?> 000 VNĐ</h3></a>
                              <a href="chitiet.php?masp=<?php echo $row["masp"] ?>">
                                   <p class="looking_text"><?php echo $row["tensp"] ?></p></a>
                              <form action="cart.php" method="post">
                              <div class="read_bt"></div>
                               <input type="submit" value="Mua Ngay" name="addcart"></a>
                              <ul>
                                 <li class="active"> </li>
                                 <input type="hidden" name="soluong" value="1">
                                            <input type="hidden" name="tensp" value="<?php echo $row["tensp"] ?>">
                                            <input type="hidden" name="dongiamoi" value="<?php echo $row["dongiamoi"] ?> 000 VNĐ">
                                            <input type="hidden" name="img1" value="<?php echo $row["img1"] ?>">   
                               
                              </ul>
                           </div>
                              </form>
                           <?php 
                            $count++;    
                            }     ?> 
                        </div>
                     </div>
            
                
               
               <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
               <i class="fa fa-arrow-left"></i>
               </a>
               <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
               <i class="fa fa-arrow-right"></i>
               </a>
            </div>
         </div>
      </div>
                           </div>
                           </div>
                           </div>