<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currency';
    protected $fillable = [
        'valueID', 'numCode', 'charCode', 'name', 'value', 'date'
    ];

    protected $casts = [
        'date' => 'datetime:Y-m-d',
    ];

    public static $URL = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=';



}
