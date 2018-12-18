<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NutiritionFact
 * @package App\Models
 * @version December 18, 2018, 7:33 am UTC
 *
 * @property string title
 * @property string name
 * @property int calorie
 * @property string source
 */
class NutiritionFact extends Model
{
    use SoftDeletes;

    public $table = 'nutirition_facts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'name',
        'calorie',
        'source'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'name' => 'string',
        'source' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
