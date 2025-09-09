<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<!-- Quotes Section -->
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



</body>
</html>

