<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mooney's Bookstore</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: "Poppins", sans-serif;
    background-color;
    line-height: 1.6;
    color: #333;
  }

    /* Navbar */
    nav {
      width: 100%;
      background: linear-gradient(120deg, #18230F, #541212);
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0px 4px 10px rgba(0,0,0,0.15);
      position: sticky;
      top: 0;
      z-index: 1000;
      flex-wrap: wrap;
    }

   .logo {
  font-family: "Cormorant Garamond", serif;
  font-size: 32px;
  font-weight: 600;
  letter-spacing: 2px;
  background: linear-gradient(45deg, #d4af37, #f1c40f, #d4af37);
  background-clip: text;               /* Standard property */
  -webkit-background-clip: text;       /* Chrome / Safari */
  -webkit-text-fill-color: transparent; /* Chrome / Safari */
  color: transparent;                   /* Firefox ke liye */
  text-shadow: 1px 1px 4px rgba(0,0,0,0.6);
  cursor: pointer;
}

    .nav-links {
      list-style: none;
      display: flex;
      gap: 25px;
      align-items: center;
    }

    .nav-links li {
      position: relative;
    }

    .nav-links a {
      text-decoration: none;
      color: #fff;
      font-size: 16px;
      font-weight: 500;
      padding: 6px 8px;
      transition: all 0.3s ease-in-out;
    }

    /* Hover underline effect */
    .nav-links a::after {
      content: '';
      position: absolute;
      left: 0;
      bottom: -4px;
      width: 0%;
      height: 2px;
      background: #f1c40f;
      transition: width 0.3s;
    }

    .nav-links a:hover::after {
      width: 100%;
    }

    /* Active link */
    .nav-links .active {
      font-weight: 600;
    }

    /* Search box */
    .search-box {
      display: flex;
      align-items: center;
      background: #fff;
      padding: 5px 12px;
      border-radius: 30px;
      box-shadow: 0px 3px 8px rgba(0,0,0,0.15);
    }

    .search-box input {
      border: none;
      outline: none;
      padding: 6px 8px;
      font-size: 14px;
      border-radius: 20px;
      flex: 1;
      font-family: "Poppins", sans-serif;
    }

    .search-box button {
      border: none;
      background: transparent;
      cursor: pointer;
      font-size: 18px;
      color: #541212;
      transition: 0.3s;
    }

    .search-box button:hover {
      color: #ff9800;
    }

    /* Toggle Button */
    .menu-toggle {
      display: none;
      font-size: 28px;
      color: #fff;
      cursor: pointer;
    }

    /* Responsive */
    @media (max-width: 900px) {
      .menu-toggle {
        display: block;
      }

      .nav-links {
        flex-direction: column;
        gap: 18px;
        position: absolute;
        top: 65px;
        right: 0;
        background: linear-gradient(135deg, #715A5A, #541212);
        width: 250px;
        padding: 20px;
        display: none;
        border-radius: 0 0 8px 8px;
      }

      .nav-links.show {
        display: flex;
      }

      .search-box {
        width: 100%;
        padding: 6px 10px;
      }

      .search-box input {
        width: 100%;
      }

      .search-box button {
        font-size: 20px;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav>
    <div class="logo">Mooney's</div>
    <span class="menu-toggle" onclick="toggleMenu()">☰</span>
    <ul class="nav-links">
      <li><a href="#" class="active">Home</a></li>
      <li><a href="#"class="active">Competition</a></li>
      <li><a href="#"class="active">SignIN/SignUP</a></li>
      <li><a href="contact.php"class="active">Contact</a></li>
            <li><a href="#"class="active">Cart🛒</a></li>
      <!-- Search box -->
      <li>
        <div class="search-box">
          <input type="text" placeholder="Search books, authors...">
          <button>📚</button>
        </div>
      </li>
    </ul>
  </nav>
  <!-- Script -->
  <script>
    function toggleMenu() {
      document.querySelector(".nav-links").classList.toggle("show");
    }
  </script>
<hr>
</body>
</html>
