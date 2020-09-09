@extends('layouts.app')

@section('title')
ACL
@endsection

@section('content-title')
 Users
@endsection

@section('content')

    @foreach($users as $user)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td class="text-center">{{$user->name}}</td>
            <td class="text-center">{{$user->email}}</td>
    @endforeach
@endsection