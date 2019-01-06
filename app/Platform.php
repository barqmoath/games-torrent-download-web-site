<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
  protected $table = 'platforms';
  protected $fillable = [
    'id','title'
  ];
  public function games()
  {
    return $this->hasMany('App\Game');
  }
}
