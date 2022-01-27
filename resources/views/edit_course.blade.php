@extends('header')

@section('content')
    <form action="{{ route('update_course', [$courses->id]) }}" method="post">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input class="form-control" type="text" value="{{ $courses->title }}" name="title">
        </div>
        <div class="form-group">
            <label>Insert youtube video link here</label>
            <input class="form-control" type="text" value="{{ $courses->video }}" name="video">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                      name="description">{{ $courses->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
