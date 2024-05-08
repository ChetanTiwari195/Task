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
            <li class="item"><a href="login.php">Login</a></li>
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

            $sql = "SELECT Product_id, Product_name, Product_Desc, MRP, offer_price FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<h3>" . $row["Product_name"] . "</h3>";
                    echo "<p>MRP:" . $row["MRP"] . "</p>";
                    echo "<p>Offer Price:" . $row["offer_price"] . "</p>";
                    echo "<p>Description" . $row["Product_Desc"] . "</p>";
                    echo "<a href ='Details.php?id=" . $row["Product_id"] . "'>View Details</a>";
                    echo "</div>";
                }
            } else {
                echo "No product found!!";
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