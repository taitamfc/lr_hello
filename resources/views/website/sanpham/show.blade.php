@extends('layout.app')

@section('content')
    <h1>Trang chi tiet san pham</h1>
    <li> {{ $item->id }} - {{ $item->name }} </li>
@endsection