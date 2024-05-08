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

    <div class="container">
        <h1>Thank You for Your Purchase!</h1>
        <p>You have purchased:
            <?php echo $_GET['product']; ?>
        </p>
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