<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            text-align: center;
            color: #4CAF50;
        }
        .email-body {
            margin: 20px 0;
        }
        .email-body ul {
            list-style: none;
            padding: 0;
        }
        .email-body li {
            padding: 8px 0;
            font-size: 16px;
        }
        .email-body li strong {
            color: #333;
        }
        .email-footer {
            font-size: 14px;
            color: #555;
            text-align: center;
            margin-top: 30px;
        }
        .email-footer a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h2>Hello,</h2>
            <p>You have received a new contact submission:</p>
        </div>
        <div class="email-body">
            <ul>
                <li><strong>Name:</strong> {{ $contactFormData['name'] }}</li>
                <li><strong>Contact:</strong> {{ $contactFormData['contact'] }}</li>
            </ul>
        </div>
        <div class="email-footer">
            <p>Sayuru Web App</p>
        </div>
    </div>
</body>
</html>
