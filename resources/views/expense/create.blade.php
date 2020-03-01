@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>New Expense</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/expense-reports/{{$report->id}}/created" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" id="description" name="description" class="form-control" placeholder="Type a description" value="{{old('description')}}">
                        <label for="amount">Amount</label>
                        <input type="text" id="amount" name="amount" class="form-control" placeholder="Type a amount" value="{{old('amount')}}">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-secondary" href="/expense-reports/{{$report->id}}">Back</a>
            </div>
        </div>
    </div>
@endsection
