<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WS Laravel</title>
</head>

<body>
    <h1>Pusher Test</h1>
    <p>
        Try publishing an event to channel <code>my-channel</code>
        with event name <code>my-event</code>.
    </p>

    <input type="text" id="message">
    <button type="button" id="send">Send</button>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo/dist/echo.iife.js"></script>
    
    <script>
        Pusher.logToConsole = true;

        window.Echo = new Echo({
            broadcaster: 'pusher',
            key: '{{ env("PUSHER_APP_KEY")}}',
            cluster: '{{ env("PUSHER_APP_CLUSTER")}}',
            forceTLS: true
        });

        var channel = Echo.channel('ts-channel');

        channel.listen('.ts-event', (data) => {
            alert(data.message);
        });

        document.getElementById('send').addEventListener('click', function() {
            const message = document.getElementById('message').value;

            axios.post('/broadcast-message', {message: message})
                .then(response=> {
                    document.getElementById('message').innerHtml = ""
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                })
        });
    </script>
</body>


</html>
