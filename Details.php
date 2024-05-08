<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
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
        <h1>Product slider</h1>
        <div class="products">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "task";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("connection failed" . $conn->connect_error);
            }

            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $sql = "SELECT Product_id, Product_name, Product_Desc, MRP, offer_price FROM products WHERE Product_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();

                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='product'>";
                        echo "<h3>" . $row["Product_name"] . "</h3>";
                        echo "<p>MRP:" . $row["MRP"] . "</p>";
                        echo "<p>Offer Price:" . $row["offer_price"] . "</p>";
                        echo "<p>Description" . $row["Product_Desc"] . "</p>";
                        echo "<a href='buynow.php?product=" . urlencode($row["Product_name"]) . "'><button>Buy Now</button></a>";
                        echo "<a href ='cart.php?id=" . $row["Product_id"] . "'><button>Add to Cart</button></a> ";
                        echo "</div>";
                    }
                } else {
                    echo "No product found with this ID!!";
                }
            } else {
                echo "No product ID provided in the URL.";
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