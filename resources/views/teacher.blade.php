@extends('header')

@section('content')
    <a href="{{ route('add_course') }}" class="btn btn-outline-primary">Add course</a>
    {{--    <iframe width="560" height="315" src="https://www.youtube.com/embed/p3l7fgvrEKM&list=RDp3l7fgvrEKM&start_radio=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Video</th>
            <th scope="col">Description</th>
            <th scope="col">Assign</th>
            <th scope="col">Deassign</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $cours)
            <tr>
                <th scope="row">{{ $cours->id }}</th>
                <td><a class="text-danger" href="">{{ $cours->title }}</a></td>
                <td>
                    <iframe width="280" height="158" src="https://www.youtube.com/embed/{{ $cours->video }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </td>
                <td>
                    {{ $cours->description }}
                </td>
                <td>
                    <form action="{{route('assign_student')}}" method="post">
                        @csrf
                        <div class="input">
                            <select class="custom-select" id="inputGroupSelect03" name="student">
                                <option selected>Students</option>
                                @foreach($students as $student)
                                    @if(!count($student->coursesStudent()->where('course_id', $cours->id)->get()))
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" id="postId" name="course" value="{{ $cours->id }}">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="submit">Assign</button>
                            </div>
                        </div>
                    </form>
                </td>
                <td>
                    <form action="{{route('deassign_student')}}" method="post">
                        @csrf
                        <div class="input">
                            <select class="custom-select" id="inputGroupSelect03" name="student">
                                <option selected>Students</option>
                                @foreach($students as $student)
                                    @if(count($student->coursesStudent()->where('course_id', $cours->id)->get()))
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" id="postId" name="course" value="{{ $cours->id }}">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="submit">Deassign</button>
                            </div>
                        </div>
                    </form>
                </td>
                <td>
                    <div class="btn_class"><a href="{{ route('edit_course', [$cours->id]) }}" class="btn btn-warning">Edit</a>
                    </div>
                    <div><a href="{{ route('delete_course', [$cours->id]) }}" class="btn btn-danger">Delete</a></div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
