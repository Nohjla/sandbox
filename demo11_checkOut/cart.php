<?php
  session_start();
  $_SESSION["email"] = "user@gmail.com";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Demo</title>
</head>
<body>
<table class="table table-striped table-responsive">
    <thead>
      <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Sub-Total</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody><tr>
                    <td>Product 1</td>
                              <td id="price1"> 2000.00</td>
                              <td><input type="number" class="form-control" value="1" id="quantity1" onchange="changeNoItems(1)" min="1" size="5"></td>
                              <td class="sub-total" id="subTotal1">2000</td>
                              <td><button class="btn btn-danger" id="1"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Remove</button></td>
                          </tr><tr>
                              <td>Product 2</td>
                              <td id="price2"> 1000.00</td>
                              <td><input type="number" class="form-control" value="1" id="quantity2" onchange="changeNoItems(2)" min="1" size="5"></td>
                              <td class="sub-total" id="subTotal2">1000</td>
                              <td><button class="btn btn-danger" id="2"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Remove</button></td>
                          </tr><tr>
                              <td>Product 3</td>
                              <td id="price3"> 5000.00</td>
                              <td><input type="number" class="form-control" value="1" id="quantity3" onchange="changeNoItems(3)" min="1" size="5"></td>
                              <td class="sub-total" id="subTotal3">5000</td>
                              <td><button class="btn btn-danger" id="3"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Remove</button></td>
                          </tr></tbody></table>
                          <a type="button" href="checkout.php"> Checkout</a>
</body>
</html>