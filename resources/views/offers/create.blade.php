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
    <div class="container">
        <h1>Create Your Offers</h1>
    </div>

    <div class="container">
        {{-- Start Message Success Code --}}
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert"> 
                {{Session::get('success')}}
            </div>
        @endif
        {{-- Start Form Create --}}
        <form action="{{route('offers.store')}}" method="POST">
            {{-- <input type="text" name="_token" value="{{ csrf_token() }}"> --}}
            @csrf
            <div class="form-group">
                <label for="exampleInputOffer">Offer Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputOffer" aria-describedby="OfferHelp" placeholder="Enter Your Offer Name">
                @error('name')
                <small id="OfferHelp" class="form-text text-danger">{{$message}}</small>    
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPrice">Price</label>
                <input type="text" name="price" class="form-control" id="exampleInputPrice" aria-describedby="priceHelp" placeholder="Enter Your Price">
                @error('price')
                <small id="priceHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
              <div class="form-group">
                <label for="exampleInputDetails">Details</label>
                <textarea type="text" name="details" class="form-control" id="exampleInputDetails" aria-describedby="detailsHelp" placeholder="Enter YourDetails"></textarea>
                @error('details')
                <small id="detailsHelp" class="form-text text-danger">{{$message}}</small>
                @enderror
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>

</body>

</html>
