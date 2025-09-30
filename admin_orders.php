

<?php
$connect = mysqli_connect("localhost", "root", "", "monneys_bookstore");

if (!$connect) {
    die("DB connection failed");
}

$user_id = $_SESSION['user_id'] ?? 1;

/* ---------------- Add to Cart (from product page) ---------------- */
if (isset($_POST['buy_now']) && isset($_POST['book_id'])) {
    $book_id = intval($_POST['book_id']);
    $quantity = intval($_POST['quantity']);

    $check = mysqli_query($connect, "SELECT * FROM cart WHERE user_id=$user_id AND book_id=$book_id");
    if (mysqli_num_rows($check) > 0) {
        mysqli_query($connect, "UPDATE cart SET quantity = quantity + $quantity WHERE user_id=$user_id AND book_id=$book_id");
    } else {
        mysqli_query($connect, "INSERT INTO cart (user_id, book_id, quantity) VALUES ($user_id, $book_id, $quantity)");
    }
}

/* ---------------- Delete from Cart ---------------- */
if (isset($_POST['delete_id'])) {
    $book_id = intval($_POST['delete_id']);
    mysqli_query($connect, "DELETE FROM cart WHERE user_id=$user_id AND book_id=$book_id");
}

/* ---------------- Confirm Order ---------------- */
if (isset($_POST['confirm_id'])) {
    $book_id = intval($_POST['confirm_id']);
    mysqli_query($connect, "INSERT INTO orders (user_id, book_id, quantity) 
        SELECT user_id, book_id, quantity FROM cart WHERE user_id=$user_id AND book_id=$book_id");
    mysqli_query($connect, "DELETE FROM cart WHERE user_id=$user_id AND book_id=$book_id");
}

/* ---------------- Show Cart Data ---------------- */
$query = mysqli_query($connect, "SELECT c.book_id, c.quantity, b.title, b.author, b.description, b.image, b.price 
                                FROM cart c 
                                JOIN books b ON c.book_id=b.book_id 
                                WHERE c.user_id=$user_id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Cart</title>
  <style>
    body { 
      font-family: 'Poppins', sans-serif; 
      background: linear-gradient(135deg, #541212, #154D71); 
      margin:0;
      color:#fff;
      display:flex;
      flex-direction:column;
      min-height:100vh; /* full screen height */
    }

    .container {
      flex:1; /* push footer down */
      padding:40px;
      max-width:1200px;
      margin:auto;
    }

    h1 {
      text-align:center;
      margin-bottom:30px;
      font-size:2.5rem;
      background: linear-gradient(45deg,#FFD700,#FF4500);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .cart-box { 
      background: rgba(255,255,255,0.08);
      backdrop-filter: blur(12px);
      padding:20px; 
      border-radius:16px; 
      margin-bottom:20px; 
      display:flex; 
      align-items:center; 
      gap:20px; 
      box-shadow:0 8px 25px rgba(0,0,0,0.4);
      transition: transform 0.3s ease;
    }

    .cart-box:hover { transform: translateY(-5px); }

    .cart-box img { 
      width:140px; 
      height:180px; 
      object-fit:cover; 
      border-radius:10px; 
      box-shadow:0 5px 15px rgba(0,0,0,0.5);
    }

    .details { flex:1; }
    h2 { margin:0 0 8px; font-size:1.5rem; color:#FFD700; }
    p { margin:4px 0; font-size:0.95rem; }

    form { display:inline; }

    button {
      padding:12px 20px; 
      border:none; 
      border-radius:40px; 
      cursor:pointer; 
      font-weight:bold; 
      position:relative; 
      overflow:hidden;
      margin-right:8px;
      font-size:0.95rem;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    button:hover {
      transform: translateY(-3px);
      box-shadow:0 8px 20px rgba(0,0,0,0.3);
    }

    button::before {
      content:"";
      position:absolute;
      top:0;
      left:-150%;
      width:200%;
      height:100%;
      background: linear-gradient(
        120deg,
        transparent 30%,
        rgba(255,255,255,0.6) 50%,
        transparent 70%
      );
      animation: shimmer 2.5s infinite;
    }

    @keyframes shimmer { 100% { left:150%; } }

    .confirm { background: linear-gradient(135deg,#28a745,#00c851); color:#fff; }
    .delete { background: linear-gradient(135deg,#dc3545,#ff4444); color:#fff; }
  </style>
</head>
<body>
  <div class="container">
  

    <?php if (mysqli_num_rows($query) > 0) { ?>
      <?php while ($row = mysqli_fetch_assoc($query)) { ?>
        <div class="cart-box">
          <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="">
          <div class="details">
            <h2><?php echo htmlspecialchars($row['title']); ?></h2>
            <p><b>Author:</b> <?php echo htmlspecialchars($row['author']); ?></p>
            <p><b>Description:</b> <?php echo htmlspecialchars($row['description']); ?></p>
            <p><b>Price:</b> <?php echo $row['price']; ?> PKR</p>
            <p><b>Quantity:</b> <?php echo $row['quantity']; ?></p>
            <p><b>Total:</b> <?php echo $row['price'] * $row['quantity']; ?> PKR</p>
<!-- Confirm Button -->
<form method="post" action="">
    <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
    <button type="submit" class="confirm">✅ Confirm</button>
</form>

<!-- Delete Button -->
<form method="post" action="">
    <input type="hidden" name="delete_id" value="<?php echo $row['book_id']; ?>">
    <button type="submit" class="delete">❌ Delete</button>
</form>

          </div>
        </div>
      <?php } ?>
    <?php } else { ?>
      <p style="text-align:center;font-size:1.2rem;">No orders Avalible</p>
    <?php } ?>
  </div>
</body>
</html>
