
<?php include"headernguoidung.php";

include "function_lienhe.php";
$lienhe = new lienhe();
if(isset($_POST['ok'])){
   $lienhe->hoten=isset($_POST['hoten']) ? $_POST['hoten'] : '';
   $lienhe->sdt=isset($_POST['sdt']) ? $_POST['sdt'] : '';
   $lienhe->email=isset($_POST['email']) ? $_POST['email'] : '';
   $lienhe->noidung=isset($_POST['noidung']) ? $_POST['noidung'] : '';
  
   $lienhe->insert();

   
}
?>

<style>

    .contact {
        height: unset;
    }

    .contact__form:hover {
        box-shadow:0 0 10px 0 rgba(0,0,0,0.15);
    }
    .header_section {
    width: 100%;
    float: left;
    background-image: none !important;
    height: auto;
    background-size: 100%;
    background-repeat: no-repeat;
}
.contact__form-gr-input{
    border:1px solid black !important;
}
.send_bt {
    background-color: #007bff; /* Màu nền */
    color: white; /* Màu chữ */
    border: none; /* Bỏ viền */
    border-radius: 5px; /* Bo góc */
    padding: 10px 20px; /* Khoảng cách trong nút */
    font-size: 16px; /* Kích thước chữ */
    cursor: pointer; /* Hiển thị con trỏ khi di chuột */
    transition: background-color 0.3s, transform 0.2s; /* Hiệu ứng chuyển đổi */
    margin-top:20px;
}

.send_bt:hover {
    background-color: #0056b3; /* Màu nền khi di chuột */
    transform: scale(1.05); /* Phóng to nhẹ khi di chuột */
}

.send_bt:active {
    transform: scale(0.95); /* Nhấn nút sẽ thu nhỏ */
}
</style>
   
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="contact_taital">Liên Hệ Với Chúng Tôi</h1>
                  <div class="bulit_icon"><img src="./assetss/images/bulit-icon.png"></div>
               </div>
            </div>
         </div>
         <div class="container-fluid">
            <div class="contact_section_2">
               <div class="row">
                  <div class="col-md-12">
                  <form action="" method="post">
                     <div class="mail_section_1">
                        <input type="text" class="mail_text" placeholder="Tên Của Bạn" name="hoten">
                        <input type="text" class="mail_text" placeholder="Email" name="email">
                        <input type="text" class="mail_text" placeholder="Số Điện Thoại" name="sdt">
                        <textarea class="massage-bt" placeholder="Tin Nhắn" rows="5" id="comment" name="noidung"></textarea>
                        <div class="contact__form-btn">
                        <button class="send_bt" type="submit" name="ok">Gửi</button></div>
                     </div>
                     </div>
                     </form>
                  </div>
                 
               </div>
            </div>
         </div>
      </div>
                  
        <?php
   include "footernguoidung.php";?>