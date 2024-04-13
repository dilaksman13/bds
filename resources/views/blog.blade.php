@extends('component.master')

@section('body-content')

<div>
  @if(!empty($success))
    <div class="alert alert-success"> {{ $success }}</div> <!--success message-->
  @endif
</div>

<form method="post" @if (!empty($getblogone)) action="/editblogform"  @else action="/blogform"  @endif  >
    @csrf
    <input type="hidden" name="id" @if (!empty($getblogone)) value="{{ $getblogone->id }}" @endif >
    <input type="hidden" name="pid"  value="{{ collect(request()->segments())->last() }}" >
    <div>
      <input name="title" @if (!empty($getblogone)) value="{{ $getblogone->title }}" @endif placeholder="Type Title Here" class="form-control me-2">
    </div>
    <div>
        <textarea name="discription" @if (!empty($getblogone)) value="{{ $getblogone->discription }}" @endif placeholder="Type Discription" class="form-control me-2"></textarea>
    </div>
    <div>
      <input type="email" @if (!empty($getblogone)) value="{{ $getblogone->email }}" @endif name="email" placeholder="Your Email" class="form-control me-2" required>
    </div>
    <div>
      <input type="number" @if (!empty($getblogone)) value="{{ $getblogone->contact }}" @endif name="contact" placeholder="Contact" class="form-control me-2">
    </div>
    <div>
      @if (empty($getblogone))
        <input type="submit" name="sub_blog" value="Submit" class="btn btn-success">
      @else
        <input type="submit" name="edit_blog" value="Update" class="btn btn-success">
      @endif
    </div>
</form>



<p>&nbsp;</p>

<form method="post" action="blogsearch" >
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
@if(!empty($getblogs))
<?php $i = 1 ?>
@foreach($getblogs as $getblog)
  <tbody>
    <tr>
      <th>{{ $i }}</th>
      <th>{{ $getblog->title }}</th>
      <td>{{ $getblog->discription }}</td>
      <td>{{ $getblog->email }}</td>
      <td>{{ $getblog->contact }}</td>
      <td>
      
      <a href="/blogedit/{{ $getblog->id }}"><span style="color:##0d6efd;">Edit</span></a>
      <a href="/blogdelete/{{ $getblog->id }}"><span style="color:#ff0000;">Delete</span></a>

      </td>
    </tr>
</tbody>
<?php $i++ ?>
@endforeach
@endif



</table>


@endsection