<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trending Books</title>
</head>
<body>
<hr>
<!-- New Arrivals Section -->
<section class="new-arrivals">
  <h2>✨ Trending Books ✨</h2>
  <div class="grid">
<?php
$connect = mysqli_connect("localhost", "root", "", "monneys_bookstore");

// Sirf 3 books uthani hain
$query = "SELECT book_id, title, author, description, price, image 
          FROM books 
          WHERE book_id IN (3,5,9) 
          ORDER BY book_id ASC";

$result = mysqli_query($connect, $query);

while($row = mysqli_fetch_assoc($result)){
  echo "
  <div class='book-card'>
    <div class='image shimmer'>
      <img src='".$row['image']."' alt='".$row['title']."'>
    </div>
    <h3>".$row['title']."</h3>
    <p class='price'>".$row['price']." PKR</p>
    <p class='desc'>".$row['description']."</p>
    <a href='orderdetails.php?id=".$row['book_id']."'><button class='btn'>Buy Now</button></a>
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
</body>
</html>
