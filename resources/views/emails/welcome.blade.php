<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to SparkBoard</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f7f9fb;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            animation: fadeIn 1s ease;
        }
        .header {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: white;
            text-align: center;
            padding: 30px 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
        }
        .content {
            padding: 30px 20px;
            text-align: center;
        }
        .content h2 {
            color: #4f46e5;
            margin-bottom: 10px;
        }
        .button {
            display: inline-block;
            background: #6366f1;
            color: white;
            padding: 12px 25px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
            transition: background 0.3s ease;
        }
        .button:hover {
            background: #4f46e5;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #888;
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Welcome to SparkBoard 🚀</h1>
    </div>

    <div class="content">
        <h2>Hi {{ $userName }},</h2>
        <p>We're thrilled to have you on board! SparkBoard is where ideas ignite, and bold thinkers like you collaborate to create something amazing.</p>

        <a href="{{ url('/') }}" class="button">Explore Sparks Now</a>

        <p style="margin-top: 20px; font-size: 14px; color: #555;">Your next big idea starts today. Dive in and share your spark!</p>
    </div>

    <div class="footer">
        © {{ date('Y') }} SparkBoard. All rights reserved.
    </div>
</div>

</body>
</html>
