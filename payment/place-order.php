<?php
// Start the session
session_start();

// include the config file
include('./config.php');

// store product details
$p_details = array();

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

// get the product details and set them in the  below form
$product_id = $_GET['p_id'];

$sql = "SELECT p_id,p_name,price FROM products where p_id=".$product_id."";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $p_details['p_name']= $row['p_name'];
        $p_details['price']= $row['price'];
        echo "p_id: " . $row["p_id"]. " - Name: " . $row["p_name"]. " price :" . $row["price"]. "<br>";
    }
} else {
    echo " no products found";
}

$conn->close();

?>


  <!-- About Section -->
  <section id="about" class="about-section text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2 class="text-white mb-4">Place order</h2>
         
            <form id="Login" class="" action="payment/index.php" method="get">

            <div class="form-group">
              <div class="row">
                <div class="col-sm-6 col-xs-12">
                  <input type="text" class=" form-control" id="inputName" placeholder="Enter Name">
                </div>
                <div class="col-sm-6 col-xs-12">
                  <input type="number" class="form-control" id="inputEmail" placeholder="Enter Phone No">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-sm-6 col-xs-12">
                  <input type="text" class="form-control" id="inputDistrict" placeholder="District">
                </div>
                <div class="col-sm-6 col-xs-12">
                  <input type="text" class="form-control" id="inputBlock" placeholder="Block">
                </div>
              </div>
            </div>



            <div class="form-group">
              <select type="text" class="form-control" id="inputProduct" placeholder="type of shilapat">
                <option>
                  Shilapat 1
                </option>
                <option>
                  shilapat 2
                </option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Make Payment</button>

          </form>

        </div>
      </div>
      <img src="img/ipad.JFIF" class="img-fluid" alt="">
    </div>
  </section>
