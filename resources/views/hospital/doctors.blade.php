@extends('layouts.master')

@section('content')
    @include('includes.header')

        <div class="container" style="margin-top: 100px; margin-bottom: 500px">
            <div>
                <h1 style="color: green">Doctors List</h1>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Doctors Name</th>
                        <th scope="col">degrree</th>
                        <th scope="col">{{__('messages.Control')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($doctor) && count($doctor) > 0)
                        @foreach ($doctor as $doc)
                            <tr>
                                <th scope="row">{{$doc->id}}</th>
                                <td>{{$doc->name}}</td>
                                <td>{{$doc->title}}</td>
                                <td><a href="{{route('doctors-services', $doc->id)}}" class="btn btn-success">عرض الخدمات</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <br>
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

