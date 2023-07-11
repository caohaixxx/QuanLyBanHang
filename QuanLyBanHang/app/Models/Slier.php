<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slier extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sliders';

    protected $guarded = [];

    const ACTIVE = 0;
    const NOT_ACTIVE = 1;

    public static function checkStatus($status)
    {
        $html = '';
        switch ($status) {
            case self::ACTIVE:
                $html .= "<span>" . trans('language.active') . "</span>";
                break;
            case self::NOT_ACTIVE:
                $html .= "<span>" . trans('language.not_active') . "</span>";
                break;   
            default:
                $html .= "<span>" . trans('language.active') . "</span>";
                break;
        }
        return $html;
    }
}
