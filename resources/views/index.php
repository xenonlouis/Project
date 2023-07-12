<x-custom-layout>
    <!DOCTYPE html>
    <html>

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Landing Page</title>
        <style>
            body {
                background-color: whitesmoke;
                margin: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
                font-family: 'Gothic', sans-serif;
            }

            .title2 {
                position: absolute;
                top: 20px;
                right: 20px;
                font-size: 24px;
                font-weight: bold;
                cursor: pointer;
            }

            .title2 span {
                color: #fc6434;
            }

            .title2 em {
                color: #054594;
                font-style: italic;

            }

            .container {
                max-width: 800px;
                margin: 20px;
                text-align: center;
            }

            .title img {
                max-width: 100%;
                height: auto;
                margin-bottom: 20px;
            }

            .buttons-container {
                display: flex;
                justify-content: center;
                margin-bottom: 20px;
            }

            .button {
                padding: 10px 20px;
                background-color: #054594;
                color: #fff;
                border: none;
                border-radius: 4px;
                font-size: 16px;
                cursor: pointer;
                margin: 0 10px;
            }

            .button:hover {
                background-color: #216795;
            }
        </style>
    </head>

    <body>
        <div class="title2">
            <span>Data</span> <em>Embassy</em>
        </div>

        <div class="container">
            <div class="title">
                <br> <br> <br> <br> <br> <br>
                <img src="./DATA3.png" alt="Data Embassy">
            </div>
            <br>
            <div class="buttons-container">
                <button class="button" onclick="window.location.href = '/admin';"> Admnistration </button>
                <button class="button" onclick="window.location.href = '/gestion/list_clients';"> List Clients </button>
                <button class="button" onclick="window.location.href = '/gestion/list_employe';"> List Employe </button>
                <button class="button" onclick="window.location.href = '/gestion/Service';"> Service </button>
            </div>
        </div>
    </body>

    </html>
</x-custom-layout>