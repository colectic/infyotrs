<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Ticket",
 *      required={"costumer_user", "costumer_id", "type", "subject", "body"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="costumer_user",
 *          description="costumer_user",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="costumer_id",
 *          description="costumer_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="type",
 *          description="type",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="subject",
 *          description="subject",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="body",
 *          description="body",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Ticket extends Model
{
    use SoftDeletes;

    public $table = 'tickets';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'costumer_user',
        'costumer_id',
        'type',
        'subject',
        'body'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'costumer_user' => 'string',
        'costumer_id' => 'string',
        'type' => 'integer',
        'subject' => 'string',
        'body' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'costumer_user' => 'required',
        'costumer_id' => 'required',
        'type' => 'required',
        'subject' => 'required',
        'body' => 'required'
    ];


}
