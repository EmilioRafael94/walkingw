@extends('layouts.app')

@section('content')
<div class="container cart-container">
    <h1 class="cart-title">Your Cart</h1>
    
    <!-- Cart Items Section -->
    <div id="cart-items" class="cart-items"></div>
    
    <!-- Cart Summary Section -->
    <div id="cart-summary" class="cart-summary"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const cartItemsContainer = document.getElementById('cart-items');
    const cartSummaryContainer = document.getElementById('cart-summary');

    // Retrieve cart from localStorage
    const cart = JSON.parse(localStorage.getItem('cart')) || [];

    if (cart.length === 0) {
        cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
        return;
    }

    let total = 0;

    // Display cart items
    cart.forEach((item, index) => {
        const itemElement = document.createElement('div');
        itemElement.classList.add('cart-item');
        itemElement.innerHTML = `
            <div class="cart-item-content">
                <img src="${item.image}" alt="${item.title}" class="cart-item-image">
                <div class="cart-item-details">
                    <strong>${item.title}</strong>
                    <p>Price: $${item.price}</p>
                </div>
            </div>
            <button class="btn btn-danger remove-item" data-index="${index}">Remove</button>
        `;
        cartItemsContainer.appendChild(itemElement);
        total += parseFloat(item.price);
    });

    // Display cart summary
    cartSummaryContainer.innerHTML = `<h3>Total: $${total.toFixed(2)}</h3>`;

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
        margin: 30px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Title */
    .cart-title {
        text-align: center;
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
        align-items: center;
        background-color: #fff;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .cart-item:hover {
        transform: translateY(-5px);
    }

    .cart-item-content {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .cart-item-image {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
    }

    .cart-item-details {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .cart-item-details strong {
        font-size: 1.2rem;
        color: #333;
    }

    .cart-item-details p {
        font-size: 1rem;
        color: #777;
    }

    .remove-item {
        padding: 8px 16px;
        background-color: #e74c3c;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        transition: background-color 0.3s ease;
    }

    .remove-item:hover {
        background-color: #c0392b;
    }

    /* Cart Summary */
    .cart-summary {
        text-align: center;
        background-color: #f1f1f1;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .cart-summary h3 {
        font-size: 1.5rem;
        color: #333;
        margin: 0;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .cart-container {
            padding: 15px;
        }

        .cart-item {
            flex-direction: column;
            gap: 10px;
        }

        .cart-item-content {
            flex-direction: column;
            align-items: flex-start;
        }

        .remove-item {
            width: 100%;
        }
    }
</style>
@endsection
