<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Platform;
use App\Game;
use App\Image;
use DB;

class HomeController extends Controller
{
  // Home
  public function index()
  {
    $categories = Category::orderBy('title')->get();
    $platforms  = Platform::orderBy('title')->get();
    return view('home')->with([
      'categories' => $categories,
      'platforms'  => $platforms,
    ]);
  }

  // Top
  public function top()
  {
    $categories = Category::orderBy('title')->get();
    $platforms  = Platform::orderBy('title')->get();
    $games = DB::table('games')->join('platforms','games.platform_id','=','platforms.id')
                               ->join('categories','games.cat_id','=','categories.id')
                               ->select([
                                 'platforms.id as pid','platforms.title as ptitle',
                                 'categories.id as catid','categories.title as cattitle',
                                 'games.id as gid','games.title as gtitle','games.logo as glogo','games.discription as gdisc','games.author_name as author_name','games.game_year as game_year','games.torrent_file as gfile'
                               ])
                               ->orderBy('games.created_at','disc')
                               ->limit(25)
                               ->get();
    return view('top')->with([
      'categories' => $categories,
      'platforms'  => $platforms,
      'games'      => $games
    ]);
  }

  // Categories
  public function cat($catid)
  {
    $categories = Category::orderBy('title')->get();
    $platforms  = Platform::orderBy('title')->get();
    $category   = Category::find(intval($catid));
    $games = DB::table('games')->join('platforms','games.platform_id','=','platforms.id')
                               ->join('categories','games.cat_id','=','categories.id')
                               ->select([
                                 'platforms.id as pid','platforms.title as ptitle',
                                 'categories.id as catid','categories.title as cattitle',
                                 'games.id as gid','games.title as gtitle','games.logo as glogo','games.discription as gdisc','games.author_name as author_name','games.game_year as game_year','games.torrent_file as gfile'
                               ])
                               ->orderBy('games.created_at','disc')
                               ->where('games.cat_id',intval($catid))
                               ->get();
    return view('categories')->with([
      'categories' => $categories,
      'platforms'  => $platforms,
      'category'   => $category,
      'games'      => $games
    ]);
  }

  // Platforms
  public function plat($pid)
  {
    $categories = Category::orderBy('title')->get();
    $platforms  = Platform::orderBy('title')->get();
    $platform   = Platform::find(intval($pid));
    $games = DB::table('games')->join('platforms','games.platform_id','=','platforms.id')
                               ->join('categories','games.cat_id','=','categories.id')
                               ->select([
                                 'platforms.id as pid','platforms.title as ptitle',
                                 'categories.id as catid','categories.title as cattitle',
                                 'games.id as gid','games.title as gtitle','games.logo as glogo','games.discription as gdisc','games.author_name as author_name','games.game_year as game_year','games.torrent_file as gfile'
                               ])
                               ->orderBy('games.created_at','disc')
                               ->where('games.platform_id',intval($pid))
                               ->get();
    return view('platforms')->with([
      'categories' => $categories,
      'platforms'  => $platforms,
      'platform'   => $platform,
      'games'      => $games
    ]);
  }

  // Search
  public function search()
  {
    if(isset($_GET['s'])){
      $categories = Category::orderBy('title')->get();
      $platforms  = Platform::orderBy('title')->get();
      $games = DB::table('games')->join('platforms','games.platform_id','=','platforms.id')
                                 ->join('categories','games.cat_id','=','categories.id')
                                 ->select([
                                   'platforms.id as pid','platforms.title as ptitle',
                                   'categories.id as catid','categories.title as cattitle',
                                   'games.id as gid','games.title as gtitle','games.logo as glogo','games.discription as gdisc','games.author_name as author_name','games.game_year as game_year','games.torrent_file as gfile'
                                 ])
                                 ->orderBy('games.created_at','disc')
                                 ->where('games.title','like','%'.$_GET['s'].'%')
                                 ->orwhere('games.discription','like','%'.$_GET['s'].'%')
                                 ->orwhere('games.game_year','like','%'.$_GET['s'].'%')
                                 ->orwhere('games.author_name','like','%'.$_GET['s'].'%')
                                 ->orwhere('categories.title','like','%'.$_GET['s'].'%')
                                 ->orwhere('platforms.title','like','%'.$_GET['s'].'%')
                                 ->get();
      return view('search')->with([
        'categories' => $categories,
        'platforms'  => $platforms,
        'games'      => $games
      ]);
    }else{
      return redirect(route('home'));
    }
  }

  // photos
  public function photo()
  {
    $categories = Category::orderBy('title')->get();
    $platforms  = Platform::orderBy('title')->get();
    $games      = Game::orderBy('created_at','disc')->get();
    return view('photos')->with([
      'categories' => $categories,
      'platforms'  => $platforms,
      'games'      => $games
    ]);
  }

  // About
  public function about()
  {
    $categories = Category::orderBy('title')->get();
    $platforms  = Platform::orderBy('title')->get();
    return view('about')->with([
      'categories' => $categories,
      'platforms'  => $platforms,
    ]);
  }

}
