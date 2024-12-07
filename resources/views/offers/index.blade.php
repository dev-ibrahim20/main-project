<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="height: 1000px; margin-top: 200px">
    @include('includes.header')

        <div class="container" style="margin-bottom: 100px">
            <div>
                <h1 style="color: green">Offers List</h1>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('messages.offer name')}}</th>
                    <th scope="col">{{__('messages.offer price')}}</th>
                    <th scope="col">{{__('messages.offer details')}}</th>
                    <th scope="col">{{__('messages.Control')}}</th>

                </tr>
                </thead>
                <tbody>
                    @foreach ($offers as $offer)
                    <tr>
                        <th scope="row">{{$offer->id}}</th>
                        <td>{{$offer->name}}</td>
                        <td>{{$offer->price}}</td>
                        <td>{{$offer->details}}</td>
                        <td>
                            <a href="#" class="btn btn-primary">{{__('messages.Edit')}}</a>
                            <a href="#" class="btn btn-danger">{{__('messages.Delete')}}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="container">
            <a class="btn btn-primary" href="{{route('offers.create')}}"> {{__('messages.Add New Offer')}}</a>
        </div>
</body>
</html>


