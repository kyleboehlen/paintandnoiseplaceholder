<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManager;
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
        
        // Create arrays from helper properties
        $this->team_names = array_column(Team::MEMBERS, 'name');
        $this->social_icons = array_column(Social::ACCOUNTS, 'icon');

        // Instantiate Image Intervention
        $this->image = new ImageManager(array('driver' => 'imagick'));
    }

    public function logo()
    {
        return $this->image->make($this->path . $this->logo)->response();
    }

    public function favicon()
    {
        return $this->image->make($this->path . $this->logo)->response();
    }

    public function team($name)
    {
        // Validate the name
        if(in_array($name, $this->team_names))
        {
            return $this->image->make($this->path . $name . $this->team_file_ext)->fit($this->icon_size, $this->icon_size)->response();
        }

        return redirect('/');
    }

    public function social($icon)
    {
        // Validate the icon
        if(in_array($icon, $this->social_icons))
        {
            return $this->image->make($this->path . $icon . $this->social_file_ext)->fit($this->icon_size, $this->icon_size)->response();
        }

        return redirect('/');
    }
}
