<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\AttachUnit;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Unit;
use App\Models\ExpenseType;
use App\Models\GlAccount;

class Expense extends Model
{
    use HasFactory, AttachUnit;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'expense_type_id', 'gl_account_id', 'expense_date', 'amount', 'comments', 'vendor_id', 'period_end', 'unit_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

    ];
    
    /**
     * Get the unit owns the catering order.
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
    
    /**
     * Get the type that owns the expense.
     */
    public function expenseType(): BelongsTo
    {
        return $this->belongsTo(ExpenseType::class);
    }
    
    /**
     * Get the gl account that owns the purchase charge.
     */
    public function glAccount(): BelongsTo
    {
        return $this->belongsTo(GlAccount::class);
    }
    
    /**
     * Get the vendor owns the purchase.
     */
    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }
}
