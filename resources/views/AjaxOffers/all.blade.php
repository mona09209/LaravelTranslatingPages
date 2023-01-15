@extends('layouts.app')
       
        @section('content')
<div class="container">
 
 
     <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('messages.Offer Name')}}</th>
            <th scope="col">{{__('messages.Offer Price')}}</th>
            <th scope="col">{{__('messages.Offer Details')}}</th>
            <th scope="col">Offer Photo</th>
            <th scope="col" class="text-center">{{__('messages.Operations')}}</th>
        </tr>
        </thead>
        <tbody>


        @foreach($offers as $offer)
            <tr class="offerRow{{$offer -> id}}">
                <th scope="row">{{$offer -> id}}</th>
                <td>{{$offer -> name}}</td>
                <td>{{$offer -> price}}</td>
                <td>{{$offer -> details}}</td>
                <td><img  style="width: 90px; height: 90px;" src="{{asset('images/offers/'.$offer->photo)}}"></td>
                
                <td class="text-center">
                   
                    <a href="" offer_id="{{$offer -> id}}"  class="delete_btn btn btn-danger"> Delete   </a>
                    &nbsp;
                    <a href="{{route('ajax.offers.edit',$offer -> id)}}" class="btn btn-success"> Update</a>
                </td>

            </tr>
        @endforeach

        </tbody>



    </table>

</div>


@stop
@section('scripts')
    <script>
        $(document).on('click', '.delete_btn', function (e) {
            e.preventDefault();
            var offer_id = $(this).attr('offer_id');
              /* var offer_id =  $(this).attr('offer_id'); */
            $.ajax({
                type: 'post',
                 url: "{{route('ajax.offers.delete')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id' :offer_id
                },
                success: function (data) {
               
                    $('.offerRow'+data.id).remove();
                }, error: function (reject) {
                }
            });
        });
    </script>
@stop
   