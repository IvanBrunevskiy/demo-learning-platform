@extends('header')

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">My courses</th>
            <th scope="col">Students in the courses</th>
        </tr>
        </thead>
        <tbody>
    @foreach($courses as $course)
        <tr>
            <td>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $course->title }}</h5>
            <p class="card-text">{{ $course->description }}</p>
        </div>
        <iframe width="560" height="316" src="https://www.youtube.com/embed/{{ $course->video }}"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
    </div>
            </td>
            <td>
                <ul class="list-group">
                    @foreach($students as $student)
                        @if(count($student->coursesStudent()->where('course_id', $course->id)->get()) && $student->name != $user_name)
                            <li class="list-group-item">{{ $student->name }}</li>
                        @endif
                    @endforeach
                </ul>
            </td>
        </tr>
    @endforeach
        </tbody>
    </table>
@endsection
