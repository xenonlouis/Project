<x-custom-layout>
    <!DOCTYPE html>
    <html>

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Employee List</title>
        <style>
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
                max-width: 800px;
                margin: 20px;
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
        </style>
    </head>

    <body>
        <div class="title" onclick="redirectToHome()">
            <span>Data</span> <em>Embassy</em>
        </div>
        <div class="container">
            <div class="list">
                <br> <br> <br> <br>
                <h2>Contact List</h2>
                <br>
                <table>
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Num_Telephone</th>
                        </tr>
                    </thead>
                    <tbody id="service-table">
                        <!-- Employee rows will be dynamically added here -->
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

                // AJAX request to fetch employee data
                $.ajax({
                    url: "{{ route('service') }}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Add the CSRF token to the request headers
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log('Service data:', response);

                        var tbody = '';
                        $.each(response, function(index, service) {
                            tbody += `<tr>
                                <td>${service.Service}</td>
                                <td>${service.Num_Telephone}</td>
                            </tr>`;
                        });

                        $('#service-table').html(tbody);
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', xhr.responseText);
                    }
                });
            });
        </script>
    </body>

    </html>
</x-custom-layout>