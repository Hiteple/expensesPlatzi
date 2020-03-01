<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseReport extends Model
{
    private $title;

    public function expenses() {
        return $this->hasMany(Expense::class);
    }
}
