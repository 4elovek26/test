<?php

namespace App\Http\Controllers;

use App\Models\EmailOpen;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmailOpenController extends Controller
{
    public function update_email(Request $request)
    {
        Log::info('мы зашли');
            EmailOpen::query()->insert(['user_id'=>$request->image_id]);
        Log::info('вставка успешна');
    }

    public function createImage(Request $request)
    {

        if ($request->uid){
            $this->update_email($request);
        }else {
            //создание пикселя
            $image = imagecreatetruecolor(1, 1); // создаем холст 1 на 1 пиксель
            imagefill($image, 0, 0, 0xFFFFFF); // делаем его белым
            header('Content-type: image/png'); // задаем заголовок
           //  imagedestroy($image); // очищаем память от картинки
            dd(imagepng($image));
        }
    }
}
