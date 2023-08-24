<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leave extends Model
{
    use HasFactory;
    protected $fillable=['subject','message','reason','start_date','end_date','status','employee_id'];


    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
