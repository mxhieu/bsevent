<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseAdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    	$this->BaseConfig = config('baseconfig');
    }

    /**
     * Upload image
     * @param  Request $Request [description]
     * @param  [type]  $file    [description]
     * @return [type]           [description]
     */
    protected function uploadFile($Request, $file, $saveAt){
        if($Request->file($file))
        {
            $image = $Request->file($file);
            $new_name = $this->generateRandomString(10).'.'.$image->getClientOriginalExtension();
            //Create a folder if it doesn't already exist
            if (!is_dir(public_path().'/upload/'. $saveAt)) {
                mkdir(public_path().'/upload/'. $saveAt, 0777, true);
            }
            $image->storeAs('/upload/'. $saveAt, $new_name, 'upload_file');
            return $new_name;
        }
        return null;
    }

    /**
     * Delete Image in folder
     * @param string $PathOldImage path to image
     */
    public function DeleteImageInFolder($Image, $Folder){
        if(!empty($Image))
        {
            $PathOldImage = public_path('upload/'.$Folder.'/'.$Image);
            if(file_exists($PathOldImage))
            {
                unlink($PathOldImage);
            }
        }
    }

    /**
     * check file upload, if file isn't exists, it will add new file
     * else if file is exists, it will changeless
     *
     * @param   array   $Request  requesr form user
     * @param   string  $file     file name
     * @param   string  $field    form field
     * @param   string  $folder   The directory containing the file
     *
     * @return  string            file name
     */
    public function CheckUpdateField($Request, $file, $field, $folder){
        $param[$field] = $file;
        if($Request->hasFile($field))
        {
            if(!empty($file))
            {
                $this->DeleteImageInFolder($file, $folder);
            }
            $param[$field] = $this->uploadFile($Request, $field, $folder);
        }
        return $param[$field];
    }

    /**
     * generate random number 
     *
     * @param   [interger]  $length  length of return string
     *
     * @return  [string]             random string
     */
    function generateRandomString($length = 10) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    /**
     * download attach file form upload/file
     *
     * @param   string  $FileName  file name
     *
     * @return  [type]             download file
     */
    public function downloadAttachFile( $FileName ){
        $FileDir = public_path(). "/upload/file/".$FileName."";
        if(!file_exists($FileDir))
        {
            abort(404);
        }
        else
            return response()->download($FileDir);
    }
}
