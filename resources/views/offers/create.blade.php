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
      <br>
      <br>
            <section class="container m-5">
            
                <div class="row justify-content-center">
                    <div class="col-md-8">
                       <div class="card m-4">
                        <div class="card-header">
                         <div class=" text-danger text-center " style=" font-family: Georgia, 'Times New Roman', Times, serif;"> {{__('messages.Add Your Offer')}}</div>
<div class="card-body ">
  @if(Session::has('success'))
  <div class="alert alert-success" role="alert">
{{Session::get('success')}}
  </div>
  @endif
    <form method="post" action="{{route('offers.store')}}">
      @csrf
      <div class="form-group">
        <label for="exampleInputOfferName1">{{__('messages.Offer Name ar')}}</label>
        <input type="text" class="form-control" name="name_ar" id="exampleInputOfferName1" placeholder="Enter Offer Name">
        @error('name_ar')
             <small class="form-text text-danger">{{__($message)}}</small>
             @enderror
            </div>
      <br>
      <div class="form-group">
        <label for="exampleInputOfferName1">{{__('messages.Offer Name en')}}</label>
        <input type="text" class="form-control" name="name_en" id="exampleInputOfferName1" placeholder="Enter Offer Name">
        @error('name_en')
             <small class="form-text text-danger">{{__($message)}}</small>
             @enderror
            </div>
      <br>
      <div class="form-group">
        <label for="exampleInputOfferPrice1">{{__('messages.Offer Price')}}</label>
        <input type="number" class="form-control" name="price" id="exampleInputOfferPrice1" placeholder="Enter Offer Price">
        @error('price')
             <small class="form-text text-danger">{{__($message)}}</small>
             @enderror
      </div>
      <br>
        <div class="form-group">
          <label for="exampleInputdetails1">{{__('messages.Details ar')}}</label>
          <input type="text-area" class="form-control" name="details_ar" id="exampleInputdetails1">
          @error('details_ar')
          <small class="form-text text-danger">{{__($message)}}</small>
          @enderror
        </div>
        <br>
        <div class="form-group">
          <label for="exampleInputdetails1">{{__('messages.Details en')}}</label>
          <input type="text-area" class="form-control" name="details_en" id="exampleInputdetails1">
          @error('details_en')
          <small class="form-text text-danger">{{__($message)}}</small>
          @enderror
        </div>
        <br>
      
        <button type="submit" class="btn btn-primary">{{__('messages.Save Offer')}}</button>
      </form>
</div>
                        </div>
                       </div> 
                    </div>
                </div>
            </section>
    </body>
</html>
