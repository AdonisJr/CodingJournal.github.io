@extends('layout')

@section('content')

<div class="row my-5">
@if (session()->get('success'))

<div class="alert alert-success">
    {{session()->get('success')}}
</div>

@endif
<div class="container col-sm-3">

    <form class="card" action="{{route('journals.store')}}" method="post">
        @csrf
        <div class="card-header">
            <h3>Add List</h3>
        </div>
        <div class="card-body d-flex flex-column gap-2">
            <label for="">Tasks/Thoughts</label>
                <input class="form-control" type="text" name="data">
            
                <div>
                    <label for="">Date</label>
                    <input class="form-control" type="date" name="date">
                </div>
                <div>
                    <label for="">Type</label>
                    <select name="type" id="type" class="form-control">
                        <option value="tasks">Tasks</option>
                        <option value="thoughts">Thoughts</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary form-control">Save</button>
        
            </div>
    </form>
</div>
<div class="row col-sm-9 bg-dark">
    
    <div class="col-sm-6">
        <h3 class="text-light text-center my-3">Thoughts</h3>
            <table class="table table-striped text-light">
                <thead class="bg-primary">
                    <tr>
                        <th>Thoughts</th>
                        <th>Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-light text-dark">
                    @foreach($journal as $content)
                        @if($content->type == 'thoughts')
                        <tr>
                            <td>{{$content->data}}</td>
                            <td>{{$content->date}}</td>
                            <td class="d-flex justify-content-end">
                                <a href="{{route('journals.edit', $content->id)}}" class="btn text-success sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                        </svg>
                                </a>
                                <form action="{{route('journals.destroy', $content->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn text-danger sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon" viewBox="0 0 16 16">
                                            <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-6">
            <h3 class="text-light text-center my-3">Tasks</h3>
            <table class="table table-striped">
                <thead class="bg-success text-light">
                    <tr>
                        <th>Tasks</th>
                        <th>Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-light">
                    @foreach($journal as $content)
                        @if($content->type == 'tasks')
                        <tr>
                            <td>{{$content->data}}</td>
                            <td>{{$content->date}}</td>
                            <td class="d-flex justify-content-end">
                                <a href="{{route('journals.edit', $content->id)}}" class="btn text-success sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                        </svg>
                                </a>
                                <form action="{{route('journals.destroy', $content->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn text-danger sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon" viewBox="0 0 16 16">
                                            <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endif
                    @endforeach
            </tbody>
            </table>
        
        
        </div>
</div>
    
</div>

@endsection