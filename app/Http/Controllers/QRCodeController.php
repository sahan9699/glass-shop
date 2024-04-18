<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\QRCodeHelper;

class QRCodeController extends Controller
{
    public function generateQRCode($id)
    {
        $data = 'http://192.168.1.16:8000/users?query='. $id; // Replace with your actual data
        $size = 200; // Optional, default size is 200x200 pixels

        $qrCode = QRCodeHelper::generate($data, $size);

        return response($qrCode)->header('Content-type', 'image/png');
    }
}
