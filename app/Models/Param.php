<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Param extends Model
{
    use HasFactory;
    protected $fillable = ["admin_id","tsena","pub","emploi","premuim","autre"];
    public function Admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
