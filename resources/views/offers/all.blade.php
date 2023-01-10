<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MoonTech</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{URL::asset('css/styles.css')}}" rel="stylesheet" />
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body dir="{{(App::isLocale('ar')?'rtl':'ltr')}}">
      @include('includes.header1')

            @for ($i = 0; $i < 5; $i++)
                <br>
            @endfor
           
<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">{{__('messages.Offer Name ar')}}</th>
        <th scope="col">{{__('messages.Offer Name en')}}</th>
        <th scope="col">{{__('messages.Offer Price')}}</th>
        <th scope="col">{{__('messages.Offer Details ar')}}</th>
        <th scope="col">{{__('messages.Offer Details en')}}</th>
        <th scope="col">{{__('messages.Operation')}}</th>
        <th scope="col">{{__('messages.Offer Photo')}}</th>
      </tr>
    </thead>
    <tbody>
  
      @foreach ($offers as $offer)
    
      <tr>
        <th scope="row">{{$offer -> id}}</th>
        <td>{{$offer -> name_ar}}</td>
        <td>{{$offer -> name_en}}</td>
        <td>{{$offer -> price}}</td>
        <td>{{$offer -> details_ar}}</td>
        <td>{{$offer -> details_en}}</td>
        <td>{{$offer -> photo}}</td>
        <td>
    <a href="{{url('offers/edit/'.$offer -> id)}}" type="submit" class="btn btn-primary">{{__('messages.Update')}}</a>
        </td>
      </tr>
  
      @endforeach
    </tbody>
  </table>

</div>
    </body>
</html>
