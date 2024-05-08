<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>

<body>
    <style>
        ul {
            display: flex;
            margin: 20px;
        }

        li {
            list-style-type: none;
            padding: 10px;

        }

        .navbar {
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-between;
            align-items: center;
        }

        .products {
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-evenly;
            align-items: center;
        }
    </style>

    <nav class="navbar">
        <div class="logo">
            LOGO
        </div>
        <ul class="list-items">
            <li class="item">My Cart</li>
            <li class="item">Login</li>
            <li class="item">Register</li>
        </ul>
    </nav>

    <div>
        <h1>Product Details</h1>
        <div class="products">
            <?php
            session_start();

            if (isset($_SESSION["userId"])){
                $userId = $_SESSION['userId'];
                $Product_id = $_GET['id'];

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "task";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("connection failed" . $conn->connect_error);
            }

            if (isset($_GET['id'])) {
                $Product_id = $_GET['id'];
            }

            $sql = "INSERT INTO cart (userId, Product_id) values ($userId, $Product_id)";

            if ($conn->query($sql) === true) {
                echo "Product added to cart";
            } else {
                echo "error" . $conn->error;
            }
            $conn->close();
            } else {
                echo"<script>alert('Please login')</script>";
            }
            ?>
        </div>
    </div>

    <div class="footer">
        <div>
            <h3>About Us</h3>
        </div>
        <div>
            <h3>Quick Links</h3>
        </div>
        <div>
            <h3>Quick Links</h3>
        </div>
    </div>
</body>

</html>