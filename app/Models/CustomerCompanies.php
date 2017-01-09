<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="CustomerCompanies",
 *      required={"customer_id", "name", "CIF", "comarca", "provincia", "ambit_actuacio", "forma_juridica", "via_coneixement", "valid_id", "create_time", "create_by", "change_time", "change_by"},
 *      @SWG\Property(
 *          property="customer_id",
 *          description="customer_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="CIF",
 *          description="CIF",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="city",
 *          description="city",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="comarca",
 *          description="comarca",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="provincia",
 *          description="provincia",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ambit_actuacio",
 *          description="ambit_actuacio",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="forma_juridica",
 *          description="forma_juridica",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="via_coneixement",
 *          description="via_coneixement",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="comments",
 *          description="comments",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="valid_id",
 *          description="valid_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="create_by",
 *          description="create_by",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="change_by",
 *          description="change_by",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class CustomerCompanies extends Model
{
    use SoftDeletes;

    public $table = 'customer_company';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'customer_id',
        'name',
        'CIF',
        'city',
        'comarca',
        'provincia',
        'ambit_actuacio',
        'forma_juridica',
        'via_coneixement',
        'comments',
        'valid_id',
        'create_time',
        'create_by',
        'change_time',
        'change_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'customer_id' => 'string',
        'name' => 'string',
        'CIF' => 'string',
        'city' => 'string',
        'comarca' => 'string',
        'provincia' => 'string',
        'ambit_actuacio' => 'string',
        'forma_juridica' => 'string',
        'via_coneixement' => 'string',
        'comments' => 'string',
        'valid_id' => 'integer',
        'create_time' => 'datetime',
        'create_by' => 'integer',
        'change_time' => 'datetime',
        'change_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'customer_id' => 'required',
        'name' => 'required',
        'CIF' => 'required',
        'comarca' => 'required',
        'provincia' => 'required',
        'ambit_actuacio' => 'required',
        'forma_juridica' => 'required',
        'via_coneixement' => 'required',
        'valid_id' => 'required',
        'create_time' => 'required',
        'create_by' => 'required',
        'change_time' => 'required',
        'change_by' => 'required'
    ];

    
}
