<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Todo List App</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <h1 class="text-center">Todo List Edit</h1>

            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Success:</strong>
                    {{ Session::get('success') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Error:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tasks.update', [$task->id]) }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="text" name="updatedTaskName" class="form-control input-lg" value="{{ $task->name }}">
                </div>

                <div class="form-group">
                    <input type="submit" value="Save Changes" class="btn btn-success btn-lg">
                    <a href="{{ route('tasks.index') }}" class="btn btn-danger btn-lg float-right">Go Back</a>
                </div>

            </form>

        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <div class="text-center">Copyright © @php echo date('Y'); @endphp {{ config('app.name') }} All Rights Reserved.</div>
    </div>
</footer>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>