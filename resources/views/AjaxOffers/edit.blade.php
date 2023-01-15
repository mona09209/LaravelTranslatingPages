@extends('layouts.app')

@section('content')
<div class="container">
  <div class="alert alert-success" role="alert" id="success_msg" style="display: none">
   Offer Updated successfully!
  </div>
  <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card m-4">
          <div class="card-header">
           <div class=" text-danger text-center " style=" font-family: Georgia, 'Times New Roman', Times, serif;"> {{__('messages.Add Your Offer')}}</div>
<div class="card-body ">

<form method="POST" action="" id="offerFormUpdate" enctype="multipart/form-data">
@csrf
<input type="text" style="display: none" class="form-control" value="{{$offer-> id}}" name="offer_id" id="offer_id">

<br>
<div class="form-group">
<label for="name_ar_error">{{__('messages.Offer Name ar')}}</label>
<input type="text" class="form-control" name="name_ar" value="{{$offer->name_ar}}" id="Name_ar" placeholder="{{__('messages.Offer Name ar')}}">
@error('name_ar')
<small class="form-text text-danger" id="name_ar_error">{{__($message)}}</small>
@enderror
</div>
<br>
<div class="form-group">
<label for="name_en_error">{{__('messages.Offer Name en')}}</label>
<input type="text" class="form-control" name="name_en" value="{{$offer->name_en}}" id="Name_en" placeholder="{{__('messages.Offer Name en')}}">
@error('name_en')
<small class="form-text text-danger" id="name_en_error">{{__($message)}}</small>
@enderror
</div>
<br>
<div class="form-group">
<label for="price_error">{{__('messages.Offer Price')}}</label>
<input type="number" class="form-control" name="price" value="{{$offer->price}}" id="Price" placeholder="{{__('messages.Offer Price')}}">
@error('price')
<small class="form-text text-danger" id="price_error">{{__($message)}}</small>
@enderror
</div>
<br>
<div class="form-group">
<label for="details_ar_error">{{__('messages.Details ar')}}</label>
<input type="text-area" class="form-control"  value="{{$offer->details_ar}}" name="details_ar" id="details_ar" placeholder="{{__('messages.Details ar')}}">
@error('details_ar')
<small class="form-text text-danger"  id="details_ar_error">{{__($message)}}</small>
@enderror
</div>
<br>
<div class="form-group">
<label for="details_en_error">{{__('messages.Details en')}}</label>
<input type="text-area" class="form-control" value="{{$offer->details_en}}" name="details_en" id="details_en" placeholder="{{__('messages.Details en')}}">
@error('details_en')
<small class="form-text text-danger" id="details_en_error">{{__($message)}}</small>
@enderror
</div>
<br>

<button id="update_offer" class="btn btn-primary">{{__('messages.Save Offer')}}</button>
</form>
</div>
          </div>
         </div> 
      </div>
  </div>
</div>
@stop
  

    @section('scripts')
      <script>
   $(document).on('click', '#update_offer', function (e) {
            e.preventDefault();
      
            var formData = new FormData($('#offerFormUpdate')[0]);
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('ajax.offers.update')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.status == true) {
                        $('#success_msg').show();
                  
                    }
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            });
        });

       
      </script>
     
@stop







