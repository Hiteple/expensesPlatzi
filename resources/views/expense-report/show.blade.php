@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Report {{$report->title}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Details</h3>
                <table class="table">
                    @foreach($report->expenses as $expense)
                        <tr>
                            <td>{{$expense->description}}</td>
                            <td>{{$expense->created_at}}</td>
                            <td>{{$expense->amount}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href="/expense-reports/{{$report->id}}/expenses/create">New Expense</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-secondary" href="/expense-reports">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-success" href="/expense-reports/{{$report->id}}/confirm-send-mail">Send email</a>
            </div>
        </div>
    </div>
@endsection
