@extends('layouts.app')

@section('content')
<div class="about-container">
    <h1 class="title">About Walking W</h1>
    <p class="subtitle">
        Learn more about Walking W and our values.
    </p>

    <div class="content-wrapper">
        <div class="about">
            <h3><b>Walking W</b></h3>
           
            <div class="logo">
                <img src="{{ asset('images/WALKING W LOGO.png') }}" alt="Walking W Logo">
            </div>

            <p>Co-founded by Rafi, Karlos, Brett, Kian, and Nat, Walking W is a dynamic and diverse footwear company that presents a compelling range of shoes catering to various passions and preferences.</p>
        </div>

        <div class="mission-vision">
            <div class="mission">
                <h3><b>Mission</b></h3>
                <p>Empower with style and innovation; Walking W reimagines footwear for athletes and individuals, inspiring passions and embracing uniqueness globally.</p>
            </div>

            <div class="vision">
                <h3><b>Vision</b></h3>
                <p>To reshape footwear by blending performance and expression, leaving a positive footprint on the planet, uniting diverse communities under a banner of individuality and sustainability.</p>
            </div>
        </div>
    </div>

    <div class="contact-section">
        <h3><b>Contact Us</b></h3>
        <p><b>Email:</b> walkingW@gmail.com</p>
        <p><b>Phone No:</b> 09912387654</p>
    </div>
</div>

<style>
    .about-container {
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

    .content-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
        padding: 20px;
        margin: 0 auto;
        width: 90%;
        max-width: 1200px;
    }

    .about {
        flex: 1;
        background-color: #e0f5e5; 
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        max-width: 400px;
    }

    .about h3 {
        font-size: 18px;
        color: #054f2e;
        margin-bottom: 10px;
        text-align: center;
    }

    .about p {
        font-size: 14px;
        color: #333;
        line-height: 1.6;
        text-align: justify;
    }

    .logo {
        margin: 20px 0;
        text-align: center;
    }

    .logo img {
        max-width: 100%;
        max-height: 150px;
    }

    .mission-vision {
        flex: 2;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .mission, .vision {
        background-color: #e0f5e5; 
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
    }

    .mission h3, .vision h3 {
        font-size: 18px;
        color: #054f2e;
        margin-bottom: 10px;
        text-align: center;
    }

    .mission p, .vision p {
        font-size: 14px;
        color: #333;
        line-height: 1.6;
        text-align: justify;
    }

    .contact-section {
        margin: 40px auto;
        padding: 20px;
        background-color: #cfead6;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 80%;
        max-width: 600px;
    }

    .contact-section h3 {
        font-size: 18px;
        color: #033e23;
        margin-bottom: 10px;
    }

    .contact-section p {
        font-size: 14px;
        color: #333;
        line-height: 1.6;
    }
</style>
@endsection
