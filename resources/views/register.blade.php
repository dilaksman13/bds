@extends('component.master')

@section('body-content')

<div>
    <h1>Registation Form</h1>
</div>
<div>

@if(!empty($success))
  <div class="alert alert-success"> {{ $success }}</div>
@endif

<form method="post" @if (!empty($getregone)) action="/editregisterform"  @else action="/registerform"  @endif  >
    @csrf

    <input type="hidden" name="id" @if (!empty($getregone)) value="{{ $getregone->id }}" @endif >  
<div>
    <input name="firstname" @if (!empty($getregone)) value="{{ $getregone->firstname }}" @endif placeholder="Type your first name" class="form-control me-2" required>
</div>
<div>
    <input name="lastname" @if (!empty($getregone)) value="{{ $getregone->lastname }}" @endif  placeholder="Type your last name" class="form-control me-2" required>
</div>
<div>
<input type="text"  @if (!empty($getregone)) value="{{ $getregone->address }}" @endif name="address" placeholder="Your address" class="form-control me-2">
</div>
<div>
<input type="text"  @if (!empty($getregone)) value="{{ $getregone->email }}" @endif name="email" placeholder="your mail" class="form-control me-2" required>
</div>
<div>
<input type="number"  @if (!empty($getregone)) value="{{ $getregone->contact }}" @endif name="contact" placeholder="your phone number" class="form-control me-2">
</div>
@if (empty($getregone))
<div>
<input type="password" name="password" placeholder="Type your password" class="form-control me-2">
</div>
@endif
<div>
@if (empty($getregone))
    <input type="submit" name="sub_register" value="Submit" class="btn btn-success">
    @else
    <input type="submit" name="edit_register" value="Update" class="btn btn-success">
    @endif
</div>

</form>

<p>&nbsp;</p>

<form method="post" action="registersearch" >
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
            <th scope="col">FIRSTNAME</th>
            <th scope="col">LASTNAME</th>
            <th scope="col">ADDRESS</th>
            <th scope="col">EMAIL</th>
            <th scope="col">CONTACT</th>
            <th scope="col">ACTION</th>
            
        </tr>
    </thead>
@if (!empty($getregister))
<?php $i = 1 ?>
@foreach($getregister as $getregister)
    <tbody>
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $getregister->firstname}}</td>
            <td>{{ $getregister->lastname}}</td>
            <td>{{ $getregister->address}}</td>
            <td>{{ $getregister->email}}</td>
            <td>{{ $getregister->contact}}</td>
            <td>
            <a href="/blog/{{ $getregister->id }}" target="_blank"><span style="color:##0d6efd;">Add Blog</span></a>
            <a href="/registeredit/{{ $getregister->id }}"><span style="color:##0d6efd;">Edit</span></a>
            <a href="/registerdelete/{{ $getregister->id }}"><span style="color:#ff0000;">Delete</span></a>

            </td>
        </tr>
    </tbody>
<?php $i++ ?>
@endforeach
@endif

</table>
@endsection


