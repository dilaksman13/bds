@extends('component.master')

@section('body-content')

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">TITLE</th>
      <th scope="col">DES</th>
      <th scope="col">EMAIL</th>
      <th scope="col">CONTACT</th>
    </tr>
  </thead>
@if(!empty($searchres))
<?php $i = 1 ?>
@foreach($searchres as $searchres_single)
  <tbody>
    <tr>
      <th>{{ $i }}</th>
      <th>{{ $searchres_single->title }}</th>
      <td>{{ $searchres_single->discription }}</td>
      <td>{{ $searchres_single->email }}</td>
      <td>{{ $searchres_single->contact }}</td>
    </tr>
</tbody>
<?php $i++ ?>
@endforeach
@endif


@endsection