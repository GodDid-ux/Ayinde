<?php
// Database connection (replace with your own details)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tachs_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search query
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Prepare and execute the search query
$sql = "SELECT * FROM products WHERE name LIKE '%" . $conn->real_escape_string($query) . "%'";
$result = $conn->query($sql);

if (!$result) {
    die("Error in query: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .product-box {
            border: 1px solid #ddd;
            padding: 16px;
            margin-bottom: 20px;
            border-radius: 8px;
            text-align: center;
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(250px,auto));
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); 
        }
        .product-img {
            width: 100%;
            height: auto;
        }
        .rating {
            margin: 10px 0;
        }
        .star {
            font-size: 20px;
            color: gold;
        }
        .rating-value {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2>Search Results</h2>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Handle case where rating might be NULL
                $rating = isset($row['rating']) ? number_format($row['rating'], 1) : 'N/A';

                echo "<div class='product-box'>
                        <div class='new'><span>New</span></div>
                        <a href='product" . htmlspecialchars($row['id']) . ".html'><img src='" . htmlspecialchars($row['image']) . "' alt='' class='product-img'></a>
                        <i class='fa fa-heart heart-icon' onclick='toggleFavorite(this)'></i>
                        <h2 class='product-title'>" . htmlspecialchars($row['name']) . "</h2>
                        <span class='price'>₦" . number_format($row['price'], 2) . "</span>
                        <div class='rating'>
                            <span class='star'>&#9733;</span>
                            <span class='star'>&#9733;</span>
                            <span class='star'>&#9733;</span>
                            <span class='star'>&#9733;</span>
                            <span class='star'>&#9733;</span>
                            <span class='rating-value'><span class='ratingValue'>" . $rating . "</span></span>
                        </div>
                        <i class='bx bxs-shopping-bag add-cart'></i>
                      </div>";
            }
        } else {
            echo "<div class='alert alert-warning'>No results found.</div>";
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
// Close connection
$conn->close();
?>
