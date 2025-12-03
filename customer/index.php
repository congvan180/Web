<?php
$table_id = isset($_GET['table']) ? intval($_GET['table']) : 0;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>QR Order - Menu</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .menu-item { border: 1px solid #ddd; padding: 15px; margin-bottom: 10px; border-radius: 8px; }
        button { padding: 8px 14px; margin-top: 10px; cursor: pointer; }
        #cart { position: fixed; right: 20px; top: 20px; padding: 10px 20px; background: orange; color: white; border-radius: 5px; cursor: pointer; }
    </style>
<link rel="stylesheet" href="css/style.css">

</head>
<body>

<h2>Menu - Bàn số <?php echo $table_id; ?></h2>

<div id="menu"></div>

<div id="cart" onclick="showCart()">Giỏ hàng (0)</div>

<script>
    let table_id = <?php echo $table_id; ?>;
    let cart = [];

    function loadMenu() {
        fetch("../api/menu.php")
            .then(res => res.json())
            .then(data => {
                const menu = data.data;
                let html = "";
                menu.forEach(item => {
                    html += `
                    <div class="menu-card">
                        <img src="../${item.image}" alt="${item.name}">
                        <h3>${item.name}</h3>
                        <p class="price">${item.price} đ</p>
                        <button class="add-btn" onclick="addToCart(${item.id}, '${item.name}', ${item.price})">Thêm</button>
                    </div>
                    <div id="cartPopup" class="popup">
                        <div class="popup-content">
                            <h3>Giỏ hàng</h3>
                            <div id="cartItems"></div>

                            <h3 id="totalPrice">Tổng: 0 đ</h3>

                            <button class="btn-send" onclick="sendOrder()">Gửi đơn</button>
                            <button class="btn-close" onclick="closeCart()">Đóng</button>
                        </div>
                    </div>

                <div id="successBox" class="success-popup">
                    <div class="success-content">
                        <h3>Đã gửi đơn thành công!</h3>
                        <button onclick="closeSuccess()">Đóng</button>
                    </div>
                </div>`;
                });
                document.getElementById("menu").innerHTML = html;
            });
    }

    function addToCart(id, name, price) {
        cart.push({id, name, price, qty: 1});
        document.getElementById("cart").innerText = "Giỏ hàng ("+cart.length+")";
    }

   function showCart() {
       const cartBox = document.getElementById("cartItems");
       cartBox.innerHTML = "";

       let total = 0;

       cart.forEach((item, index) => {
           total += item.price * item.qty;

           cartBox.innerHTML += `
               <div class="cart-row">
                   <span>${item.name}</span>
                   <div>
                       <button class="btn-qty" onclick="updateQty(${index}, -1)">-</button>
                       ${item.qty}
                       <button class="btn-qty" onclick="updateQty(${index}, 1)">+</button>
                   </div>
                   <b>${item.price * item.qty} đ</b>
               </div>
           `;
       });

       document.getElementById("totalPrice").innerText = "Tổng: " + total + " đ";

       document.getElementById("cartPopup").style.display = "flex";
   }
function closeCart() {
    document.getElementById("cartPopup").style.display = "none";
}

function updateQty(index, change) {
    cart[index].qty += change;
    if (cart[index].qty <= 0) cart.splice(index, 1);

    document.getElementById("cart").innerText = "Giỏ hàng (" + cart.length + ")";
    showCart();
}


  function sendOrder() {

      let total = cart.reduce((sum, item) => sum + item.price * item.qty, 0);

      fetch("../api/order_create.php", {
          method: "POST",
          body: JSON.stringify({
              table_id: table_id,
              items: cart,
              total: total
          })
      })
      .then(res => res.json())
      .then(data => {

          // Reset giỏ hàng
          cart = [];
          document.getElementById("cart").innerText = "Giỏ hàng (0)";

          // Ẩn popup giỏ hàng
          closeCart();

          // Hiện popup thành công
          document.getElementById("successBox").style.display = "flex";

          // Tự ẩn sau 2 giây
          setTimeout(() => {
              closeSuccess();
          }, 2000);
      });
  }
function closeSuccess() {
    document.getElementById("successBox").style.display = "none";
}


    loadMenu();
</script>

</body>
</html>
