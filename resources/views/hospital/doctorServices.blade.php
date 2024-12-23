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
                        <th scope="col">Services</th>
                        <th scope="col">{{__('messages.Control')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($service) && count($service) > 0)
                        @foreach ($service as $serv)
                            <tr>
                                <th scope="row">{{$serv->id}}</th>
                                <td>{{$serv->name}}</td>
                                <td></td>
                                {{-- <td>{{$doc->title}}</td>
                                <td><a href="{{route('services', $doc->id)}}" class="btn btn-success">عرض الخدمات</a></td> --}}
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <br>
        </div>
        

@stop