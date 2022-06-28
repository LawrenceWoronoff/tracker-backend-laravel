<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tab extends Model // Model for Tab - means database table "Tabs"
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tab_history';
    protected $fillable = ['tabId', 'title', 'tabUrl'];
}
