<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shadow Store</title>
  <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
  <header>
    <nav>
      <ul>
        <li><a href="/index.php">Home</a></li>
        <li><a href="/products.php">Products</a></li>
        <li><a href="/about-us.php">About Us</a></li>
        <li class="/login-button"><a href="login.php">Login</a></li>
        <li><a href="/cart.php">Cart</a></li> </ul>
    </nav>
  </header>

  <main>
    <h1>Welcome to Shadow Store!</h1>
    <p>Find your favorite shadowy items here.</p>

    <section class="product-container">
      <article class="product-card">
        <img src="images/product1.jpeg" width=300px alt="Iphone 13 Pro Max">
        <h3>Iphone 13 Pro Max</h3>
        <p>A short description of the product.</p>
        <span class="price">$19.99</span>
        <a href="/products/product.php?page=1">View Details</a> <button>Add to Cart</button>
      </article>
      </section>

    <section class="product-container">
      <h2>Featured Products</h2>
      <article class="product-card">
        <img src="images/product2.jpg" alt="Featured Product 1">
        <h3>Featured Product Name</h3>
        <p>A short description of the featured product.</p>
        <span class="price">$29.99</span>
        <a href="/products/product.php?page=2">View Details</a> <button>Add to Cart</button>
      </article>
      </section>

  </main>

  <section class="contact-section">
    <h2>Contact Us</h2>
    <p>Address: 123 Main Street, City, State, ZIP</p>
    <p>Email: contact@example.com</p>
    <p style="margin-bottom:0px">Phone: (123) 456-7890</p>
  </section>

  <footer>
    <p>Shadow Company 2024 C. All rights reserved.</p>
  </footer>
</body>

</html>
