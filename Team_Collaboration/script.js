 // Auto-refresh the chat box every 2 seconds
 setInterval(function() {
    const chatBox = document.getElementById('chat-box');
    fetch('load_messages.php')
        .then(response => response.text())
        .then(data => {
            chatBox.innerHTML = data;
            chatBox.scrollTop = chatBox.scrollHeight;  // Auto scroll to the bottom
        });
}, 2000);