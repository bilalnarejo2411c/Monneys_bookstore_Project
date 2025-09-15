<?php 
session_start();
?>

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
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      color: transparent;
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

    /* Dropdown */
    .dropdown-menu {
      position: absolute;
      top: 40px;
      left: 0;
      background: #fff;
      border-radius: 8px;
      min-width: 180px;
      box-shadow: 0px 6px 12px rgba(0,0,0,0.2);
      display: none;
      flex-direction: column;
      padding: 10px 0;
      z-index: 999;
    }

    .dropdown-menu a {
      padding: 10px 20px;
      display: block;
      color: #333;
      font-size: 15px;
      text-decoration: none;
      transition: 0.3s;
    }

    .dropdown-menu a:hover {
      background: #f1c40f;
      color: #000;
    }

    .nav-links li:hover .dropdown-menu {
      display: flex;
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

      .dropdown-menu {
        position: static;
        box-shadow: none;
        background: transparent;
      }

      .dropdown-menu a {
        color: #fff;
        padding: 8px 0 8px 15px;
      }

      .dropdown-menu a:hover {
        background: rgba(241, 196, 15, 0.2);
        color: #f1c40f;
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

    /* dynamically name ka colour */

    .username-link {
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 3px; /* thoda space */
}

/* "Hi" ka style */
.greeting {
    color: #fff; 
    font-size: 16px;
    font-weight: 500;
}

/* Username ka style */
.username {
    color: #f1c40f; 
    font-size: 18px; /* thoda bada */
    font-weight: 700; /* thoda bold */
    text-transform: capitalize; /* agar first letter capital ho */
}

/* Hover effect */
.username-link:hover .username {
    color: #fff; 
}

.username-link:hover .greeting {
    color: #f1c40f;
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

        <!-- Books Dropdown -->
        <li>
            <a href="#" class="active">Books ▼</a>
            <div class="dropdown-menu">
                <a href="#" class="active">Fictional</a>
                <a href="#" class="active">Non-Fiction</a>
                <a href="GrowthSec.php" class="active">Growth</a>
                <a href="#" class="active">Science</a>
                <a href="#" class="active">Romance</a>
            </div>
        </li>

        <li><a href="competition.php" class="active">Competition</a></li>
        <li><a href="contact.php" class="active">ContactUs</a></li>
        <li><a href="#" class="active">Cart🛒</a></li>

        <!-- Dynamic Username -->
      <!-- Dynamic Username -->
<li class="active dynamic">
    <?php
        if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
            // username <a> ke andar
           echo '<a href="#" class="username-link">
                    <span class="greeting">Hi </span>
                    <span class="username">' . htmlspecialchars($_SESSION['username']) . '</span>
                  </a>';
        } else {
            echo "<a href='login.php' class='active'>Signin/Signup</a>";
        }
    ?>
</li>

        <!-- Search box -->
        <li>
            <div class="search-box">
                <input type="text" placeholder="Search books, authors...">
                <button>📚</button>
            </div>
        </li>
    </ul>
</nav>

<script>
function toggleMenu() {
    document.querySelector(".nav-links").classList.toggle("show");
}
</script>

  <hr>
</body>
</html>
