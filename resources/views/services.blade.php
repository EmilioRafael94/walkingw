@extends('layouts.app')

@section('content')
<div class="services-container">
    <h1 class="title">Our Services</h1>
    <p class="subtitle">
        Walking W not only provides high-quality footwear but also emphasizes customer satisfaction and sustainability through its services.
    </p>
    
    <div class="services">
        <div class="service-box">
            <h3>Eco-friendly materials and ethical manufacturing practices</h3>
            <p>
                Walking W is committed to sustainability. The company uses eco-friendly materials and follows ethical manufacturing practices, 
                ensuring that their products are not only high in quality but also environmentally responsible.
            </p>
        </div>
        
        <div class="service-box">
            <h3>Marketing and sales support to engage with a broad customer base</h3>
            <p>
                Walking W's marketing and sales teams work to promote the brand and engage with customers effectively. 
                They employ strategies to reach a wide audience and ensure that the products meet market demands.
            </p>
        </div>
        
        <div class="service-box">
            <h3>Research and Development for continuous innovation</h3>
            <p>
                Walking W invests in R&D to stay ahead in the competitive footwear industry. 
                This involves innovating new designs, improving materials, and integrating the latest technology into their products 
                to enhance performance and comfort.
            </p>
        </div>
        
        <div class="service-box">
            <h3>Comprehensive customer service and support</h3>
            <p>
                The company offers comprehensive customer service, assisting customers before, during, and after the purchase. 
                This includes help with product selection, order tracking, returns, and addressing any issues or concerns customers might have.
            </p>
        </div>
    </div>
</div>

<style>
    .services-container {
        text-align: center;
        font-family: Arial, sans-serif;
        padding: 20px;
    }

    .title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .subtitle {
        font-size: 16px;
        color: #555;
        margin-bottom: 30px;
    }

    .services {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    .service-box {
        width: 45%;
        background-color: #f9f9f9;
        border: 2px solid #00a651;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: left;
        transition: all 0.3s ease; /* Smooth transition for hover effect */
    }

    /* Hover effect */
    .service-box:hover {
        transform: translateY(-10px); /* Moves the box slightly up */
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Larger shadow */
        background-color: #e6f8f1; /* Subtle background color change */
    }

    .service-box h3 {
        font-size: 18px;
        color: #00a651;
        margin-bottom: 10px;
    }

    .service-box p {
        font-size: 14px;
        color: #333;
        line-height: 1.6;
    }
</style>
@endsection
