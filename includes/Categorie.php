<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <hr>
    <!-- Categories Section -->
<section id="categories">
  <h2>Book Categories</h2>
  <div class="categories">
    <a href="fiction.html" class="category">Fiction</a>
    <a href="non-fiction.html" class="category">Non-Fiction</a>
    <a href="romance.html" class="category">Romance</a>
    <a href="science.html" class="category">Science</a>
    <a href="GrowthSec.php" class="category">Growth</a>
    <a href="history.html" class="category">History</a>
  </div>
</section>

<style>
  #categories {
    padding: 60px 20px;
    text-align: center;
background: linear-gradient(110deg,  #541212,#154D71);
  }

  #categories h2 {
    font-size: 28px;
    margin-bottom: 40px;
    color:#d4af37;
    font-family: 'Cormorant Garamond', serif;
  }

  .categories {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    max-width: 1000px;
    margin: 0 auto;
  }

  .category {
    display: block;
    text-decoration: none;
    background: white;
    padding: 30px 20px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    font-size: 18px;
    font-weight: bold;
    color: #154D71;
    opacity: 0;
    transform: translateX(-100px);
    transition: all 0.8s ease;
  }

  .category:hover {
    background: linear-gradient(135deg, #541212, #0e3350);
    color: white;
    transform: translateY(-5px) scale(1.05);
  }

  .category.show {
    opacity: 1;
    transform: translateX(0);
  }
</style>

<script>
  const categories = document.querySelectorAll('.category');

  function toggleCategories() {
    const triggerBottom = window.innerHeight * 0.85;
    const triggerTop = window.innerHeight * 0.15;

    categories.forEach((category, index) => {
      const boxTop = category.getBoundingClientRect().top;

      if (boxTop < triggerBottom && boxTop > triggerTop) {
        setTimeout(() => {
          category.classList.add('show');
        }, index * 200);
      } else {
        category.classList.remove('show');
      }
    });
  }

  window.addEventListener('scroll', toggleCategories);
  toggleCategories();
</script>
</body>
</html>