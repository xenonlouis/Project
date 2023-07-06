<!DOCTYPE html>
<html>

<head>
    <title>Add Client</title>
    <style>
        body {
            background-color: #f2f2f2;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: 'Gothic', sans-serif;
        }

        .container {
            max-width: 600px;
            text-align: center;
        }

        .form {
            background-color: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        .form input[type="text"],
        .form input[type="email"],
        .form input[type="tel"],
        .form textarea,
        .form select,
        .form button {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: none;
        }

        .form button {
            background-color: #072148;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form button:hover {
            background-color: #05386b;
        }

        .form h2 {
            margin-bottom: 20px;
        }

        .form .columns {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .form .columns .left-column,
        .form .columns .right-column {
            flex-basis: 45%;
        }

        .form .columns .left-column label,
        .form .columns .right-column label {
            width: 100%;
            margin-bottom: 5px;
            text-align: left;
        }

        .title {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #072148;
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
        <div class="form">
            <h2>Add Client</h2>
            <form method="post" action="/gestion/add_client">
                @csrf
                <div class="columns">
                    <div class="left-column">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" required>

                        <label for="societe">Société</label>
                        <input type="text" name="societe" id="societe" required>

                        <label for="ville">Ville</label>
                        <input type="text" name="ville" id="ville" required>

                        <label for="pays">Pays</label>
                        <input type="text" name="pays" id="pays" required>

                        <label for="tel_fix">Téléphone Fixe</label>
                        <input type="tel" name="tel_fix" id="tel_fix" required>

                        <label for="type_Prospect">Type Prospet</label>
                        <input type="text" name="type_Prospect" id="type_Prospect" required>
                    </div>
                    <div class="right-column">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" id="prenom" required>

                        <label for="adresse">Adresse</label>
                        <input type="text" name="adresse" id="adresse" required>

                        <label for="tel_portable">Téléphone Portable</label>
                        <input type="tel" name="tel_portable" id="tel_portable" required>

                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>

                        <label for="position">Position</label>
                        <input type="text" name="position" id="position" required>

                        <label for="fax">Fax</label>
                        <input type="tel" name="fax" id="fax">
                    </div>
                </div>
                <div class="columns">
                    <div class="left-column">
                        <label for="tel_portable2">Téléphone Portable 2</label>
                        <input type="tel" name="tel_portable2" id="tel_portable2">

                        <label for="intitule">Intitulé</label>
                        <select name="intitule" id="intitule" required>
                            <option value="Mr">Mr</option>
                            <option value="Mme">Mme</option>
                            <option value="Mlle">Mlle</option>
                            <option value="Societe">Societe</option>
                        </select>
                    </div>
                    <div class="right-column">
                        <label for="tel_fix2">Téléphone Fixe 2</label>
                        <input type="tel" name="tel_fix2" id="tel_fix2">
                        <label for="commentaire">Commentaire</label>
                        <textarea name="commentaire" id="commentaire" rows="4"></textarea>
                    </div>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>