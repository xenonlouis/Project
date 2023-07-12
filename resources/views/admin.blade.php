<x-app-layout>
    <!DOCTYPE html>
    <html>

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Client List</title>
        <style>
            body {
                background-color: whitesmoke;
                margin: 0;
                font-family: 'Gothic', sans-serif;
            }

            .title {
                position: absolute;
                top: 20px;
                right: 20px;
                font-size: 24px;
                font-weight: bold;
                cursor: pointer;
            }

            .title span {
                color: #fc6434;
            }

            .title em {
                color: #054594;
                font-style: italic;

            }

            .container {
                max-width: 800px;
                margin: 20px;
            }


            .search-container {
                display: flex;
                align-items: center;
                margin-bottom: 20px;
                width: 1000px;

            }

            .search-input {
                margin-right: 10px;
                width: 1000px;
            }

            .loading {
                display: none;
                text-align: center;
                margin-top: 5px;
            }


            .list {
                background-color: #f2f2f2;
                padding: 20px;
                border-radius: 8px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            table {
                max-width: 80%;
                width: auto;
                border-collapse: collapse;
                min-height: 0;
            }

            th,
            td {
                padding: 10px;
                text-align: left;
            }

            th {
                background-color: #072148;
                color: #fff;
            }

            tbody tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            .search-options {
                display: flex;
                margin-bottom: 10px;
            }

            .search-options label {
                margin-right: 10px;
            }

            /* Modal styles */
            .modal-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
                overflow: auto;
            }

            .modal-content {
                background-color: #fff;
                padding: 20px;
                max-width: 600px;
                margin: 0 auto;
                margin-top: 10vh;
                border-radius: 5px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }

            .form {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .form-row {
                display: flex;
                flex-wrap: wrap;
                width: 100%;
                margin-bottom: 10px;
            }

            .form-column {
                flex-basis: 50%;
                margin-bottom: 15px;
                padding-right: 10px;
                box-sizing: border-box;
            }

            .form label {
                display: block;
                margin-bottom: 5px;
            }

            input[type="text"],
            input[type="tel"],
            input[type="email"],
            select,
            textarea {
                width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                margin-bottom: 5px;
            }

            button[type="submit"] {
                display: block;
                margin-top: 20px;
                padding: 10px 20px;
                background-color: #002a77;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }

            button[type="submit"]:hover {
                background-color: #45a049;
            }

            button#open-modal-btn {
                padding: 10px 20px;
                background-color: #002a77;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }

            button#open-modal-btn:hover {
                background-color: #0069d9;
            }

            .button-container {
                display: flex;
                gap: 5px;
            }

            .button-container button {
                padding: 2px 5px;
                background-color: #002a77;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 12px;
            }

            .button-container button:hover {
                background-color: #0069d9;
            }

            .highlight {
                background-color: yellow;
            }
        </style>
    </head>


    <body>
        <div class="title" onclick="redirectToHome()">
            <span>Data</span> <em>Embassy</em>
        </div>
        <div class="container" style="margin: 0 auto; max-width: 800px;">
            <div class="list">
                <div class="search-container">
                    <input type="text" id="search-input" class="search-input" placeholder="Search">
                    <div class="loading" id="loading-msg">
                        Loading...
                    </div>
                </div>
                <div class="search-options">
                    <label>
                        <input type="radio" name="search-option" value="all" checked> All
                    </label>
                    <label>
                        <input type="radio" name="search-option" value="Nom"> Nom
                    </label>
                    <label>
                        <input type="radio" name="search-option" value="Prénom"> Prénom
                    </label>
                    <label>
                        <input type="radio" name="search-option" value="Societe"> Société
                    </label>
                    <label>
                        <input type="radio" name="search-option" value="Ville"> Ville
                    </label>
                    <label>
                        <input type="radio" name="search-option" value="Pays"> Pays
                    </label>
                    <label>
                        <input type="radio" name="search-option" value="Position"> Position
                    </label>
                </div>
                <div class="search-type">
                    <label>
                        <input type="radio" name="search-type" value="exact" checked> Exact
                    </label>
                    <label>
                        <input type="radio" name="search-type" value="partial"> Partial
                    </label>
                </div>
                <br>
                <button class="open-modal-btn" id="open-modal-btn">Add Client</button>
                <br>
                <h2>Client List</h2>
                <br>
                <table>
                    <thead>
                        <tr>
                            <th>Intitule</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Societe</th>
                            <th>Tel_fix</th>
                            <th>Tel_fix2</th>
                            <th>Tel_Portable</th>
                            <th>Tel_Portable2</th>
                            <th>Fax</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="client-table">
                        <!-- Client rows will be dynamically added here -->
                    </tbody>
                </table>

            </div>
        </div>

        <!-- Modal form of add button-->
        <div class="modal-overlay" id="add-modal">
            <div class="modal-content">
                <h2>Add Client</h2> <br>
                <form method="post" action="/gestion/add_client" class="form">
                    @csrf
                    <div class="form-row">
                        <label for="intitule">Intitulé</label>
                        <select name="intitule" id="intitule" required>
                            <option value="Mr">Mr</option>
                            <option value="Mme">Mme</option>
                            <option value="Mlle">Mlle</option>
                            <option value="Societe">Societe</option>
                        </select>

                        <div class="form-column">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" id="nom" required>

                            <label for="societe">Société</label>
                            <input type="text" name="societe" id="societe" required>
                        </div>
                        <div class="form-column">
                            <label for="prenom">Prénom</label>
                            <input type="text" name="prenom" id="prenom" required>

                            <label for="pays">Pays</label>
                            <input type="text" name="pays" id="pays" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column">
                            <label for="tel_fix">Téléphone Fixe</label>
                            <input type="tel" name="tel_fix" id="tel_fix" pattern="^05\d{8}$" title="Please enter a valid phone number starting with '05'" required>

                            <label for="type_Prospect">Type Prospect</label>
                            <input type="text" name="type_Prospect" id="type_Prospect" required>
                        </div>
                        <div class="form-column">
                            <label for="tel_portable">Téléphone Portable</label>
                            <input type="tel" name="tel_portable" id="tel_portable" pattern="^(06|07)\d{8}$" title="Please enter a valid phone number starting with '06' or '07'" required>




                            <label for="adresse">Adresse</label>
                            <input type="text" name="adresse" id="adresse" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column">
                            <label for="ville">Ville</label>
                            <input type="text" name="ville" id="ville" required>

                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" required>
                        </div>
                        <div class="form-column">
                            <label for="position">Position</label>
                            <input type="text" name="position" id="position" required>

                            <label for="fax">Fax</label>
                            <input type="tel" name="fax" id="fax" pattern="^05\d{8}$" title="Please enter a valid phone number starting with '05'">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column">
                            <label for="tel_portable2">Téléphone Portable 2</label>
                            <input type="tel" name="tel_portable2" id="tel_portable2" pattern="^(06|07)\d{8}$" title="Please enter a valid phone number starting with '06' or '07'">


                        </div>
                        <div class="form-column">
                            <label for="tel_fix2">Téléphone Fixe 2</label>
                            <input type="tel" name="tel_fix2" id="tel_fix2" pattern="^05\d{8}$" title="Please enter a valid phone number starting with '05'">

                            <label for="commentaire">Commentaire</label>
                            <textarea name="commentaire" id="commentaire" rows="4"></textarea>
                        </div>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
        <!-- Modal form of edit button-->
        <div class="modal-overlay" id="edit-modal">
            <div class="modal-content">
                <h2>Edit Client</h2> <br>
                <form id="editClientForm" method="post" action="/gestion/update_client" class="form">
                    @csrf
                    <div class="form-row">
                        <label for="editIntitule">Intitulé</label>
                        <select name="editIntitule" id="editIntitule" required>
                            <option value="Mr">Mr</option>
                            <option value="Mme">Mme</option>
                            <option value="Mlle">Mlle</option>
                            <option value="Societe">Societe</option>
                        </select>
                        <div class="form-column">

                            <label for="editNom">Nom</label>
                            <input type="text" name="editNom" id="editNom" required>

                            <label for="editSociete">Société</label>
                            <input type="text" name="editSociete" id="editSociete" required>
                        </div>
                        <div class="form-column">
                            <label for="editPrenom">Prénom</label>
                            <input type="text" name="editPrenom" id="editPrenom" required>

                            <label for="editPays">Pays</label>
                            <input type="text" name="editPays" id="editPays" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column">
                            <label for="editTelFixe">Téléphone Fixe</label>
                            <input type="tel" name="editTelFixe" id="editTelFixe" pattern="^05\d{8}$" title="Please enter a valid phone number starting with '05'" required>

                            <label for="editTypeProspect">Type Prospect</label>
                            <input type="text" name="editTypeProspect" id="editTypeProspect" required>
                        </div>
                        <div class="form-column">
                            <label for="editTelPortable">Téléphone Portable</label>
                            <input type="tel" name="editTelPortable" id="editTelPortable" pattern="^(06|07)\d{8}$" title="Please enter a valid phone number starting with '06' or '07'" required>


                            <label for="editAdresse">Adresse</label>
                            <input type="text" name="editAdresse" id="editAdresse" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column">

                            <label for="editVille">Ville</label>
                            <input type="text" name="editVille" id="editVille" required>

                            <label for="editEmail">Email</label>
                            <input type="email" name="editEmail" id="editEmail" required>
                        </div>
                        <div class="form-column">
                            <label for="editPosition">Position</label>
                            <input type="text" name="editPosition" id="editPosition" required>

                            <label for="editFax">Fax</label>
                            <input type="tel" name="editFax" id="editFax">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column">
                            <label for="editTelPortable2">Téléphone Portable 2</label>
                            <input type="tel" name="editTelPortable2" id="editTelPortable2" pattern="^(06|07)\d{8}$" title="Please enter a valid phone number starting with '06' or '07'">

                        </div>
                        <div class="form-column">
                            <label for="editTelFixe2">Téléphone Fixe 2</label>
                            <input type="tel" name="editTelFixe2" id="editTelFixe2" pattern="^05\d{8}$" title="Please enter a valid phone number starting with '05'">

                            <label for="editCommentaire">Commentaire</label>
                            <textarea name="editCommentaire" id="editCommentaire" rows="4"></textarea>
                        </div>
                    </div>
                    <input type="hidden" id="clientId" name="clientId" />
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>


        <script src="{{ asset('jquery.min.js') }}"></script>
        <script>
            function redirectToHome() {
                window.location.href = "{{ route('home') }}";
            }

            $(document).ready(function() {
                // Get the CSRF token from the meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');



                // AJAX search function
                $('#search-input').keyup(function() {
                    var query = $(this).val();
                    var searchOption = $('input[name="search-option"]:checked').val();
                    var searchType = $('input[name="search-type"]:checked').val();

                    $.ajax({
                        url: "{{ route('list_clients.search') }}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': csrfToken // Add the CSRF token to the request headers
                        },
                        data: {
                            query: query,
                            searchOption: searchOption,
                            searchType: searchType
                        },
                        dataType: 'json',
                        beforeSend: function() {
                            // Show loading message
                            $('#loading-msg').show();
                        },
                        success: function(response) {
                            console.log('Search results:', response);

                            var tbody = '';
                            $.each(response, function(index, client) {
                                tbody += `<tr>
                                 <td style="width: 100px; font-size: 12px;">${client.Intitulé}</td>
                                <td style="width: 100px; font-size: 12px;">${client.Nom}</td>
                                <td style="width: 100px; font-size: 12px;">${client.Prénom}</td>
                                <td style="width: 100px; font-size: 12px;">${client.Societe}</td>
                                <td style="width: 100px; font-size: 12px;"><span class="highlight">${client.Tel_fix}</span></td>
                                <td style="width: 100px; font-size: 12px;"><span class="highlight">${client.Tel_fix2}</span></td>
                                <td style="width: 100px; font-size: 12px;"><span class="highlight">${client.Tel_Portable}</span></td>
                                <td style="width: 100px; font-size: 12px;"><span class="highlight">${client.Tel_Portable2}</span></td>
                                <td style="width: 100px; font-size: 12px;">${client.Fax}</td>
                               <td>
                                 <div class="button-container">
                                 <button type="button" class="delete-button" data-id="${client.id}">Supprimer</button>
                                 <button type="button" class="edit-button" id="edit-button" data-id="${client.id}">Consulter/Modifier</button>
                                 </div>
                              </td>

                            </tr>
                            `;
                            });

                            $('#client-table').html(tbody);
                        },
                        complete: function() {
                            // Hide loading message
                            $('#loading-msg').hide();
                        },
                        error: function(xhr, status, error) {
                            console.log('Error:', xhr.responseText);
                        }
                    });
                });

                // AJAX delete function
                $(document).on('click', '.delete-button', function() {
                    var clientId = $(this).data('id');

                    $.ajax({
                        url: "{{ route('clients.delete') }}",
                        method: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': csrfToken // Add the CSRF token to the request headers
                        },
                        data: {
                            id: clientId
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log('Delete response:', response);

                            // Refresh the client list after deletion
                            $('#search-input').trigger('keyup');
                        },
                        error: function(xhr, status, error) {
                            console.log('Error:', xhr.responseText);
                        }
                    });
                });

                const openModalButton = document.getElementById("open-modal-btn");
                const modalOverlay1 = document.getElementById("add-modal");

                openModalButton.addEventListener("click", () => {
                    modalOverlay1.style.display = "block";
                });

                modalOverlay1.addEventListener("click", (event) => {
                    if (event.target === modalOverlay1) {
                        modalOverlay1.style.display = "none";
                    }
                });




                const modalOverlay2 = document.getElementById("edit-modal");

                //hidin the model hehe
                $(document).on('mousedown', function(event) {
                    var modalForm = $('.modal-content');
                    if (!modalForm.is(event.target) && modalForm.has(event.target).length === 0) {
                        var editButton = $('#edit-button');
                        if (!editButton.is(event.target)) {
                            $('#edit-modal').hide();
                        }
                    }
                });








                // AJAX edit function
                $(document).on('click', '.edit-button', function() {
                    var clientId = $(this).data('id');
                    modalOverlay2.style.display = "block";

                    // Make AJAX request to retrieve client data
                    $.ajax({
                        url: '/gestion/get_client/' + clientId,
                        type: 'GET',
                        success: function(response) {
                            var clientData = response;
                            console.log(clientData);

                            // Populate form fields with client data
                            $('#editNom').val(clientData.Nom);
                            $('#editSociete').val(clientData.Societe);
                            $('#editVille').val(clientData.Ville);
                            $('#editPays').val(clientData.Pays);
                            $('#editTelFixe').val(clientData.Tel_fix);
                            $('#editTypeProspect').val(clientData.type_prospect);
                            $('#editPrenom').val(clientData.Prénom);
                            $('#editAdresse').val(clientData.Adresse);
                            $('#editTelPortable').val(clientData.Tel_Portable);
                            $('#editEmail').val(clientData.Email);
                            $('#editPosition').val(clientData.Position);
                            $('#editFax').val(clientData.Fax);
                            $('#editTelPortable2').val(clientData.Tel_Portable2);
                            $('#editIntitule').val(clientData.Intitulé);
                            $('#editTelFixe2').val(clientData.Tel_fix2);
                            $('#editCommentaire').val(clientData.Commentaire);
                            $('#clientId').val(clientData.id);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                });

                $(document).ready(function() {
                    $('#search-input').one('keyup', function() {
                        // Your keyup event handler code here
                    }).trigger('keyup');
                });

            });
        </script>
    </body>

    </html>
</x-app-layout>