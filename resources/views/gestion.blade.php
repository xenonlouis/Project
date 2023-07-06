<!DOCTYPE html>
<html>

<head>
    <title>Modern Colored Cells HTML Template</title>
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

        .container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 30px;
            max-width: 600px;
            text-align: center;
        }

        .button {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #072148;
            color: #fff;
            padding: 20px;
            font-size: 18px;
            border-radius: 4px;
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .button:hover {
            transform: scale(1.1);
        }

        .title {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        .title span {
            color: orange;
        }

        .title em {
            color: #2980b9;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="title">
        <span>Data</span> <em>Embassy</em>
    </div>
    <div class="container">
        <a href="/gestion/add_client" class="button">Ajouter Client</a>
        <a href="/edit_client" class="button">Modifier Client</a>
        <a href="/delete_client" class="button">Supprimer Client</a>
        <a href="/gestion/list_clients" class="button">Lister les Clients</a>
    </div>

</body>
<p class="msg">{{session('msg')}}</p>

</html>