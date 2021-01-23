<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{$current}}</title>
    <style>
        body {
            padding: 20px;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .card-deck{ 
            text-align: center;
            
        } 
        .card-title {
            
            text-shadow: 1px 1px 1px darkgrey;
        }
        .card-deck {
            margin-left: 175px;
        }
        .tam {
            height: 350px;
            overflow-y:scroll;
        }
        .pos{
            margin-left: 160px;
        }
        .bts{
            margin-top: 40px;
            
        }
        .bts a{
            text-decoration: none;
            color: white;
        }
        .frm{
            width: 200px;
        }

        .top{
            margin-top: 20px;
        }

    </style>
</head>
<body>
    <div class="container">
        <x-navbar current-="current"/>
        <main role="main">
            @hasSection ('body')
                @yield('body')
            @endif
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    @hasSection ('javascript')
        @yield('javascript')
    @endif
</body>
</html>