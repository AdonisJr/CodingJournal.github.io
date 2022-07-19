
@extends('layout')

@section('content')



<div class="container">
    
    <form class="card" action="{{route('journals.update', $journal->id)}}" method="post">
    @csrf

    @method('PATCH')
    <div class="card-header">
        <h1 class="text-center">Edit Page</h1>
    </div>
    <div class="card-body d-flex flex-column gap-2">

        <label for="">Tasks/Thoughts</label>
            <input value="{{$journal->data}}" class="form-control" type="text" name="data">
      
        <div>
            <label for="">Date</label>
            <input value="{{$journal->date}}" class="form-control" type="date" name="date">
        </div>
        <div>
            <label for="">Type</label>
            <select name="type" id="type" class="form-control">
                <option {{$journal->type  == 'tasks' ? 'selected' : ''}} value="tasks">Tasks</option>
                <option {{$journal->type == 'thoughts' ? 'selected' : ''}}  value="thoughts">Thoughts</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>

    </div>

    </form>
</div>


@endsection