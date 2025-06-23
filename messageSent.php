<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Sent</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f3f4f6;
            padding: 16px;
            background-image: url('https://t3.ftcdn.net/jpg/01/98/23/58/360_F_198235898_DLqECcCxh90nbw3J3RKE3h3D4EmgB3bF.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .message-container {
            max-width: 400px;
            width: 100%;
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 24px;
            color: #2d3748;
            margin-bottom: 16px;
        }

        p {
            font-size: 16px;
            color: #4a5568;
            margin-bottom: 20px;
        }

        .button-container {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .button {
            padding: 10px 20px;
            font-size: 14px;
            font-weight: bold;
            color: white;
            background-color: #3182ce;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.2s ease;
            text-decoration: none;
            display: inline-block;
        }

        .button:hover {
            background-color: #2b6cb0;
        }

        .home-btn {
            background-color: #4a5568;
        }

        .home-btn:hover {
            background-color: #2d3748;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <h1>Message Sent!</h1>
        <p>Your message has been successfully sent. Thank you for reaching out to us!</p>
        <div class="button-container">
            <a href="index.php" class="button home-btn">Back to Home</a>
            <a href="complaint.php" class="button">Send Another Message</a>
        </div>
    </div>
</body>
</html>
