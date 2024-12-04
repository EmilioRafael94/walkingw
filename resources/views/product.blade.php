@extends('layouts.app')

@section('content')
<div class="category-buttons">
    <button class="btn btn-category" data-category="all">All</button>
    <button class="btn btn-category" data-category="basketball">Basketball</button>
    <button class="btn btn-category" data-category="training">Training</button>
    <button class="btn btn-category" data-category="soccer">Soccer</button>
    <button class="btn btn-category" data-category="casual">Casual</button>
</div>

<div class="cart-info-container" style="text-align: center; margin: 20px 0;">
    <h3>Items in Cart: <span id="cart-counter" class="cart-counter">0</span></h3>
</div>

<div class="product-grid">
    <!-- Product Card 1 - Basketball -->
    <div class="product-card" data-category="basketball">
        <div class="product-image-container">
            <img src="/images/air brett.jpg" alt="Air Bretts" class="product-image">
        </div>
        <h2 class="product-title">Air Bretts</h2>
        <p class="product-price">$1,599.00</p>
        <p class="product-description">The new Air Bretts with comfort!</p>
        <div class="product-actions">
            <button class="btn btn-primary add-to-cart" data-product-id="1">Add to Cart</button>
<!-- 'data-product-id' uniquely identifies the product for backend integration -->

            <button class="btn btn-secondary more-info-btn" data-target="#moreInfo1">More Info</button>
        </div>
        <div class="product-more-info" id="moreInfo1">
            <p><strong>Features:</strong> Lightweight design, breathable material, and high durability.</p>
            <p style="font-style: italic;"><strong>Colors:</strong> Black, White, Red.</p>
            <p><strong>Sizes:</strong> 6, 7, 8, 9, 10, 11.</p>
        </div>
    </div>

    <!-- Product Card 2 - Casual -->
    <div class="product-card" data-category="casual">
        <div class="product-image-container">
            <img src="/images/air brett 2.jpg" alt="Rubio Walkers" class="product-image">
        </div>
        <h2 class="product-title">Rubio Walkers</h2>
        <p class="product-price">$1,899.00</p>
        <p class="product-description">Elevate your experience with Rubio Walkers.</p>
        <div class="product-actions">
            <button class="btn btn-primary add-to-cart" data-product-id="2">Add to Cart</button>
<!-- 'data-product-id' uniquely identifies the product for backend integration -->

            <button class="btn btn-secondary more-info-btn" data-target="#moreInfo2">More Info</button>
        </div>
        <div class="product-more-info" id="moreInfo2">
            <p><strong>Features:</strong> Air-cushioned sole, waterproof design, and ultra-comfortable fit.</p>
            <p><strong>Colors:</strong> Blue, Gray, Green.</p>
            <p><strong>Sizes:</strong> 7, 8, 9, 10, 11, 12.</p>
        </div>
    </div>

    <!-- Product Card 3 - Training -->
    <div class="product-card" data-category="training">
        <div class="product-image-container">
            <img src="/images/air brett 3.jpg" alt="Kian Parras" class="product-image">        </div>
        <h2 class="product-title">Kian Parras</h2>
        <p class="product-price">$1,499.00</p>
        <p class="product-description">Run faster and feel lighter with Shadow Runners.</p>
        <div class="product-actions">
            <button class="btn btn-primary add-to-cart" data-product-id="3">Add to Cart</button>
<!-- 'data-product-id' uniquely identifies the product for backend integration -->
            <button class="btn btn-secondary more-info-btn" data-target="#moreInfo3">More Info</button>
        </div>
        <div class="product-more-info" id="moreInfo3">
            <p><strong>Features:</strong> Anti-slip soles, ultra-lightweight material, and ergonomic design.</p>
            <p><strong>Colors:</strong> Black, Neon Green, Silver.</p>
            <p><strong>Sizes:</strong> 6, 7, 8, 9, 10, 11, 12.</p>
        </div>
    </div>

    <!-- Product Card 4 - Soccer -->
    <div class="product-card" data-category="soccer">
        <div class="product-image-container">
            <img src="/images/nat engrown.jpg" alt="Goal Masters" class="product-image">
        </div>
        <h2 class="product-title">Nat Eng</h2>
        <p class="product-price">$1,299.00</p>
        <p class="product-description">Dominate the field with Goal Masters.</p>
        <div class="product-actions">
            <button class="btn btn-primary add-to-cart" data-product-id="4">Add to Cart</button>
            <!-- 'data-product-id' uniquely identifies the product for backend integration -->
            <button class="btn btn-secondary more-info-btn" data-target="#moreInfo4">More Info</button>
        </div>
        <div class="product-more-info" id="moreInfo4">
            <p><strong>Features:</strong> Enhanced grip, lightweight, and durability for every match.</p>
            <p><strong>Colors:</strong> Yellow, White, Black.</p>
            <p><strong>Sizes:</strong> 6, 7, 8, 9, 10, 11.</p>
        </div>
    </div>
</div>

<style>
<style>
/* Ensure overall page consistency */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f4f8;
    color: #333;
    margin: 0;
    padding: 0;
}

/* Add smooth transitions */
* {
    transition: all 0.3s ease-in-out;
}

/* Category Buttons */
.category-buttons {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
    gap: 15px;
}

.btn-category {
    padding: 12px 20px;
    font-size: 15px;
    font-weight: bold;
    border: 1px solid #ddd;
    border-radius: 8px;
    cursor: pointer;
    text-transform: uppercase;
    background-color: white;
    color: #333;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
}

.btn-category:hover {
    background-color: #2d9d63;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

/* Grid Layout */
.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin-top: 20px;
    padding: 20px;
    border-radius: 10px;
    background: linear-gradient(to bottom, #ffffff, #f8f8f8);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Cards */
.product-card {
    border-radius: 12px;
    overflow: hidden;
    background-color: #ffffff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    padding: 20px;
    transition: transform 0.2s ease-in-out;
}

.product-card:hover {
    transform: scale(1.05); /* Enhanced hover effect */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Stronger shadow for emphasis */
}


.product-image-container {
    height: 200px;
    margin-bottom: 15px;
    border-radius: 8px;
    overflow: hidden;
}

.product-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.product-title {
    color: #2d9d63;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 5px;
}

.product-price {
    font-size: 16px;
    font-weight: bold;
    color: #000;
    margin-bottom: 10px;
}

.product-description {
    font-size: 14px;
    color: #555;
    margin-bottom: 20px;
}

.product-actions {
    display: flex;
    gap: 10px;
    justify-content: center;
}

.btn {
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    text-transform: uppercase;
}

.btn-primary {
    background-color: #2d9d63;
    color: white;
}

.btn-primary:hover {
    background-color: #1a7d47;
}

.btn-secondary {
    background-color: #f4f4f4;
    color: #333;
}

.btn-secondary:hover {
    background-color: #ddd;
}

/* Responsive Design */
@media (max-width: 768px) {
    .product-grid {
        grid-template-columns: 1fr;
    }
}
.hidden {
    display: none !important;
}
.cart-info-container {
    font-size: 18px;
    font-weight: bold;
    color: #333;
    padding: 10px;
    background-color: #f1f1f1; /* Light background to make it stand out */
    border-radius: 8px;
}

.cart-counter {
    color: #ff5722; /* Bright color for the counter */
    font-size: 24px;
}



</style>

</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Filter by category
        const categoryButtons = document.querySelectorAll('.btn-category');
        const productCards = document.querySelectorAll('.product-card');
    
        categoryButtons.forEach(button => {
            button.addEventListener('click', () => {
                const category = button.getAttribute('data-category');
    
                productCards.forEach(card => {
                    if (category === 'all' || card.dataset.category === category) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                });
            });
        });
    
        // Toggle more info
        document.querySelectorAll('.more-info-btn').forEach(button => {
            button.addEventListener('click', () => {
                const targetId = button.getAttribute('data-target');
                const target = document.querySelector(targetId);
    
                if (target) {
                    target.style.display = target.style.display === 'block' ? 'none' : 'block';
                    button.classList.toggle('active');
                }
            });
        });
    
        // Add to Cart functionality with cart counter
        const updateCartCounter = () => {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartCounter = document.querySelector('#cart-counter');
            if (cartCounter) {
                cartCounter.textContent = cart.length; // Update the cart counter
            }
        };
    
        updateCartCounter(); // Initialize the counter on page load
    
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', () => {
                const productCard = button.closest('.product-card'); // Get the parent product card
                const product = {
                    id: button.getAttribute('data-product-id'),
                    title: productCard.querySelector('.product-title').textContent,
                    price: parseFloat(productCard.querySelector('.product-price').textContent.replace(/[^0-9.-]+/g, '')),
                    image: productCard.querySelector('.product-image').src,
                };
    
                // Get existing cart or initialize an empty array
                const cart = JSON.parse(localStorage.getItem('cart')) || [];
                
                // Add product to cart
                cart.push(product);
                localStorage.setItem('cart', JSON.stringify(cart));
    
                alert(`${product.title} has been added to your cart!`);
                updateCartCounter(); // Update the cart counter after adding a product
            });
        });
    });
    </script>
    
@endsection
