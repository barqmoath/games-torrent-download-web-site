<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
  protected $table = 'games';
  protected $fillable = [
    'id','platform_id','cat_id','title','discription','author_name','game_year','logo','torrent_file'
  ];


  public function platform()
  {
    return $this->belongsTo('App\Platform');
  }

  public function category()
  {
    return $this->belongsTo('App\Category');
  }
}
