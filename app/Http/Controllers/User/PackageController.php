<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
  
  public $directory;

  public function __construct()
  {
      $this->directory = 'expert-user-panel';
  }
    public function payment($package)
    {
      return view($this->directory.'.package.payment')->with('package',$package);
    }
    public function index()
    {
      if(Auth::user()->a_date == Carbon::today())
      {
        toastr()->warning('Already Purchase Package');
        return redirect()->route('user.dashboard.index');
      } 
      return view($this->directory.'.package.index');
    }
    public function upgrade()
    {
      return view($this->directory.'.package.upgrade');
    }
}
