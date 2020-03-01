@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Delete Report {{$report->id}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="/expense-reports/{{$report->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-success">Delete</button>
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
