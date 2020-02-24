<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use App\Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Charts\HighChart;
use App\AfricanCountries;
use App\Campaign;
use App\Section;
use App\Africa;
use App\Editor;
use App\Writer;
use App\AdOps;
use App\Media;
use App\News;
use App\User;

class AdOpsController extends Controller
{

	/**
  * Create a middleware instance.
  *
  * @return void
  */
	public function __construct()
  {
    $this->middleware('auth:adops');
  }

  public function index(){
    return view('adops.index');
  }


  public function adops_active(){ 
    $url = 'adops';
    $ads = Campaign::where('status','active')->Paginate(10);
    
    $viewsn = News::latest()->where('status','publish')->get();
    $viewsm = Media::latest()->where('status','publish')->get();

    $sections = Section::get();

    $users = User::Paginate(11);
    $africa = Africa::get();
    $country = AfricanCountries::get();

    $chartpiedevice = new HighChart;

    $chartpiedevice->labels(['Mobile','Desktop','Tablet']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('adops.campaigns.active', compact('url','ads','viewsn','viewsm','users','sections','africa','country','chartpiedevice'));
  }

  public function adops_inactive(){
    $url = 'adops';
    $ads = Campaign::where('status','inactive')->Paginate(10);
    
    $viewsn = News::latest()->where('status','publish')->get();
    $viewsm = Media::latest()->where('status','publish')->get();

    $sections = Section::get();

    $users = User::Paginate(11);
    $africa = Africa::get();
    $country = AfricanCountries::get();

    $chartpiedevice = new HighChart;

    $chartpiedevice->labels(['Mobile','Desktop','Tablet']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('adops.campaigns.inactive', compact('url','ads','viewsn','viewsm','users','sections','africa','country','chartpiedevice'));
  }

  public function adops_archive(){
    $url = 'adops';
    $ads = Campaign::where('status','archive')->Paginate(10);
    
    $viewsn = News::latest()->where('status','publish')->get();
    $viewsm = Media::latest()->where('status','publish')->get();

    $sections = Section::get();

    $users = User::Paginate(11);
    $africa = Africa::get();
    $country = AfricanCountries::get();

    $chartpiedevice = new HighChart;

    $chartpiedevice->labels(['Mobile','Desktop','Tablet']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('adops.campaigns.archive', compact('url','ads','viewsn','viewsm','users','sections','africa','country','chartpiedevice'));
  }

  public function editor_profile(Editor $id){
    $url = 'adops';
    return view('adops.editors.profile', compact('id','url'));
  }

  public function writer_profile(Writer $id){
    $url = 'adops';
    return view('adops.writers.profile', compact('id','url'));
  }

  public function adops_programmatic(){
    $url = 'admin';
    $ads = Campaign::where('status','archive')->Paginate(10);

    $viewsn = News::latest()->where('status','publish')->get();
    $viewsm = Media::latest()->where('status','publish')->get();

    $sections = Section::get();

    $users = User::Paginate(11);
    $africa = Africa::get();
    $country = AfricanCountries::get();

    $chartpiedevice = new HighChart;

    $chartpiedevice->labels(['Mobile','Desktop','Tablet']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('adops.campaigns.programmatic', compact('url','ads','viewsn','viewsm','sections','users','africa','country','chartpiedevice'));
  }

  public function adops_order(){
    $url = 'admin';
    $ads = Campaign::where('status','archive')->Paginate(10);

    $viewsn = News::latest()->where('status','publish')->get();
    $viewsm = Media::latest()->where('status','publish')->get();

    $sections = Section::get();

    $users = User::Paginate(11);
    $africa = Africa::get();
    $country = AfricanCountries::get();

    $chartpiedevice = new HighChart;

    $chartpiedevice->labels(['Mobile','Desktop','Tablet']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('adops.campaigns.order', compact('url','ads','viewsn','viewsm','sections','users','africa','country','chartpiedevice'));
  }

  public function adops_inventory(){
    $url = 'admin';
    $ads = Campaign::where('status','archive')->Paginate(10);

    $viewsn = News::latest()->where('status','publish')->get();
    $viewsm = Media::latest()->where('status','publish')->get();

    $sections = Section::get();

    $users = User::Paginate(11);
    $africa = Africa::get();
    $country = AfricanCountries::get();

    $chartpiedevice = new HighChart;

    $chartpiedevice->labels(['Mobile','Desktop','Tablet']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('adops.campaigns.inventory', compact('url','ads','viewsn','viewsm','sections','users','africa','country','chartpiedevice'));
  }

  public function adops_reporting(){
    $url = 'admin';
    $ads = Campaign::where('status','archive')->Paginate(10);

    $viewsn = News::latest()->where('status','publish')->get();
    $viewsm = Media::latest()->where('status','publish')->get();

    $sections = Section::get();

    $users = User::Paginate(11);
    $africa = Africa::get();
    $country = AfricanCountries::get();

    $chartpiedevice = new HighChart;

    $chartpiedevice->labels(['Mobile','Desktop','Tablet']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('adops.campaigns.reporting', compact('url','ads','viewsn','viewsm','sections','users','africa','country','chartpiedevice'));
  }

  public function adops_advertiser(){
    $url = 'admin';
    $ads = Campaign::where('status','archive')->Paginate(10);

    $viewsn = News::latest()->where('status','publish')->get();
    $viewsm = Media::latest()->where('status','publish')->get();

    $sections = Section::get();

    $users = User::Paginate(11);
    $africa = Africa::get();
    $country = AfricanCountries::get();

    $chartpiedevice = new HighChart;

    $chartpiedevice->labels(['Mobile','Desktop','Tablet']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('adops.campaigns.advertiser', compact('url','ads','viewsn','viewsm','sections','users','africa','country','chartpiedevice'));
  }

  public function adops_agency(){
    $url = 'admin';
    $ads = Campaign::where('status','archive')->Paginate(10);

    $viewsn = News::latest()->where('status','publish')->get();
    $viewsm = Media::latest()->where('status','publish')->get();

    $sections = Section::get();

    $users = User::Paginate(11);
    $africa = Africa::get();
    $country = AfricanCountries::get();

    $chartpiedevice = new HighChart;

    $chartpiedevice->labels(['Mobile','Desktop','Tablet']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('adops.campaigns.agency', compact('url','ads','viewsn','viewsm','sections','users','africa','country','chartpiedevice'));
  }

}
