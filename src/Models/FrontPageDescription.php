<?php
#Vncore/Front/Models/FrontPageDescription.php
namespace Vncore\Front\Models;

use Illuminate\Database\Eloquent\Model;

class FrontPageDescription extends Model
{
    use \Vncore\Core\Admin\Models\UuidTrait;
    
    protected $primaryKey = ['lang', 'page_id'];
    public $incrementing  = false;
    protected $guarded    = [];
    public $timestamps    = false;
    public $table = VNCORE_DB_PREFIX.'front_page_description';
    protected $connection = VNCORE_DB_CONNECTION;
}
