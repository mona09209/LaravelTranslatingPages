<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{URL::asset('css/styles.css')}}" rel="stylesheet" />

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            },
           
        </style>
    </head>
    <body class="antialiased" dir="{{(App::isLocale('ar')?'rtl':'ltr')}}">
        @include('includes.header1')
        @for ($i = 0; $i < 5; $i++)
        <br>
    @endfor
<div class="container w-50">
<div class="card" >
    <div class="card-header text-success text-center">
       <h3> {{__('messages.video viewer')}} : ({{ $video->viewers}})</h3>
    </div>
    <div class="card-body" >
        <iframe width="630" height="350" src="https://www.youtube.com/embed/bxE_xho3d8o" title="Top 10 Login Form UI Design using HTML CSS - Neumorphism Effect | Login form design html css" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

    </div>
</div>
</div>
    </body>
</html>
