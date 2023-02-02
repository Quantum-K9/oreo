<?php

namespace App\Http\Controllers\Resources;

use App\Models\Resource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\File;

class ResourceController extends Controller
{
    /**
     * show : displays task
     * create : create a task
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    
    public function create(){

        if( request()->input('type') == 'true'){ // file upload

            // retrieve and store file
            $raw_file = request()->upload;
            $path = $raw_file->storeAs('resource_uploads', $raw_file->getClientOriginalName() );

            // create a File
            $new_file = new \App\Models\File();
            $new_file->file_name = $raw_file->getClientOriginalName();
            $new_file->url = $path;
            $new_file->owner_id = \Auth::id();
            $new_file->save();

            // create a Resource
            DB::table('resources')->insert([
                'title' => request()->input('name'),
                'resource_type'=> true,
                'file_id'=> $new_file->id,
                'owner_id' => \Auth::id()
            ]);

        }
        else{ // link upload

            DB::table('resources')->insert([
                'title' => request()->input('name'),
                'resource_type'=> false,
                'url' => request()->input('link'),
                'owner_id' => \Auth::id()
            ]);

        }
  
        return view( 'resources_all', [
            'data' => Resource::all(),
        ]);
    }

}