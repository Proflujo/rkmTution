<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
 
use PDF;
   
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Annai sarathai tuition center By RKMSH 2019 Alumni',
            'date' => date('d/m/Y'),
            'sender' => 'Ajaykumar',
            'receiver' => 'Manikandan',
            'amount'  => 500
        ];
        $html = view('email.email')->with($data)->render();
        // dd($html);
        $pdf = PDF::loadHTML($html);
        
        // $pdf->download();
        // $pdf = PDF::loadView('email.email ',$data)->setOptions(['defaultFont' => 'sans-serif']);
        return view('email.email')->with($data);
//         $pdf->setPaper('A4','landscape');
// $pdf->render();
        // return $pdf->download('recepit.pdf');
    }
}