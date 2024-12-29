<?php
namespace Vncore\Front\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;

class FrontCustomFieldDetail extends Model
{
    use \Vncore\Front\Models\ModelTrait;
    use \Vncore\Core\Admin\Models\UuidTrait;
        
    public $table          = VNCORE_DB_PREFIX.'front_custom_field_detail';
    protected $connection  = VNCORE_DB_CONNECTION;
    protected $guarded     = [];

    //Function get text description
    protected static function boot()
    {
        parent::boot();
        // before delete() method call this
        static::deleting(
            function ($obj) {
                //
            }
        );

        //Uuid
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = vncore_generate_id($type = 'CFD');
            }
        });
    }
}
