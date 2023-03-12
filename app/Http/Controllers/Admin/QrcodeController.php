<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrcodeController extends Controller
{
      
    public function index()
    {
        return view('admin.qrcodes.index');
    }
 
    public function new_qrcode(Request $request)
    {
        $qrcode_new = $_GET['qrcode'];
        $qrcode = QrCode::size(100)->generate($qrcode_new);
        
        return $qrcode;
    }
 
}
