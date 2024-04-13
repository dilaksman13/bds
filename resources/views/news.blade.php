@extends('component.master')

@section('body-content')

<div>
<h1>News</h1>
@if(!empty($success))
  <div class="alert alert-success"> {{ $success }}</div>
@endif
</div>

<form method="post" @if (!empty($getnewsone)) action="/editnewsform"  @else action="/newsform"  @endif  >
    @csrf
    <input type="hidden" name="id" @if (!empty($getnewsone)) value="{{ $getnewsone->id }}" @endif >
<div>
    <input name="title" @if (!empty($getnewsone)) value="{{ $getnewsone->title }}" @endif  placeholder="Type Title Here" class="form-control me-2">
</div>
<div>
    <textarea name="description" @if (!empty($getnewsone)) value="{{ $getnewsone->description }}" @endif  placeholder="Type Description" class="form-control me-2"></textarea>
</div>
<div>
<input type="email" @if (!empty($getnewsone)) value="{{ $getnewsone->email }}" @endif  name="email" placeholder="Your Email" class="form-control me-2">
</div>
<div>
<input type="number" @if (!empty($getnewsone)) value="{{ $getnewsone->contact }}" @endif  name="contact" placeholder="Contact" class="form-control me-2">
</div>

<div>
@if (empty($getnewsone))
    <input type="submit" name="sub_news" value="Submit" class="btn btn-success">
    @else
    <input type="submit" name="edit_news" value="Update" class="btn btn-success">
    @endif
</div>
</form>

<p>&nbsp;</p>

<form method="get" action="newssearch" >
@csrf
<div class="row">
<div class="col-lg-4"><input type="text" name="searchv" placeholder="search" class="form-control me-2"></div>
<div class="col-lg-4"><input type="submit" name="search" value="search" class="btn btn-outline-success"> </div>
</div>
</form>


<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">TITLE</th>
      <th scope="col">DES</th>
      <th scope="col">EMAIL</th>
      <th scope="col">CONTACT</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
@if(!empty($getnews))
<?php $i = 1 ?>
@foreach($getnews as $getsinglenews)
  <tbody>
    <tr>
      <th>{{ $i }}</th>
      <th>{{ $getsinglenews->title }}</th>
      <td>{{ $getsinglenews->description }}</td>
      <td>{{ $getsinglenews->email }}</td>
      <td>{{ $getsinglenews->contact }}</td>
      <td>
      <a href="/newsedit/{{ $getsinglenews->id }}"><span style="color:##0d6efd;">Edit</span></a>
      <a href="/newsdelete/{{ $getsinglenews->id }}" onclick="return confirm('Are you sure you want to delete this item?');"><span style="color:#ff0000;">Delete</span></a>
      </td>
    </tr>
</tbody>
<?php $i++ ?>
@endforeach
@endif
</table>


@endsection

