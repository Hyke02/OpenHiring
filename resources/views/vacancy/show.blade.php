<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Application</title>
</head>
<body>
<h2>{{$vacancy->company_name}}</h2>
<h1>{{$vacancy->vacancy_name}}</h1>
<img src="{{ asset('storage/images/8665257_clock_watch_icon.svg') }}" alt="Clock Icon">
<img src="{{ asset('storage/images/3669413_location_ic_on_icon.svg') }}" alt="Location Icon">
<img src="{{ asset('storage/images/3669346_ic_symbol_euro_icon.svg') }}" alt="Euro Icon">
<img src="{{ asset('storage/images/8541636_clipboard_list_icon.svg') }}" alt="Clipboard Icon">
<img src="{{ asset('storage/images/9004762_search_find_zoom_magnifier_icon.svg') }}" alt="Search Icon">

</body>
</html>
