<?php

namespace App\Http\Controllers;

use App\ExpenseReport;
use App\Mail\SummaryReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ExpenseReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expense-report.index', ['expenseReports' => ExpenseReport::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expense-report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationCheck = $request->validate([
            'title' => 'required|min:3'
        ]);

        $report = new ExpenseReport();
        $report->title = $validationCheck['title'];
        $report->save();

        return redirect('expense-reports');
    }

    /**
     * Display the specified resource.
     *
     * @param  ExpenseReport $expenseReport
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseReport $expenseReport)
    {
        return view('expense-report.show', ['report' => $expenseReport]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = ExpenseReport::find($id);
        return view('expense-report.edit', ['report' => $report]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $report = ExpenseReport::find($id);
        $report->title = $data['title'];
        $report->save();

        return redirect('/expense-reports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = ExpenseReport::find($id);
        $report->delete();

        return redirect('/expense-reports');
    }

    public function confirmDelete($id) {
        $report = ExpenseReport::find($id);
        return view('expense-report.confirm-delete', ['report' => $report]);
    }

    public function confirmSendMail($id) {
        $report = ExpenseReport::find($id);
        return view('expense-report.confirm-mail', ['report' => $report]);
    }

    public function sendMail(Request $request, $id) {
        $report = ExpenseReport::find($id);
        Mail::to($request->get('email'))->send(new SummaryReport($report));

        return redirect('/expense-reports');
    }
}
