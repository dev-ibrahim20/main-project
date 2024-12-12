@extends('layouts.master')

@section('content')
    {{--Start Header Code--}}
    @include('includes.header')
    {{-- End Header Code --}}


    <div class="container">
        <h1>{{__('messages.Add New Offer')}} Hi</h1>
    </div>

    <div class="container">
        {{-- Start Message Success Code --}}
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert"> 
                {{Session::get('success')}}
            </div>
        @endif
        
        {{-- Start Form Create --}}
        <form id="offer_form_Update" action="{{route('ajaxoffer.update', $offer->id)}}" method="POST" style="margin-top: 180px; margin-bottom: 180px">
            {{-- <input type="text" name="_token" value="{{ csrf_token() }}"> --}}
            @csrf
            <h1 style="color: green">Edits Offer</h1>
            <input type="text" name="offer_id" class="form-control" style="display: none" value="{{$offer->id}}">
            <div class="form-group">
                <label for="exampleInputOffer">{{__('messages.offer photo')}}</label>
                <input type="file" name="image" class="form-control" id="exampleInputOffer" aria-describedby="OfferHelp" placeholder="Enter Your Offer Photo">
                @error('photo')
                <small id="OfferHelp" class="form-text text-danger">{{$message}}</small>    
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputOffer">{{__('messages.Offer Name ar')}}</label>
                <input type="text" name="name_ar" class="form-control" id="exampleInputOffer" aria-describedby="OfferHelp" placeholder="Enter Your Offer Name" value="{{$offer->name_ar}}">
                @error('name_ar')
                <small id="OfferHelp" class="form-text text-danger">{{$message}}</small>    
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputOffer">{{__('messages.Offer Name en')}}</label>
                <input type="text" name="name_en" class="form-control" id="exampleInputOffer" aria-describedby="OfferHelp" placeholder="Enter Your Offer Name" value="{{$offer->name_en}}">
                @error('name_en')
                <small id="OfferHelp" class="form-text text-danger">{{$message}}</small>    
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPrice">{{__('messages.Price')}}</label>
                <input type="text" name="price" class="form-control" id="exampleInputPrice" aria-describedby="priceHelp" placeholder="Enter Your Price" value="{{$offer->price}}">
                @error('price')
                <small id="priceHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputDetails">{{__('messages.Offer Details ar')}}</label>
                <textarea type="text" name="details_ar" class="form-control" id="exampleInputDetails" aria-describedby="detailsHelp" placeholder="Enter YourDetails">{{$offer->details_ar}}</textarea>
                @error('details_ar')
                <small id="detailsHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputDetails">{{__('messages.Offer Details en')}}</label>
                <textarea type="text" name="details_en" class="form-control" id="exampleInputDetails" aria-describedby="detailsHelp" placeholder="Enter YourDetails">{{$offer->details_en}}</textarea>
                @error('details_en')
                <small id="detailsHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <br>
            <button id="update_offer" type="submit" class="btn btn-primary">{{__('messages.Submit')}}</button>
          </form>
    </div>
    
@endsection

@section('scripts')
<script>

$(document).on('click', '#update_offer', function(e) {
    e.preventDefault();
    var formData = new FormData($("#offer_form_Update")[0]);

    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,  
        url: "{{route('ajaxoffer.update')}}",
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