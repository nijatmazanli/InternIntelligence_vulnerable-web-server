function createProductCards(products) {
  const productContainer = document.getElementById('product-container');
  productContainer.innerHTML = ''; // Clear previous content

  products.forEach(product => {
    const productCard = document.createElement('div');
    productCard.classList.add('product-card');

    // Create elements for product details

    const productImage = document.createElement('img');
    productImage.src = product.imh_link;
    productCard.appendChild(productImage);

    const productName = document.createElement('h3');
    productName.textContent = product.name;
    productCard.appendChild(productName);

    const productPrice = document.createElement('p');
    productPrice.textContent = `Price: $$ ${product.price}`;
    productCard.appendChild(productPrice);

    const productButton = document.createElement('button');
    productButton.textContent = 'View';

    // Event listener for button click
    productButton.addEventListener('click', () => {
      const productId = product.id; // Access product ID
      window.location.href = `/products/product.php?page=${productId}`; // Redirect with ID
    });

    productCard.appendChild(productButton);

    productContainer.appendChild(productCard);
  });
}

const productsData = [

  {
    "id": 1,
    "name": "Product 1",
    "description": "This is the first product.",
    "imh_link": "images/product1.jpg",
    "price": 29.99
  },
  {
    "id": 2,
    "name": "Product 2",
    "description": "This is the second product.",
    "imh_link": "images/product2.jpg",
    "price": 14.99
  },
  {
    "id": 3,
    "name": "Product 3",
    "description": "This is the third product.",
    "imh_link": "images/product3.jpg",
    "price": 35.99
  },
  {
    "id": 4,
    "name": "Product 4",
    "description": "This is the fourth product.",
    "imh_link": "images/product4.jpg",
    "price": 22.99
  }
]
createProductCards(productsData)
