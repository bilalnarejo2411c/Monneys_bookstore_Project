<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Competition Section</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .competition-section {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #154D71, #541212);
      color: white;
      padding: 50px 20px;
    }

    .competition-content {
      flex: 1 1 500px;
      padding: 20px;
    }

    .competition-content h2 {
      font-size: 2.5rem;
      margin-bottom: 20px;
    }

    .competition-content p {
      font-size: 1.1rem;
      margin-bottom: 30px;
      line-height: 1.6;
    }

    .competition-content .btn {
      display: inline-block;
      padding: 12px 25px;
      background: #f1c40f;
      color: #000;
      font-weight: bold;
      border-radius: 6px;
      text-decoration: none;
      transition: 0.3s;
    }

    .competition-content .btn:hover {
      background: #d4af37;
    }

    .competition-image {
      flex: 1 1 400px;
      padding: 20px;
    }

    .competition-image img {
      width: 100%;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.5);
    }

    @media (max-width: 768px) {
      .competition-section {
        flex-direction: column;
        text-align: center;
      }
    }
  </style>
</head>
<body>

  <!-- Competition Section -->
  <section class="competition-section">
    <!-- Image Left -->
    <div class="competition-image">
      <img src="images/comp.png" alt="Book Competition">
    </div>

    <!-- Text Right -->
    <div class="competition-content">
      <h2>Join Our Book Competition!</h2>
      <p>Show your creativity and knowledge by participating in our exciting book competition. Register now and get a chance to win amazing prizes!</p>
      <a href="register.html" class="btn">Register Now</a>
    </div>
  </section>

</body>
</html>
