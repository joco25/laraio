<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

 
    </head>
    <body>
        <div id="app">
            <h1>New Users</h1>
            <ul>
                <li v-for="user in users">@{{user}}</li>
            </ul>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.2/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
        <script>
            var socket = io('http://192.168.10.10:4000');
            new Vue({
                el: '#app',
                data:{
                    users:[]
                },
                mounted:function(){

                    socket.on('test-channel;App\\Events\\UserSignedUp', function(data){
                        this.users.push(data.username);
                    }.bind(this));
                }
            });
        </script>
    
    </body>
</html>
