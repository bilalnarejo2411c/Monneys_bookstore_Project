<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Premium Footer</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: "Poppins", sans-serif;
    }
    

    .footer {
      background: linear-gradient(120deg, #18230F, #541212);
      color: #fff;
      padding: 20px 40px;
      text-align: center;
    }

    .footer-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      max-width: 1200px;
      margin: auto;
    }

    .footer-links {
      display: flex;
      gap: 20px;
    }

    .footer-links a {
      color: #fff;
      text-decoration: none;
      transition: 0.3s;
    }

    .footer-links a:hover {
      color: #ffcc70;
    }

    .footer-social {
      display: flex;
      gap: 15px;
    }

    .footer-social a {
      color: #fff;
      font-size: 18px;
      position: relative;
      overflow: hidden;
      display: inline-block;
    }

    /* Shimmer Effect */
    .footer-social a::before {
      content: "";
      position: absolute;
      top: 0;
      left: -75%;
      width: 50%;
      height: 100%;
      background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.6), transparent);
      transform: skewX(-20deg);
    }

    .footer-social a:hover::before {
      animation: shimmer 0.8s forwards;
    }

    @keyframes shimmer {
      100% {
        left: 125%;
      }
    }

    .footer-contact {
      font-size: 14px;
    }
    .logo {
      font-family: "Cormorant Garamond", serif;
      font-size: 20px;
      font-weight: 600;
      letter-spacing: 2px;
      background: linear-gradient(45deg, #d4af37, #f1c40f, #d4af37);
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      color: transparent;
      text-shadow: 1px 1px 4px rgba(0,0,0,0.6);
      cursor: pointer;
    }
.active {
      font-weight: 600;
    }

  </style>
</head>
<body>
<hr>
  <footer class="footer">
    <div class="footer-content">
      <div class="logo">Mooney's © 2025</div>

      <div class="footer-links">
        <a href="" class="active">Karachi Branch</a>
        <a href=""class="active">Lahore Branch</a>
        <a href=""class="active">Mooneysbooks@aptechgdn.net</a>
        <span class="active">604 669 0001</span>
      </div>

      <div class="footer-social">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="mailto:benton@bentonscheese.com"><i class="fas fa-envelope"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
      </div>
    </div>
  </footer>

</body>
</html>
