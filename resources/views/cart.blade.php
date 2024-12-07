@extends('layouts.app')

@section('content')
<div class="cart-container">
    <h1 class="cart-title">YOUR CART</h1>
    
    <!-- Cart Items Section -->
    <div id="cart-items" class="cart-items"></div>

    <!-- Cart Summary Section -->
    <div id="cart-summary" class="cart-summary">
        <h3>Total:</h3>
        <div id="total-price"></div>
    </div>

    <!-- Checkout Button -->
    <div class="checkout-button-container">
        <a href="{{ route('checkout') }}" class="btn btn-primary checkout-button">CHECKOUT</a>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const cartItemsContainer = document.getElementById('cart-items');
    const totalPriceContainer = document.getElementById('total-price');
    let total = 0;

    // Retrieve cart from localStorage
    const cart = JSON.parse(localStorage.getItem('cart')) || [];

    if (cart.length === 0) {
        cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
        totalPriceContainer.innerHTML = "$0.00";
        return;
    }

    // Display cart items
    cart.forEach((item, index) => {
        const itemElement = document.createElement('div');
        itemElement.classList.add('cart-item');
        itemElement.innerHTML = ` 
            <div class="cart-item-image">
                <img src="${item.image}" alt="${item.title}" class="cart-item-img">
            </div>
            <div class="cart-item-details">
                <p><strong>${index + 1}. ${item.title}</strong></p>
                <p>Price: $${item.price}</p>
                <button class="btn btn-danger remove-item" data-index="${index}">Remove</button>
            </div>
        `;
        cartItemsContainer.appendChild(itemElement);
        total += parseFloat(item.price);
    });

    // Display total
    totalPriceContainer.innerHTML = `$${total.toFixed(2)}`;

    // Remove item from cart
    document.querySelectorAll('.remove-item').forEach(button => {
        button.addEventListener('click', () => {
            const index = button.getAttribute('data-index');
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            location.reload(); // Reload to update the cart page
        });
    });
});
</script>

<style>
    /* Container */
    .cart-container {
        max-width: 900px;
        margin: 50px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center; /* Ensure text is centered */
    }

    /* Title */
    .cart-title {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 30px;
        font-family: 'Arial', sans-serif;
    }

    /* Cart Items Section */
    .cart-items {
        display: flex;
        flex-direction: column;
        gap: 20px;
        margin-bottom: 30px;
    }

    .cart-item {
        display: flex;
        justify-content: space-between;
        background-color: #fff;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        align-items: center;
    }

    .cart-item-image {
        max-width: 100px;
        max-height: 100px;
        overflow: hidden;
    }

    .cart-item-img {
        width: 100%;
        height: auto;
    }

    .cart-item-details {
        flex-grow: 1;
        padding-left: 15px;
        text-align: left;
    }

    .cart-item p {
        margin: 5px 0;
        font-size: 1.1rem;
    }

    .cart-item button {
        padding: 8px 16px;
        background-color: #e74c3c;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        transition: background-color 0.3s ease;
    }

    .cart-item button:hover {
        background-color: #c0392b;
    }

    /* Cart Summary */
    .cart-summary {
        text-align: center;
        background-color: #f1f1f1;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
    }

    .cart-summary h3 {
        font-size: 1.5rem;
        color: #333;
        margin: 0;
    }

    /* Checkout Button */
    .checkout-button-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 30px;
    }

    .checkout-button {
        padding: 12px 30px;
        background-color: #27ae60;
        color: white;
        text-decoration: none;
        font-size: 1.2rem;
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .checkout-button:hover {
        background-color: #2ecc71;
        transform: translateY(-3px);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .cart-container {
            padding: 15px;
        }

        .cart-item {
            padding: 10px;
        }

        .checkout-button {
            font-size: 1.1rem;
            padding: 10px 20px;
        }
    }
</style>
@endsection
