<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html {
                margin: 20px;
                background: black;
            }
        </style>

        <style>
            body {
                font-family: 'Nunito';
            }
            .text-eclipse-2 {
                width: 300px;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
                display: -webkit-box;
            }
            td {
                padding: 15px !important;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <!-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endif
                </div> -->
            @endif
           
            <div style="background:black; color:white;">
                <a class="btn btn-warning float-end" href="{{ route('export') }}">Export Browsing Data</a>
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                   <h1>Browsing History</h1>
                </div>

                <div class="mt-8 bg-black dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <table class="table table-dark table-striped">
                            <tr>
                                <th>No.</th>
                                <th>Tab Title</th>
                                <th>Tab Url</th>
                                <th>Opened Time</th>
                                <th>Spent Duration</th>
                            </tr>
                            <?php $index = 0; foreach($history as $row) { $index ++;?>
                            <tr>
                                <td>{{$index}}</td>
                                <td>{{$row['title']}}</td>
                                <td><p class='text-eclipse-2'>{{$row['tabUrl']}}</p></td>
                                <td>{{$row['created_at']}}</td>
                                <td>{{$row['duration']}}</td>
                            </tr>
                            <?php }?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
