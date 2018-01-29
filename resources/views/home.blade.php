@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard <a class="right" href="{{ route('createNote') }}">+ Create New Note</a></div>

                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @forelse ($notes as $section)
                        <div class="row">
                            @foreach ($section as $note)
                                <div class="col-md-4">
                                    <h2>{{$note->title}}</h2>
                                    <p><i>{{date(config('app.date_format', 'm-d-Y'), strtotime($note->created_at))}}</i></p>
                                    <p>{{$note->body}}</p>
                                    <p><a class="btn btn-default" href="{{ route('editNote', ['id' => $note->id]) }}" role="button">Edit &raquo;</a></p>
                                </div>
                            @endforeach
                        </div>
                    @empty
                        <div class="row">
                            <div class="col-md-4">
                                <p>No notes! <a href="{{ route('createNote') }}">Add one</a></p>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
