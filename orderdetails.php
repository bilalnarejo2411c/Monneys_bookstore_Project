<?php include("includes/navbar.php"); ?>

<?php
$connect = mysqli_connect("localhost", "root", "", "monneys_bookstore");

if (isset($_GET['id'])) {
    $book_id = intval($_GET['id']);
    $query = "SELECT * FROM books WHERE book_id = $book_id LIMIT 1";
    $result = mysqli_query($connect, $query);
    $book = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $book['title']; ?> - Details</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    /* Sticky Footer Fix */
    html, body {
      height: 100%;
      margin: 0;
      display: flex;
      flex-direction: column;
    }

    body {
      font-family: 'Poppins', sans-serif;
background: linear-gradient(135deg,  #541212,#154D71);
      color: #fff;
    }

    .page-wrapper {
      flex: 1; /* Footer neeche push karne ke liye */
      padding: 100px 20px 60px;
      max-width: 1300px;
      margin: 0 auto;
    }

    .product-container {
      display: grid;
      grid-template-columns: 1fr 1.2fr;
      gap: 40px;
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 20px 60px rgba(0,0,0,0.4);
      animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .left {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .left img {
    width: 100%;
    height: 500px;         /* fix height sab images ki */
    object-fit: contain;   /* image andar fit hogi, cut nahi hogi */
    border-radius: 15px;
    background: #fff;      /* transparent ya chhoti image ke back pe safed ya koi color */
    box-shadow: 0 10px 30px rgba(0,0,0,0.4);
    transition: transform 0.3s ease;
    }

    .left img:hover {
      transform: scale(1.05);
    }

    .right h1 {
      font-size: 2.5rem;
      margin-bottom: 10px;
      background: linear-gradient(45deg, #f9d423, #ff4e50);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .right p {
      margin: 10px 0;
    }

    .price {
      font-size: 26px;
      font-weight: bold;
      color: #00ffcc;
      margin: 20px 0;
    }

    .desc {
      font-size: 1rem;
      line-height: 1.6;
      margin-bottom: 25px;
    }

 form {
  display: flex;
  flex-direction: column; /* side-by-side ki jagah neeche neeche */
  align-items: flex-start; /* left align */
  gap: 10px;
}



    input[type=number] {
      width: 100px;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 1rem;
    }

    /* Premium Button with Shimmer */
    .btn {
        margin-top:20px;
      flex: 1;
      padding: 16px 30px;
      font-size: 1.1rem;
      font-weight: bold;
      border: none;
      border-radius: 40px;
      cursor: pointer;
      color: #fff;
background: linear-gradient(135deg,  #541212,#154D71);
      position: relative;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    }

    .btn::before {
      content: "";
      position: absolute;
      top: 0;
      left: -150%;
      width: 200%;
      height: 100%;
      background: linear-gradient(
        120deg,
        transparent 30%,
        rgba(255,255,255,0.6) 50%,
        transparent 70%
      );
      animation: shimmerBtn 2.5s infinite;
    }

    @keyframes shimmerBtn {
      100% { left: 150%; }
    }

    /* Footer always bottom */
    footer {
      margin-top: auto;
    }
  </style>
</head>
<body>
  <div class="page-wrapper">
    <div class="product-container">
      <!-- Left Image -->
      <div class="left">
        <img src="<?php echo $book['image']; ?>" alt="<?php echo $book['title']; ?>">
      </div>

      <!-- Right Details -->
      <div class="right">
        <h1><?php echo $book['title']; ?></h1>
        <p><b>Author:</b> <?php echo $book['author']; ?></p>
        <p class="price"><?php echo $book['price']; ?> PKR</p>
        <p class="desc"><?php echo $book['description']; ?></p>

        <form method="post" action="add_to_cart.php">
          <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">
          <label>Quantity:</label>
          <input type="number" name="quantity" value="1" min="1">
          <button type="submit" class="btn">🛒 Add to Cart</button>
        </form>
      </div>
    </div>
  </div>

  <?php include("includes/footer.php"); ?>
</body>
</html>
