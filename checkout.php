<?php include('includes/navbar.php'); ?>
<?php
$connect = mysqli_connect("localhost", "root", "", "monneys_bookstore");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['book_id'])) {
    $book_id = intval($_POST['book_id']);

    // Book details fetch karo
    $result = mysqli_query($connect, "SELECT * FROM books WHERE book_id=$book_id LIMIT 1");
    $book = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <style>
     /* ✅ Full layout ke liye flexbox */
     html, body {
        height: 100%;
        margin: 0;
        padding: 0;
     }
     body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg,  #541212,#154D71);
        display: flex;
        flex-direction: column;
     }
     .content {
        flex: 1; /* 👈 ye footer ko neeche push karega */
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding: 40px 0;
     }

    /* Checkout Box */
    .checkout-container {
        width: 650px;
        padding: 30px;
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(12px);
        border-radius: 18px;
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.5);
        color: #fff;
    }

    .book-details {
        display: flex;
        gap: 20px;
        margin-bottom: 25px;
    }

    .book-details img {
        width: 160px;
        border-radius: 10px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.6);
    }

    .book-info h2 {
        margin: 0;
        font-size: 1.8rem;
        background: linear-gradient(45deg, #FFD700, #FF4500);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .book-info p {
        margin: 6px 0;
        font-size: 1rem;
        color: #ddd;
    }

    /* ✅ Premium Price Style */
    .book-info .price {
        font-size: 1.6rem;
        font-weight: bold;
        margin-top: 12px;
        background: linear-gradient(90deg, #FFD700, #FF8C00, #FF4500);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 0 0 10px rgba(255, 165, 0, 0.5);
        display: inline-block;
    }

    .form-section label {
        display: block;
        margin-top: 12px;
        font-weight: bold;
        font-size: 0.95rem;
        color: #FFD700;
    }

    .form-section input, 
    .form-section select {
        width: 100%;
        padding: 10px;
        margin-top: 6px;
        border-radius: 8px;
        border: none;
        outline: none;
        font-size: 1rem;
    }

    /* Shimmer Button */
    .form-section button {
        margin-top: 20px;
        padding: 14px;
        width: 100%;
        background: linear-gradient(135deg,#28a745,#00c851);
        color: #fff;
        font-size: 17px;
        font-weight: bold;
        border: none;
        border-radius: 40px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .form-section button:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    }

    .form-section button::before {
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
        animation: shimmer 2.5s infinite;
    }

    @keyframes shimmer {
        100% { left: 150%; }
    }

    /* Hidden fields box */
    .extra-fields {
        max-height: 0;
        overflow: hidden;
        margin-top: 0;
        padding: 0 15px;
        background: rgba(255,255,255,0.05);
        border-radius: 10px;
        transition: all 0.4s ease;
    }

    .extra-fields.show {
        max-height: 300px;
        margin-top: 15px;
        padding: 15px;
    }
    </style>
</head>
<body>

<div class="content">
<div class="checkout-container">
    <?php if (!empty($book)) { ?>
        <!-- Book Details -->
        <div class="book-details">
            <img src="<?php echo $book['image'] ?? 'no-image.jpg'; ?>" alt="Book Image">
            <div class="book-info">
                <h2><?php echo htmlspecialchars($book['title']); ?></h2>
                <p><strong>Author:</strong> <?php echo htmlspecialchars($book['author']); ?></p>
                <p><strong>Description:</strong> <?php echo htmlspecialchars($book['description']); ?></p>
                <p class="price">💰 $<?php echo number_format($book['price'], 2); ?></p>
            </div>
        </div>
    <?php } else { ?>
        <p>❌ Book not found!</p>
    <?php } ?>

    <!-- Checkout Form -->
    <div class="form-section">
        <form method="post" action="checkout_process.php">
            <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Payment Method:</label>
            <select name="payment_method" id="payment-method" required>
                <option value="">-- Select Payment Method --</option>
                <option value="Credit Card">Credit Card</option>
                <option value="PayPal">PayPal</option>
                <option value="Cash on Delivery">Cash on Delivery</option>
            </select>

            <!-- PayPal extra inputs -->
            <div id="paypal-fields" class="extra-fields">
                <label>PayPal Email:</label>
                <input type="email" name="paypal_email">

                <label>PayPal Password:</label>
                <input type="password" name="paypal_password">
            </div>

            <!-- Credit Card extra inputs -->
            <div id="creditcard-fields" class="extra-fields">
                <label>Card Number:</label>
                <input type="text" name="card_number" maxlength="16">

                <label>Expiry Date:</label>
                <input type="text" name="expiry_date" placeholder="MM/YY">

                <label>CVV:</label>
                <input type="password" name="cvv" maxlength="3">
            </div>

            <button type="submit" name="confirm_payment">✅ Confirm Payment</button>
        </form>
    </div>
</div>
</div>

<!-- Footer hamesha neeche chipka rahega -->
<?php include('includes/footer.php'); ?>

<script>
    const paymentMethod = document.getElementById('payment-method');
    const paypalFields = document.getElementById('paypal-fields');
    const creditFields = document.getElementById('creditcard-fields');
    paymentMethod.addEventListener('change', function() {
        paypalFields.classList.remove('show');
        creditFields.classList.remove('show');

        if (this.value === 'PayPal') {
            paypalFields.classList.add('show');
        } else if (this.value === 'Credit Card') {
            creditFields.classList.add('show');
        }
    });
</script>
</body>
</html>

