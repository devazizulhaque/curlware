<?php


namespace App\helper;

use Illuminate\Http\UploadedFile;

class Helper
{
    public static function uploadFile ($fileObject, $directory, $existFileUrl = null)
    {
        if ($fileObject instanceof UploadedFile)
        {
            if ($existFileUrl)
            {
                if (file_exists($existFileUrl))
                {
                    unlink($existFileUrl);
                }
            }
            $fileName = time().rand(10, 1000).$fileObject->getClientOriginalName();
            $fileDirectory = 'admin/assets/images/upload-images/'.$directory.'/';
            $fileObject->move($fileDirectory, $fileName);
            $fileUrl = $fileDirectory.$fileName;
        } else {
            if ($existFileUrl)
            {
                $fileUrl = $existFileUrl;
            } else {
                $fileUrl = null;
            }
        }
        return $fileUrl;
    }

    public static function serialnumber()
    {
        $serialnumber = 'SER-' . rand(10000, 99999);
        return $serialnumber;
    }

    public static function ordernumber()
    {
        $serialnumber = 'ODS-' . rand(10000, 99999);
        return $serialnumber;
    }
}