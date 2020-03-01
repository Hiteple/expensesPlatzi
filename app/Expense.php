<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    private $description;
    private $amount;
    private $expense_report_id;

    public function expenseReport() {
        return $this->belongsTo(ExpenseReport::class);
    }
}
