<?php namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;

class PdfController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function houseBillAction($orderId)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.housebill', ['name' => 'Nhu']);
        return $pdf->stream();
    }
}
