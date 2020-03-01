@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Edit Report {{$report->id}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="/expense-reports/{{$report->id}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Type a title">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-secondary" href="/expense-reports">Back</a>
            </div>
        </div>
    </div>
@endsection
