<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Platform;
use App\Game;
use App\Image;
use DB;

class SettingsController extends Controller
{
  public function index()
  {
    $gamesCount  = DB::table('games')->count('id');
    return view('settings.index',compact('gamesCount',$gamesCount));
  }

  public function platforms()
  {
    $platforms = Platform::orderBy('id')->get();
    return view('settings.platforms.platform')->with([
      'platforms' => $platforms
    ]);
  }

  public function categories()
  {
    $categories = Category::orderBy('id')->get();
    return view('settings.categories.categories')->with([
      'categories' => $categories
    ]);
  }

  public function users()
  {
    $users = User::orderBy('id')->get();
    return view('settings.users.users')->with([
      'users' => $users
    ]);
  }
}
