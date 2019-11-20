<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManager;
use App\Http\Helpers\Team;

class AssetController extends Controller
{

    public function __construct()
    {
        // Set class vars
        $this->path = storage_path() . env('STORAGE_PATH', '/app/');
        $this->logo = env('LOGO_FILE_NAME', 'logo.png');
        $this->favicon = env('FAVICON_FILE_NAME', 'favicon.ico');
        $this->team_file_ext = env('TEAM_FILE_EXT', '.jpg');
        
        // File name array
        $this->team_names = Team::NAMES;

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
            return $this->image->make($this->path . $name . $this->team_file_ext)->fit(600, 600)->response();
        }

        return redirect('/');
    }
}
