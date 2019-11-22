<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManager;
use Illuminate\Http\Response;
use Carbon\Carbon;
use App\Http\Helpers\Team;
use App\Http\Helpers\Social;

class AssetController extends Controller
{

    public function __construct()
    {
        // Set class vars
        $this->path = storage_path() . env('STORAGE_PATH', '/app/');
        $this->logo = env('LOGO_FILE_NAME', 'logo.png');
        $this->favicon = env('FAVICON_FILE_NAME', 'favicon.ico');
        $this->team_file_ext = env('TEAM_FILE_EXT', '.jpg');
        $this->social_file_ext = env('SOCIAL_FILE_EXT', '.png');
        $this->icon_size = env('ICON_SIZE', 600);
        $this->icon_timeout = env('CACHE_TIMEOUT', 3600);
        
        // Create arrays from helper properties
        $this->team_names = array_column(Team::MEMBERS, 'name');
        $this->social_icons = array_column(Social::ACCOUNTS, 'icon');

        // Instantiate Image Intervention
        $this->image = new ImageManager(array('driver' => 'imagick'));
    }

    public function logo()
    {
        $file = $this->path . $this->logo;
        $time = Carbon::createFromTimestamp(filemtime($file))->format('D, d M Y H:i:s GMT');
        return response($this->image->make($file)->encode(), 200)->header('Content-Type', 'image')->header('Cache-Control', 'public, max-age=' . $this->icon_timeout)->header('Last-Modified', $time);
    }

    public function favicon()
    {
        return $this->image->make($this->path . $this->favicon)->response();
    }

    public function team($name)
    {
        // Validate the name
        if(in_array($name, $this->team_names))
        {
            $file = $this->path . $name . $this->team_file_ext;
            $size = $this->icon_size;
            $time = Carbon::createFromTimestamp(filemtime($file))->format('D, d M Y H:i:s GMT');
            return response($this->image->make($file)->fit($size, $size)->encode(), 200)->header('Content-Type', 'image')->header('Cache-Control', 'public, max-age=' . $this->icon_timeout)->header('Last-Modified', $time);
        }

        return redirect('/');
    }

    public function social($icon)
    {
        // Validate the icon
        if(in_array($icon, $this->social_icons))
        {
            $file = $this->path . $icon . $this->social_file_ext;
            $size = $this->icon_size;
            $time = Carbon::createFromTimestamp(filemtime($file))->format('D, d M Y H:i:s GMT');
            return response($this->image->make($file)->fit($size, $size)->encode(), 200)->header('Content-Type', 'image')->header('Cache-Control', 'public, max-age=' . $this->icon_timeout)->header('Last-Modified', $time);
        }

        return redirect('/');
    }
}
