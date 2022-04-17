@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <h1>タスク一覧</h1>
        
        @if(count($tasks) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>タスク</th>
                        <th>進捗</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!}</td>
                            <td>{{ $task->content }}</td>
                            <td>{{ $task->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        
        {!! link_to_route('tasks.create', 'タスクの追加', [], ['class' => 'btn btn-primary']) !!}
    @else
        <div class="jumbotron">
            <div class="text-center">
                <h1>Welcome to the Tasklist</h1>
                
                {!! link_to_route('signup.post', 'Sign up now!', [], ['class' => 'btn btn-primary btn-lg']) !!}
            </div>
        </div>
    @endif
@endsection