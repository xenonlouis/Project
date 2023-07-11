<x-custom-layout>
    <!DOCTYPE html>
    <html>



    <br> <br> <br> <br>

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
                max-width: 100%;
                width: auto;
                border-collapse: collapse;
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
                <h2>Client List</h2>
                <br>
                <table>
                    <thead>
                        <tr></tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Societe</th>
                        <th>Adresse</th>
                        <th>Ville</th>
                        <th>Pays</th>
                        <th>Tel_fix</th>
                        <th>Tel_Portable</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Tel_Portable2</th>
                        <th>Intitule</th>
                        <th>Tel_fix2</th>
                        <th>Fax</th>
                        <th>Commentaire</th>
                        </tr>
                    </thead>
                    <tbody id="client-table">
                        <!-- Client rows will be dynamically added here -->
                    </tbody>
                </table>
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
                                <td style="width: 100px; font-size: 12px;">${client.Nom}</td>
                                <td style="width: 100px; font-size: 12px;">${client.Prénom}</td>
                                <td style="width: 100px; font-size: 12px;">${client.Societe}</td>
                                <td style="width: 100px; font-size: 12px;">${client.Adresse}</td>
                                <td style="width: 100px; font-size: 12px;">${client.Ville}</td>
                                <td style="width: 100px; font-size: 12px;">${client.Pays}</td>
                                <td style="width: 100px; font-size: 12px;">${client.Tel_fix}</td>
                                <td style="width: 100px; font-size: 12px;">${client.Tel_Portable}</td>
                                <td style="width: 100px; font-size: 12px;">${client.Email}</td>
                                <td style="width: 100px; font-size: 12px;">${client.Position}</td>
                                <td style="width: 100px; font-size: 12px;">${client.Tel_Portable2}</td>
                                <td style="width: 100px; font-size: 12px;">${client.Intitulé}</td>
                                <td style="width: 100px; font-size: 12px;">${client.Tel_fix2}</td>
                                <td style="width: 100px; font-size: 12px;">${client.Fax}</td>
                                <td style="width: 100px; font-size: 12px;">${client.Commentaire}</td>
                            </tr>`;
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

                $(document).ready(function() {
                    $('#search-input').one('keyup', function() {
                        // Your keyup event handler code here
                    }).trigger('keyup');
                });

            });
        </script>
    </body>

    </html>
</x-custom-layout>