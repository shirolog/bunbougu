<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>受注入力システム</title>
        <!-- bootstrap cdn -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style type="text/css">
        body{
            font-family: "Helvetica Neue",
            Arial,
            "Hiragino Kaku Gothic ProN",
            "Hiragino Sans",
            Meiryo,
            sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="font-size: 1.25rem;">受注入力システム</h1>
        <div>
            <ul style="display: flex; list-style:none">
                <li style="margin-right: 30px;"><a href="{{url('dashboard')}}">Top</a></li>
                <li style="margin-right: 30px;"><a href="{{url('juchus')}}">受注入力</a></li>
                <li><a href="{{url('./bunbougus')}}">文房具マスター</a></li>
            </ul>
        </div>
        <div>
            @yield('content')
        </div>
    </div>
</body>
</html>