@extends('header')

@section('content')
<form action="{{route('create_course')}}" method="post">
    @csrf
    <div class="form-group">
        <label>Title</label>
        <input class="form-control" type="text" name="title">
    </div>
    <div class="form-group">
        <label>Insert youtube video link here</label>
        <input class="form-control" type="text" name="video">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>
@endsection
