<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function download(Attachment $attachment)
    {
        $filePath = $attachment->filepath;
        $fileName = $attachment->filename;

        return Storage::download($filePath, $fileName);
    }

}
