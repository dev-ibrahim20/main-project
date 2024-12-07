<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    {{--Start Header Code--}}
    @include('includes.header')
    {{-- End Header Code --}}


    <div class="container">
        <h1>{{__('messages.Add New Offer')}}</h1>
    </div>

    <div class="container">
        {{-- Start Message Success Code --}}
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert"> 
                {{Session::get('success')}}
            </div>
        @endif
        {{-- Start Form Create --}}
        <form action="{{route('offers.store')}}" method="POST" style="margin-top: 180px">
            {{-- <input type="text" name="_token" value="{{ csrf_token() }}"> --}}
            @csrf
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
            <button type="submit" class="btn btn-primary">{{__('messages.Submit')}}</button>
          </form>
    </div>

</body>

</html>
