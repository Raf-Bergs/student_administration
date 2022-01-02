@extends('layouts.template')

@section('title','Course')

@section('main')
    <h1>Courses</h1>
@include('courses.search')
    <div class="row">
        @foreach($courses as $course)
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $course->name }}</h5>
                    <p class="card-text">{{ $course->description }}</p>
                    <p class="card-text text-primary"> {{strtoupper($course->programme->name)}}</p>
                </div>
                @auth()
                <div class="card-footer d-flex justify-content-between">
                    <a href="course/{{$course->id}}" class="btn btn-outline-info btn-sm btn-block btn-primary text-light">Manage students</a>
                </div>
                    @endauth
            </div>
        </div>
        @endforeach
    </div>
@endsection

@section('script_after')
    <script>
        $(function () {
            // submit form when leaving text field 'artist'
            $('#course').blur(function () {
                $('#searchForm').submit();
            });
            // submit form when changing dropdown list 'genre_id'
            $('#programme_id').change(function () {
                $('#searchForm').submit();
            });
        })
    </script>
@endsection
