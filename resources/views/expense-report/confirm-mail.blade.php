@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Send Report</h1>
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
                <form action="/expense-reports/{{$report->id}}/send" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Title</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Type an email" value="{{old('email')}}">
                    </div>
                    <button type="submit" class="btn btn-success">Send email</button>
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
