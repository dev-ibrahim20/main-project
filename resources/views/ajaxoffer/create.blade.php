@extends('layouts.master')

@section('content')
 {{--Start Header Code--}}
 @include('includes.header')
 {{-- End Header Code --}}



 <div class="container" style="margin-top: 180px; margin-bottom: 180px">
    <div class="container">
        <h1>Add New Offer</h1>
    </div>
     {{-- Start Message Success Code --}}
     @if (Session::has('success'))
         <div class="alert alert-success" role="alert"> 
             {{Session::get('success')}}
         </div>
     @endif
     {{-- Start Form Create --}}
     <form  id= "offer_form" action="{{route('offers.store')}}" method="POST" enctype="multipart/form-data">
         {{-- <input type="text" name="_token" value="{{ csrf_token() }}"> --}}
         @csrf
         <div class="form-group">
             <label for="exampleInputOffer">{{__('messages.offer photo')}}</label>
             <input type="file" name="image" class="form-control" id="exampleInputOffer" aria-describedby="OfferHelp" placeholder="Enter Your Offer Photo">
             @error('photo')
             <small id="OfferHelp" class="form-text text-danger">{{$message}}</small>    
             @enderror
         </div>
         <div class="form-group">
             <label for="exampleInputOffer">{{__('messages.Offer Name ar')}}</label>
             <input type="text" name="name_ar" class="form-control" id="exampleInputOffer" aria-describedby="OfferHelp" placeholder="Enter Your Offer Name">
             @error('name_ar')
             <small id="OfferHelp" class="form-text text-danger">{{$message}}</small>    
             @enderror
         </div>
         <div class="form-group">
             <label for="exampleInputOffer">{{__('messages.Offer Name en')}}</label>
             <input type="text" name="name_en" class="form-control" id="exampleInputOffer" aria-describedby="OfferHelp" placeholder="Enter Your Offer Name">
             @error('name_en')
             <small id="OfferHelp" class="form-text text-danger">{{$message}}</small>    
             @enderror
         </div>
         <div class="form-group">
             <label for="exampleInputPrice">{{__('messages.Price')}}</label>
             <input type="text" name="price" class="form-control" id="exampleInputPrice" aria-describedby="priceHelp" placeholder="Enter Your Price">
             @error('price')
             <small id="priceHelp" class="form-text text-danger">{{$message}}</small>
             @enderror
         </div>
         <div class="form-group">
             <label for="exampleInputDetails">{{__('messages.Offer Details ar')}}</label>
             <textarea type="text" name="details_ar" class="form-control" id="exampleInputDetails" aria-describedby="detailsHelp" placeholder="Enter YourDetails"></textarea>
             @error('details_ar')
             <small id="detailsHelp" class="form-text text-danger">{{$message}}</small>
             @enderror
         </div>
         <div class="form-group">
             <label for="exampleInputDetails">{{__('messages.Offer Details en')}}</label>
             <textarea type="text" name="details_en" class="form-control" id="exampleInputDetails" aria-describedby="detailsHelp" placeholder="Enter YourDetails"></textarea>
             @error('details_en')
             <small id="detailsHelp" class="form-text text-danger">{{$message}}</small>
             @enderror
         </div>
         <br>
         <button id="save_offer" class="btn btn-primary">{{__('messages.Submit')}}</button>
       </form>
 </div>
@stop

@section('scripts')
<script>

    $(document).on('click', '#save_offer', function(e) {
        e.preventDefault();
        var formData = new FormData($("#offer_form")[0]);

        $.ajax({
            type: 'POST',
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,  
            url: "{{route('ajaxoffer.store')}}",
            data: formData,
            success: function(data) {
                if(data.status == true)
                    alert(data.msg);
            },
            error: function(reject) {}    
        });
    });
</script>
@stop