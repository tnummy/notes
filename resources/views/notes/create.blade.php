@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    @isset($noteData['id'])
                        <div class="panel-heading">Edit Note</div>
                    @else
                        <div class="panel-heading">Create New Note</div>
                    @endif

                    <div class="panel-body">

                        @isset($noteData['id'])
                            <form class="form-horizontal" method="POST" action="{{ route('updateNote', ['id' => $noteData['id']]) }}">
                        @else
                            <form class="form-horizontal" method="POST" action="{{ route('storeNote') }}">
                        @endif

                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $noteData['title'] or ''}}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Body</label>

                                <div class="col-md-6">
                                    <textarea rows="4" cols="50" id="body" class="form-control" name="body" placeholder="Add a note body." required>{{ $noteData['body'] or '' }}</textarea>

                                    @if ($errors->has('body'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        @isset($noteData['id'])
                                            Edit Note
                                        @else
                                            Create Note
                                        @endif
                                    </button>
                                </div>
                            </div>

                            </form>

                            @isset($noteData['id'])
                             <form class="form-horizontal" method="POST" action="{{ route('deleteNote', ['id' => $noteData['id']]) }}">
                                 {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-warning">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </form>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
