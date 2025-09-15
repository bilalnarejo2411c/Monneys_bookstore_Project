<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mooney's Bookstore</title>
</head>
<body>
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
      cursor: pointer;
    }

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

</style>
</head>
<body>
  <!-- Navbar -->
  <nav>
    <div class="logo">Mooney's</div>
    <span class="menu-toggle" onclick="toggleMenu()">☰</span>
    <ul class="nav-links" class="active">
      <li><a href="#">Home</a></li>
      <li>
        <a href="#">Books ▼</a>
        <div class="dropdown-menu">
          <a href="#" class="active openModal active" data-title="Sign In / Sign Up">Fictional</a>
          <a href="#" class="active openModal active" data-title="Sign In / Sign Up">Non-Fiction</a>
          <a href="GrowthSec.php" class="active openModal active" data-title="Sign In / Sign Up">Growth</a>
          <a href="#" class="active openModal active" data-title="Sign In / Sign Up">Science</a>
          <a href="#" class="active openModal active" data-title="Sign In / Sign Up">Romance</a>
        </div>
      </li>
      <li><a href="#"  class="active openModal active" data-title="Sign In / Sign Up">Competition</a></li>
      <!-- Trigger Modal -->
      <li><a href="#" class="active openModal" data-title="Sign In / Sign Up">SignIN/SignUP</a></li>
      <li><a href="#" class="active openModal active" data-title="Sign In / Sign Up">Contact</a></li>
      <li>
        <div class="search-box">
          <input type="text" placeholder="Search books, authors...">
          <button>📚</button>
        </div>
      </li>
    </ul>
  </nav>


<!-- Modal -->
  <style>
  .modal {
    display: none;
    position: fixed;
    z-index: 2000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.7);
    justify-content: center;
    align-items: center;
  }

  .modal-content {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border: 1px solid rgba(255,255,255,0.2);
    padding: 30px;
    border-radius: 15px;
    width: 380px;
    text-align: center;
    position: relative;
    animation: fadeIn 0.4s ease-in-out;
    box-shadow: 0px 8px 20px rgba(0,0,0,0.3);
  }

  @keyframes fadeIn {
    from {opacity: 0; transform: scale(0.9);}
    to {opacity: 1; transform: scale(1);}
  }

  .close {
    position: absolute;
    top: 12px;
    right: 18px;
    font-size: 24px;
    cursor: pointer;
    color: #fff;
    font-weight: bold;
  }

  /* Tab Buttons */
  .tab-buttons {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
    border-radius: 8px;
    overflow: hidden;
  }

  .tab-btn {
    flex: 1;
    padding: 12px;
    background: rgba(255,255,255,0.1);
    color: #fff;
    border: none;
    cursor: pointer;
    font-size: 15px;
    transition: 0.3s;
  }

  .tab-btn.active {
    background: linear-gradient(135deg, #541212, #7a1c1c);
    font-weight: bold;
  }

  .tab-btn:hover {
    background: rgba(255,255,255,0.2);
  }

  /* Forms */
  form {
    display: none;
    color: #fff;
    animation: slideIn 0.3s ease-in-out;
  }

  form.active {
    display: block;
  }

  @keyframes slideIn {
    from {opacity: 0; transform: translateY(15px);}
    to {opacity: 1; transform: translateY(0);}
  }

  form h2 {
    margin-bottom: 15px;
    color: #fff;
  }

  input {
    width: 85%;
    padding: 10px;
    margin: 8px 0;
    border: none;
    border-radius: 8px;
    outline: none;
    background: rgba(255,255,255,0.15);
    color: #fff;
    font-size: 14px;
  }

  input::placeholder {
    color: #ddd;
  }

  .btn {
    background: linear-gradient(135deg, #541212, #7a1c1c);
    color: #fff;
    padding: 10px 20px;
    border: none;
    margin-top: 15px;
    cursor: pointer;
    border-radius: 8px;
    transition: 0.3s;
    width: 90%;
  }

  .btn:hover {
    background: linear-gradient(135deg, #7a1c1c, #a83232);
  }
  </style>
<!-- Modal -->
<div id="myModal" class="modal">
  <div class="modal-content glass">
    <span class="close">&times;</span>

    <!-- Tab Buttons -->
    <div class="tab-buttons">
      <button class="tab-btn active" onclick="switchTab(event, 'loginForm')">Login</button>
      <button class="tab-btn" onclick="switchTab(event, 'signupForm')">Sign Up</button>
    </div>

    <!-- Login Form -->
    <form id="loginForm" class="active" method="POST" action="data/Enterance.php">
        <input type="hidden" name="action" value="login">
      <h2>Welcome Back</h2>
      <input type="email" name="email" placeholder="Email" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <button type="submit" class="btn" name="login">Login</button>
    </form>

    <!-- Signup Form -->
    <form id="signupForm" method="POST" action="data/Enterance.php">
        <input type="hidden" name="action" value="signup">
      <h2>Create Account</h2>
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="email" name="email" placeholder="Email" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <button type="submit" class="btn" name="signup">Sign Up</button>
    </form>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const modal = document.getElementById('myModal');
  if (!modal) return; // agar modal page pe nahi hai, ruk jao

  const closeBtn = modal.querySelector('.close');

  // Ensure <button> elements with .openModal don't act as submit buttons
  document.querySelectorAll('.openModal').forEach(el => {
    if (el.tagName.toLowerCase() === 'button') el.type = 'button';
  });

  // Use event delegation so dynamically added buttons also work
  document.body.addEventListener('click', function(e) {
    const btn = e.target.closest('.openModal');
    if (!btn) return;

    // Prevent default anchor/submit behaviour (reliable)
    if (typeof e.preventDefault === 'function') e.preventDefault();

    // Optional: set modal title from data-title
    const titleAttr = btn.getAttribute('data-title');
    const titleEl = modal.querySelector('#modalTitle') || modal.querySelector('h2');
    if (titleAttr && titleEl) titleEl.textContent = titleAttr;

    // Open modal
    modal.style.display = 'flex';
  });

  // Close handlers
  if (closeBtn) closeBtn.addEventListener('click', () => modal.style.display = 'none');

  window.addEventListener('click', function(e) {
    if (e.target === modal) modal.style.display = 'none';
  });

  // Make switchTab available globally if you call it inline (onclick="switchTab(event,'loginForm')")
  window.switchTab = function(event, formId) {
    // event could be undefined if called wrongly; guard it
    event = event || window.event;
    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
    // prefer currentTarget for inline onclick
    const target = event.currentTarget || event.target;
    if (target && target.classList) target.classList.add('active');

    // hide/show forms inside modal only
    modal.querySelectorAll('form').forEach(f => f.classList.remove('active'));
    const f = document.getElementById(formId);
    if (f) f.classList.add('active');
  };
});
</script>


 <hr>


  <!-- Qoute sec -->


  <section id="quotes" style="background: linear-gradient(135deg,  #541212,#154D71); padding:100px 20px; text-align:center;">
  <h2 style="font-family: 'Cormorant Garamond', serif; font-size:32px; margin-bottom:50px; color:#d4af37;">📖Quotes</h2>

  <div class="quote-slider">
    <div class="quote active">
      "A room without books is like a body without a soul." 
      <span class="author">– Cicero</span>
    </div>
    <div class="quote">
      "So many books, so little time." 
      <span class="author">– Frank Zappa</span>
    </div>
    <div class="quote">
      "The only thing that you absolutely have to know, is the location of the library." 
      <span class="author">– Albert Einstein</span>
    </div>
    <div class="quote">
      "Reading is to the mind what exercise is to the body." 
      <span class="author">– Joseph Addison</span>
    </div>
    <div class="quote">
      "Books are like people—you can only truly know them if you spend enough time inside their worlds." 
      <span class="author">– Joe Goldberg</span>
    </div>

    <!-- Arrows -->
    <div class="arrow prev" onclick="prevQuote()">&#10094;</div>
    <div class="arrow next" onclick="nextQuote()">&#10095;</div>
  </div>
</section>
<hr>

<style>
  .quote-slider {
    position: relative;
    max-width: 700px;
    margin: 0 auto;
    height: 150px;
  }

  .quote {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    padding: 30px 40px;
    background: linear-gradient(white);
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    font-family: 'Cormorant Garamond', serif;
    font-size: 22px;
    font-style: italic;
    color: #444;
    opacity: 0;
    transition: opacity 0.6s ease-in-out;
    z-index: 1;
  }

  .quote.active {
    opacity: 1;
    z-index: 2;
  }

  .quote .author {
    display: block;
    margin-top: 15px;
    font-weight: 600;
    font-style: normal;
    color: #b97f42;
    font-size: 18px;
  }

  /* Arrows */
  .arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    font-size: 30px;
    color: #b97f42;
    background: rgba(0,0,0,0.2);
    padding: 5px 10px;
    border-radius: 50%;
    cursor: pointer;
    user-select: none;
    transition: background 0.3s;
  }

  .arrow:hover {
    background: rgba(0,0,0,0.4);
  }

  .prev {
    left: -20px;
  }

  .next {
    right: -20px;
  }
</style>

<script>
  const quotes = document.querySelectorAll(".quote");
  let index = 0;

  function showQuote(i) {
    quotes.forEach((q, idx) => {
      q.classList.remove("active");
      if(idx === i) q.classList.add("active");
    });
  }

  function nextQuote() {
    index = (index + 1) % quotes.length;
    showQuote(index);
  }

  function prevQuote() {
    index = (index - 1 + quotes.length) % quotes.length;
    showQuote(index);
  }

  // Auto slide
  setInterval(nextQuote, 4000);
</script>



<!-- New arrivals -->
<hr>
<!-- New Arrivals Section -->
<section class="new-arrivals">
  <h2>✨ Trending Books ✨</h2>
  <div class="grid">
    <?php
    $connect = mysqli_connect("localhost", "root", "", "monneys_bookstore");

    $query = "SELECT * FROM trending_arrivals ORDER BY id ASC"; 
    $result = mysqli_query($connect, $query);

    while($row = mysqli_fetch_assoc($result)){
      echo "
      <div class='book-card'>
        <div class='image shimmer'>
          <img src='images/".$row['image']."' alt='".$row['name']."'>
        </div>
        <h3>".$row['name']."</h3>
        <p class='price'>".$row['price']."</p>
        <p class='desc'>".$row['discription']."</p>
       <a href='#'><button class='active openModal btn' data-title='Sign In / Sign Up'>Buy Now</button></a>
      </div>
      ";
    }
    ?>
  </div>
</section>

<style>
.new-arrivals {
  padding: 60px 20px;
  background:linear-gradient(135deg,  #541212,#154D71);
  text-align: center;
}

.new-arrivals h2 {
  font-size: 2rem;
  margin-bottom: 40px;
  background: linear-gradient(45deg,#d4af37,#d4af37,#d4af37);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-family:'Cormorant Garamond', serif;
}

.grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 25px;
}

.book-card {
  background: #fff;
  border-radius: 15px;
  padding: 15px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  position: relative;
  overflow: hidden;
  text-align: center;
}

.book-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 12px 30px rgba(0,0,0,0.15);
}

.book-card .image {
  width: 100%;
  height: 280px;
  border-radius: 12px;
  overflow: hidden;
  margin-bottom: 15px;
  background: #f4f4f4;
  display: flex;
  align-items: center;
  justify-content: center;
}

.book-card img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
  border-radius: 12px;
}

/* Shimmer Effect for Images */
.shimmer {
  position: relative;
  overflow: hidden;
}
.shimmer::before {
  content: "";
  position: absolute;
  top: 0;
  left: -150%;
  width: 100%;
  height: 100%;
  background: linear-gradient(120deg, transparent 30%, rgba(255,255,255,0.6) 50%, transparent 70%);
  animation: shimmer 2s infinite;
}
@keyframes shimmer {
  100% {
    left: 150%;
  }
}

.price{
  font-weight: bold;
  color: #154D71;
  margin: 10px 0;
}

.desc{
  font-size: 0.9rem;
  color: #555;
  margin-bottom: 15px;
  font-family: "Poppins", sans-serif;
}

/* Buy Now Button */
.btn {
  padding: 14px 30px;      /* Bada button */
  font-size: 1.1rem;       /* Bada text */
  border: none;
  border-radius: 25px;
  background: linear-gradient(135deg,  #541212,#154D71);
  color: #fff;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
  z-index: 1;
}

/* Button Shimmer Effect */
.btn::before {
  content: "";
  position: absolute;
  top: 0;
  left: -150%;
  width: 200%;
  height: 100%;
  background: linear-gradient(120deg, transparent 30%, rgba(255,255,255,0.5) 50%, transparent 70%);
  animation: shimmerBtn 2s infinite;
  z-index: -1;
}

@keyframes shimmerBtn {
  100% {
    left: 150%;
  }
}
</style>
<hr>
<style>
<!-- Compitetion sec -->

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
   <button type="button" class="active openModal btn" data-title="Sign In / Sign Up">
  Register Now
</button>

    </div>
  </section>

  <!-- Modal Form -->
   
  
  <!-- Footer -->
<?php include("includes/footer.php");?>
</body>
</html>
</body>
</html>