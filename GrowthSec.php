<?php include("includes/navbar.php");?>
<?php include("includes/Categorie.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>eBook - Growth Books</title>
  
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #541212, #154D71);
      color: #333;
    }

    h1.section-heading {
      text-align: center;
      font-family: 'Playfair Display', serif;
      font-size: 2.5rem;
      color: #fff;
      margin-top: 30px;
      margin-bottom: 10px;
    }

    .container {
      max-width: 1100px;
      margin: 40px auto;
      padding: 20px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }

    .book-details {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
    }

    .book-cover {
      flex: 1 1 300px;
    }
.book-cover img {
  width: 100%;
  max-width: 250px; /* 👈 image ki width limit kardi */
  height: auto;
  border-radius: 12px;
  box-shadow: 0 6px 15px rgba(0,0,0,0.15);
  object-fit: cover; /* 👈 image stretch hone se bachegi */
}

    .book-info {
      flex: 2 1 500px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .book-title {
      font-family: 'Playfair Display', serif;
      font-size: 2.2rem;
      font-weight: 700;
      margin-bottom: 10px;
      color: #222;
    }

    .book-author {
      font-size: 1.1rem;
      color: #666;
      margin-bottom: 15px;
    }

    .book-price {
      font-size: 1.5rem;
      color: #6d28d9;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .book-description {
      font-size: 1rem;
      line-height: 1.7;
      color: #444;
      margin-bottom: 25px;
    }

    .actions {
      display: flex;
      gap: 15px;
    }

    /* Premium Buttons */
    .btn {
      position: relative;
      padding: 12px 26px;
      border: none;
      border-radius: 10px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      color: white;
      overflow: hidden;
      z-index: 0;
      transition: transform 0.2s ease;
    }

    .btn::before {
      content: "";
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(
        120deg,
        rgba(255, 255, 255, 0.3) 0%,
        rgba(255, 255, 255, 0.05) 40%,
        rgba(255, 255, 255, 0) 70%
      );
      transform: rotate(25deg);
      animation: shimmer 2.5s infinite;
    }

    @keyframes shimmer {
      0% { transform: translateX(-100%) rotate(25deg); }
      100% { transform: translateX(100%) rotate(25deg); }
    }

    .btn:hover {
      transform: translateY(-2px) scale(1.03);
      box-shadow: 0 6px 18px rgba(0,0,0,0.2);
    }

    .btn-download,
    .btn-buy {
      background: linear-gradient(135deg, #541212,#154D71);
    }

    @media (max-width: 768px) {
      .book-details {
        flex-direction: column;
        align-items: center;
      }
      .book-info {
        align-items: center;
        text-align: center;
      }
      .actions {
        flex-direction: column;
        width: 100%;
      }
      .btn {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <hr>
  <br>
  <h1 class="section-heading">📚 Growth Books</h1>
  <br>
  <hr>
  <!-- Book 1 -->
  <div class="container">
    <div class="book-details">
      <div class="book-cover">
        <img src="images/48.png" alt="The Power of Now">
      </div>
      <div class="book-info">
        <div>
          <h1 class="book-title">The Power of Now</h1>
          <p class="book-author">by Eckhart Tolle</p>
          <p class="book-price">$9.99</p>
          <p class="book-description">
            A guide to spiritual enlightenment, this book explores powerful ideas about being present and letting go of ego.
          </p>
        </div>
        <div class="actions">
          <button class="btn btn-download">📥 Download Sample</button>
          <button class="btn btn-buy">🛒 Buy EBook</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Book 2 -->
  <div class="container">
    <div class="book-details">
      <div class="book-cover">
        <img src="images/49.png" alt="Atomic Habits">
      </div>
      <div class="book-info">
        <div>
          <h1 class="book-title">Atomic Habits</h1>
          <p class="book-author">by James Clear</p>
          <p class="book-price">$12.99</p>
          <p class="book-description">
            Learn how tiny changes make a big difference. Build good habits, break bad ones, and master the behaviors that lead to lasting success.
          </p>
        </div>
        <div class="actions">
          <button class="btn btn-download">📥 Download Sample</button>
          <button class="btn btn-buy">🛒 Buy EBook</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Book 3 -->
  <div class="container">
    <div class="book-details">
      <div class="book-cover">
        <img src="images/50.png" alt="Deep Work">
      </div>
      <div class="book-info">
        <div>
          <h1 class="book-title">Deep Work</h1>
          <p class="book-author">by Cal Newport</p>
          <p class="book-price">$11.49</p>
          <p class="book-description">
            Deep Work is an essential guide to focused success in a distracted world. Learn how to cultivate focus and eliminate distractions for more productivity.
          </p>
        </div>
        <div class="actions">
          <button class="btn btn-download">📥 Download Sample</button>
          <button class="btn btn-buy">🛒 Buy EBook</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Book 4 -->
  <div class="container">
    <div class="book-details">
      <div class="book-cover">
        <img src="images/51.png" alt="Think Like a Monk">
      </div>
      <div class="book-info">
        <div>
          <h1 class="book-title">Think Like a Monk</h1>
          <p class="book-author">by Jay Shetty</p>
          <p class="book-price">$10.99</p>
          <p class="book-description">
            Discover how to overcome negativity, stop overthinking, and find peace with the powerful wisdom of monks, made practical by Jay Shetty.
          </p>
        </div>
        <div class="actions">
          <button class="btn btn-download">📥 Download Sample</button>
          <button class="btn btn-buy">🛒 Buy EBook</button>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
