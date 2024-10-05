<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Team Collaboration - Chat</title>
    
</head>
<body>

    <div class="chat-container">
        <h1>Team Collaboration - Chat</h1>
        <div class="chat-box" id="chat-box">
            <!-- Chat messages will appear here -->
        </div>

        <form id="chat-form" action="send_message.php" method="POST">
            <input type="text" name="message" id="message" placeholder="Type a message..." required>
            <input type="submit" value="Send">
        </form>
    </div>

    <script src="./script.js"></script>
    
</body>
</html>
