<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="CustomerUsers",
 *      required={"id", "login", "email", "customer_id", "first_name", "last_name", "email_ext00", "email_ext01", "valid_id", "create_time", "create_by", "change_time", "change_by"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="login",
 *          description="login",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="customer_id",
 *          description="customer_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pw",
 *          description="pw",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="title",
 *          description="title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="first_name",
 *          description="first_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="last_name",
 *          description="last_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="phone",
 *          description="phone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="mobile",
 *          description="mobile",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email_ext00",
 *          description="email_ext00",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email_ext01",
 *          description="email_ext01",
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
class CustomerUsers extends Model
{
    use SoftDeletes;

    public $table = 'customer_user';
    public $timestamps = false;

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id',
        'login',
        'email',
        'customer_id',
        'pw',
        'title',
        'first_name',
        'last_name',
        'phone',
        'mobile',
        'email_ext00',
        'email_ext01',
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
        'login' => 'string',
        'email' => 'string',
        'customer_id' => 'string',
        'pw' => 'string',
        'title' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'phone' => 'string',
        'mobile' => 'string',
        'email_ext00' => 'string',
        'email_ext01' => 'string',
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
        'id' => 'required',
        'login' => 'required',
        'email' => 'required',
        'customer_id' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'email_ext00' => 'required',
        'email_ext01' => 'required',
        'valid_id' => 'required',
        'create_time' => 'required',
        'create_by' => 'required',
        'change_time' => 'required',
        'change_by' => 'required'
    ];


}
