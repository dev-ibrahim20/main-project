@extends('layouts.master')

@section('content')
    @include('includes.header')

        <div class="container" style="margin-top: 100px; margin-bottom: 500px">
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
                    <th scope="col">{{__('messages.offer photo')}}</th>
                    <th scope="col">{{__('messages.Control')}}</th>

                </tr>
                </thead>
                <tbody>
                    @foreach ($offers as $offer)
                    <tr class="offer_row{{$offer->id}}">
                        <th scope="row">{{$offer->id}}</th>
                        <td>{{$offer->name}}</td>
                        <td>{{$offer->price}}</td>
                        <td>{{$offer->details}}</td>
                        <td><img src="{{asset('images/offers/'.$offer->photo)}}" alt="" style="width: 200px"></td>
                        <td>
                            <a href="{{route('ajaxoffer.edit', $offer->id)}}" class="btn btn-primary">{{__('messages.Edit')}}</a>
                            <a href="" offer_id="{{$offer->id}}" class="delete_btn btn btn-danger">Delete by ajax</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <div class="show alert alert-success" style="display: none">تم الحذف بنجاح</div>
            <div class="container">
                <a class="btn btn-primary" href="{{route('offers.create')}}"> {{__('messages.Add New Offer')}}</a>
            </div>
        </div>
        

@stop


@section('scripts')
<script>

    $(document).on('click', '.delete_btn', function(e) {
        e.preventDefault();
        
        let offer_id = $(this).attr('offer_id');

        $.ajax({
            type: 'POST',
            url: "{{route('ajaxoffer.delete')}}",
            data: {
                '_token' : "{{csrf_token()}}",
                'id': offer_id,
            },
            success: function(data) {
                if(data.status == true)
                   $('.show').show();

                $('.offer_row'+offer_id).remove();
            },
            error: function(reject) {}    
        });
    });
</script>
@stop

