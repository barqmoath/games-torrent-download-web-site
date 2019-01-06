<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Platform;
use App\Category;
use App\Game;
use DB;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(!isset($_GET['s']))
      {
        $games = DB::table('games')->join('platforms','games.platform_id','=','platforms.id')
                                   ->join('categories','games.cat_id','=','categories.id')
                                   ->select([
                                     'platforms.id as pid','platforms.title as ptitle',
                                     'categories.id as catid','categories.title as cattitle',
                                     'games.id as gid','games.title as gtitle','games.logo as glogo','games.discription as gdisc','games.author_name as author_name','games.game_year as game_year','games.torrent_file as gfile','games.created_at as created_at'
                                   ])
                                   ->orderBy('games.created_at','disc')
                                   ->paginate (10);
      }
      else
      {
        $games = DB::table('games')->join('platforms','games.platform_id','=','platforms.id')
                                   ->join('categories','games.cat_id','=','categories.id')
                                   ->select([
                                     'platforms.id as pid','platforms.title as ptitle',
                                     'categories.id as catid','categories.title as cattitle',
                                     'games.id as gid','games.title as gtitle','games.logo as glogo','games.discription as gdisc','games.author_name as author_name','games.game_year as game_year','games.torrent_file as gfile','games.created_at as created_at'
                                   ])
                                   ->orderBy('games.created_at','disc')
                                   ->where('games.title','like','%'.$_GET['s'].'%')
                                   ->orwhere('games.discription','like','%'.$_GET['s'].'%')
                                   ->orwhere('games.game_year','like','%'.$_GET['s'].'%')
                                   ->orwhere('games.author_name','like','%'.$_GET['s'].'%')
                                   ->orwhere('games.created_at','like','%'.$_GET['s'].'%')
                                   ->orwhere('categories.title','like','%'.$_GET['s'].'%')
                                   ->orwhere('platforms.title','like','%'.$_GET['s'].'%')
                                   ->paginate (10);
      }

      return view('settings.games.games')->with([
        'games'      => $games
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'platform_id'  => 'required|integer',
        'cat_id'       => 'required|integer',
        'title'        => 'required|string|max:255',
        'discription'  => 'required|string',
        'author_name'  => 'required|string|max:255',
        'game_year'    => 'required|string|max:4',
        'logo'         => 'required|image|mimes:jpeg,jpg,png|max:4000',
        'torrent_file' => 'required|max:5000',
      ]);

      if($request->hasFile('torrent_file'))
      {
        if($request->file('torrent_file')->isValid())
        {
          // Store Files
          try
          {
            echo "<h1>Please Wait ...</h1>";
            $logo         = rand(111111111,999999999) . '.' . $request->file('logo')->getClientOriginalExtension();
            $torrent_file = rand(111111111,999999999) . '.' . $request->file('torrent_file')->getClientOriginalExtension();
            $image_path = 'storage/images/';
            $files_path = 'storage/files/';
            $request->file('logo')->move($image_path,$logo);
            $request->file('torrent_file')->move($files_path,$torrent_file);
          }
          catch(Illuminate\Filesystem\FileNotFoundException $e)
          {

          }
          // Store Data
          $game = new Game;
          $game->platform_id   = $request->input('platform_id');
          $game->cat_id        = $request->input('cat_id');
          $game->title         = $request->input('title');
          $game->discription   = $request->input('discription');
          $game->author_name   = $request->input('author_name');
          $game->game_year     = intval($request->input('game_year'));
          $game->logo          = $logo;
          $game->torrent_file  = $torrent_file;
          $game->save();
        }
      }
      return back()->with('msg','Game Add Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $game = DB::table('games')->join('platforms','games.platform_id','=','platforms.id')
                                 ->join('categories','games.cat_id','=','categories.id')
                                 ->select([
                                   'platforms.id as pid','platforms.title as ptitle',
                                   'categories.id as catid','categories.title as cattitle',
                                   'games.id as gid','games.title as gtitle','games.logo as glogo','games.discription as gdisc','games.author_name as author_name','games.game_year as game_year','games.torrent_file as gfile','games.created_at as created_at'
                                 ])
                                 ->where('games.id',intval($id))->first();
        return view('settings.games.game',compact('game',$game));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $platforms  = Platform::orderBy('id')->get();
      $categories = Category::orderBy('id')->get();
      $game       = Game::find($id);
      return view('settings.games.edit')->with([
        'platforms'  => $platforms,
        'categories' => $categories,
        'game'       => $game
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $logo = '';
      $file = '';
      $this->validate($request,[
        'platform_id'  => 'required|integer',
        'cat_id'       => 'required|integer',
        'title'        => 'required|string|max:255',
        'discription'  => 'required|string',
        'author_name'  => 'required|string|max:255',
        'game_year'    => 'required|string|max:4',
        'logo'         => 'image|mimes:jpeg,jpg,png|max:4000',
        'torrent_file' => 'max:5000',
        'oldLogo'      => 'required|string',
        'oldFile'      => 'required|string',
      ]);

      if($request->hasFile('logo') && $request->file('logo')->isValid())
      {
        if(file_exists('storage/images/' . $request->input('oldLogo')))
            unlink('storage/images/' . $request->input('oldLogo'));
        $logo = rand(111111111,999999999) . '.' . $request->file('logo')->getClientOriginalExtension();
        $request->file('logo')->move('storage/images/',$logo);
      }

      if($request->hasFile('torrent_file') && $request->file('torrent_file')->isValid())
      {
        if(file_exists('storage/images/' . $request->input('oldFile')))
            unlink('storage/images/' . $request->input('oldFile'));
        $file = rand(111111111,999999999) . '.' . $request->file('torrent_file')->getClientOriginalExtension();
        $request->file('torrent_file')->move('storage/images/',$file);
      }

      if($logo === '')
        $slogo = $request->input('oldLogo');
      else
        $slogo = $logo;

      if($file === '')
        $sfile = $request->input('oldFile');
      else
        $sfile = $file;

      $game = Game::find($id);
      $game->title        = $request->input('title');
      $game->cat_id       = $request->input('cat_id');
      $game->platform_id  = $request->input('platform_id');
      $game->discription  = $request->input('discription');
      $game->author_name  = $request->input('author_name');
      $game->game_year    = $request->input('game_year');
      $game->logo         = $slogo;
      $game->torrent_file = $sfile;
      $game->save();
      return back()->with('msg','Game Information Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$logo,$file)
    {
        if(file_exists('storage/images/'.$logo))
          unlink('storage/images/'.$logo);
        if(file_exists('storage/files/'.$file))
          unlink('storage/files/'.$file);
        Game::destroy($id);
        return back()->with('msg','Game Delete Successfully !');
    }


    public function upload_show()
    {
      $platforms  = Platform::all();
      $categories = Category::all();
      return view('settings.games.upload')->with([
        'platforms'  => $platforms,
        'categories' => $categories
      ]);
    }


}
