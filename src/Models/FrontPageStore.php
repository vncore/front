<?php
#Vncore/Front/Models/FrontPageStore.php
namespace Vncore\Front\Models;

use Illuminate\Database\Eloquent\Model;

class FrontPageStore extends Model
{
    use \Vncore\Front\Models\ModelTrait;
    
    protected $primaryKey = ['store_id', 'page_id'];
    public $incrementing  = false;
    protected $guarded    = [];
    public $timestamps    = false;
    public $table = VNCORE_DB_PREFIX.'front_page_store';
    protected $connection = VNCORE_DB_CONNECTION;
}
