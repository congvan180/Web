<!-- FOOTER START -->
<style>
/* Footer tổng quát */
.footer_section {
    background-color: #2c2c2c; /* nền tối */
    color: #f1f1f1; /* chữ sáng */
    padding: 50px 0;
    font-family: 'Arial', sans-serif;
}

/* Tiêu đề cột footer */
.footer_title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 15px;
    color: #ffffff;
}

/* Nội dung text footer */
.footer_text {
    font-size: 14px;
    line-height: 1.8;
    color: #dcdcdc;
}

/* Liên kết trong footer */
.footer_text a {
    color: #ff9800; /* link màu cam nổi bật */
    text-decoration: none;
    transition: 0.3s;
}

.footer_text a:hover {
    text-decoration: underline;
}

/* Cột footer */
.footer_section .row > div {
    margin-bottom: 30px; /* khoảng cách dưới */
}

/* Bản quyền */
.copyright_section {
    background-color: #1a1a1a;
    color: #bbbbbb;
    padding: 15px 0;
    font-size: 13px;
    text-align: center;
}

.copyright_section a {
    color: #ff9800;
    text-decoration: none;
    margin: 0 5px;
}

.copyright_section a:hover {
    text-decoration: underline;
}

/* Responsive: khi màn hình nhỏ */
@media (max-width: 767px) {
    .footer_section .row > div {
        text-align: center;
    }
}
</style>

<div class="footer_section layout_padding">
   <div class="container">
      <div class="row">
         <!-- Cột 1: LOCATION -->
         <div class="col-md-4">
            <h4 class="footer_title">Địa CHỉ</h4>
            <p class="footer_text">
               ◉ 60 Tô Kí,Đông Hưng Thuận<br>
               Quận 12 Tp.HCM
            </p>
         </div>

         <!-- Cột 2: HOURS -->
         <div class="col-md-4">
            <h4 class="footer_title">Mở Cửa</h4>
            <p class="footer_text">
               ◉ Thứ 2 - Thứ 7: 6AM-9PM<br>
               ◉ Chủ Nhật: 4AM-9PM
            </p>
         </div>

         <!-- Cột 3: CONTACT -->
         <div class="col-md-4">
            <h4 class="footer_title">Liên Hệ</h4>
            <p class="footer_text">
              ◉ Email: <a href="mailto:info@cafeabica.com">vantc0243@ut.edu.vn</a><br>
              ◉ Phone: <a href="tel:+15551234567">0354479833</a>
            </p>
         </div>
      </div>


   </div>
</div>
<!-- FOOTER END -->
