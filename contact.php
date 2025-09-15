
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - Book Haven</title>
  <style>
    body {
      margin: 0;
      font-family: "Poppins", sans-serif;
     background: linear-gradient(135deg,  #541212,#154D71);
    }
.active{
      font-weight: 600;
    }
    .container {
      display: flex;
      max-width: 950px;
      margin: 60px auto;
      background: #fff;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 12px 30px rgba(0,0,0,0.15);
      transition: 0.4s ease-in-out;
    }

    .container:hover {
      transform: translateY(-5px);
      box-shadow: 0 16px 35px rgba(0,0,0,0.2);
    }

    .image-box {
      flex: 1;
      position: relative;
    }

    .image-box img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: brightness(90%);
      transition: 0.5s;
    }

    .image-box::after {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, rgba(0,0,0,0.2), rgba(0,0,0,0.4));
    }

    .form-box {
      flex: 1;
      padding: 50px;
      background: #fdfdfd;
      display: flex;
      flex-direction: column;
      justify-content: center;
      position: relative;
      z-index: 1;
    }

    h2 {
      margin-bottom: 25px;
      font-size: 28px;
      color: #2c3e50;
      position: relative;
    }

    h2::after {
      content: "";
      width: 70px;
      height: 3px;
      background: linear-gradient(45deg, #2c3e50, #3498db);
      position: absolute;
      left: 0;
      bottom: -8px;
      border-radius: 2px;
    }

    form input, form textarea {
      width: 100%;
      padding: 14px;
      margin: 12px 0;
      border: 1px solid #ddd;
      border-radius: 10px;
      font-size: 15px;
      transition: 0.3s;
      outline: none;
      background: #fafafa;
    }

    form input:focus, form textarea:focus {
      border-color: #3498db;
      box-shadow: 0 0 8px rgba(52,152,219,0.3);
      background: #fff;
    }

    /* Shimmer Button */
    button {
      width: 100%;
      padding: 14px;
      background: linear-gradient(135deg,  #541212,#154D71);
      color: #fff;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      font-size: 16px;
      font-weight: 600;
      position: relative;
      overflow: hidden;
    }

    button::before {
      content: "";
      position: absolute;
      top: 0;
      left: -150%;
      width: 200%;
      height: 100%;
      background: linear-gradient(120deg, transparent, rgba(255,255,255,0.5), transparent);
      transform: skewX(-20deg);
      animation: shimmer 2.5s infinite;
    }

    @keyframes shimmer {
      0% { left: -150%; }
      50% { left: 150%; }
      100% { left: 150%; }
    }

    button:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.25);
    }

    .info {
      margin-top: 25px;
      font-size: 14px;
      color: #555;
    }

    .social {
      margin-top: 20px;
    }

    .social a {
      margin-right: 12px;
      text-decoration: none;
      font-size: 22px;
      color: #3498db;
      transition: 0.3s;
    }

    .social a:hover {
      color: #2c3e50;
      transform: scale(1.2) rotate(5deg);
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Left Side Image -->
    <div class="image-box">
      <img src="images/Contactpic.jpg" alt="Books"/>
    </div>

    <!-- Right Side Form -->
    <div class="form-box">
      <h2>Contact Us</h2>
      <form action="data/contactprocess.php" method="POST">
        <label class="active">Full Name</label>
        <input type="text" name="name" required>

        <label class="active">Email</label>
        <input type="email" name="email" required>

        <label class="active">Message</label>
        <textarea name="message" rows="5" required></textarea>

        <button type="submit" name="submit" class="active">✨ Contact Us</button>
      </form>

      <div class="info">
        <p><strong>Email:</strong>Mooneysbooks@aptechgdn.net</p>
        <p><strong>Based in:</strong> Karachi, Pakistan</p>
      </div>

      <!-- Social Icons -->
      <div class="social">
        <a href=""></a>
        <a href="#">🐦</a>
        <a href="#">📸</a>
      </div>
    </div>
  </div>
</body>
</html>
