<html>
<head>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <h1>To do List</h1>
    @if ( count($errors) > 0 )
        <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach( $errors->all() as $err )
                        <li>{{$err}}</li>
                    @endforeach
                </ul>
        </div>
    @endif


<form method="post" action="/task">
    {{csrf_field()}}
    <div class="row">
        <div class="col">
            <div class="form-group">
                <input type="text" id="name" name="name" class="form-control" placeholder="Позвонить Васе">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <input type="submit" value="create" class="btn btn-success">
            </div>
        </div>
    </div>


</form>


@if( count($tasks) > 0 )
    <h3>Have tasks!</h3>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <td>date</td>
                <td>Task name</td>
                <td> - </td>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ ($task->created_at)->format('d m H:i') }}</td>
                    <td>{{$task->name}}</td>
                    <td>
                        <form method="post" action="/task/{{$task->id}}">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <input type="submit" value="delete"class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h1>No tasks</h1>
@endif
</div>
</body>
</html>