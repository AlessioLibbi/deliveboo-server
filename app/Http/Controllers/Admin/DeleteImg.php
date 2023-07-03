<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DeleteImg extends Controller
{
    public function delete($id)
{
    $cancelPer = str_replace('%', '/', $id);
    $pathImage = 'public/'.$cancelPer;
    Storage::delete($pathImage);
    return back();
}
}