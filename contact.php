<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us</title>

<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #fff5f8;
}

.header {
    background: #ff4d88;
    color: white;
    text-align: center;
    padding: 25px;
    font-size: 28px;
    font-weight: bold;
}

.container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 40px;
    gap: 30px;
}

.box {
    background: white;
    width: 300px;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.box h3 {
    color: #ff4d88;
    margin-bottom: 10px;
}

.form-box input, .form-box textarea {
    width: 100%;
    margin-bottom: 12px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
}

button {
    background: #ff4d88;
    color: white;
    border: none;
    padding: 10px;
    width: 100%;
    border-radius: 8px;
    cursor: pointer;
}

button:hover {
    background: #e6005c;
}
</style>
</head>

<body>

<div class="header">
    Contact Us 💄
</div>

<div class="container">

    <!-- Contact Info -->
    <div class="box">
        <h3>Get in Touch</h3>
        <p>📞 WhatsApp: +92 312 4567890</p>
        <p>📧 Email: glowbeautyshop@gmail.com</p>
        <p>📍 Address: 2nd Floor, Beauty Plaza, Lahore, Pakistan</p>
        <p>🕒 Mon - Sat: 10AM - 8PM</p>
    </div>

    <!-- Contact Form -->
    <div class="box form-box">
        <h3>Send Message</h3>
        <form>
            <input type="text" placeholder="Your Name" required>
            <input type="email" placeholder="Your Email" required>
            <textarea rows="4" placeholder="Your Message"></textarea>
            <button type="submit">Send</button>
        </form>
    </div>

</div>

</body>
</html>