<?php namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
//use Barryvdh\DomPDF\PDF;
use App\Order;
use PDF;

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
        $order = Order::find($orderId);
        if (isset($_GET['test'])) {
            return view('pdf.housebill', ['order' => $order, 'name' => 'Nhu', 'test' => 1]);
        }
        $pdf   = PDF::loadView('pdf.housebill', ['order' => $order, 'name' => 'Nhu', 'test' => 0]);

        // Set encoding for pdf file
        $pdf->setOption('encoding', 'utf-8');
        $pdf->setOption('margin-bottom', 20);
        $pdf->setOption('margin-top', 20);
        $pdf->setOption('print-media-type', true);
        $pdf->setOption('footer-spacing', 2);
        $pdf->setOption('header-spacing', 2);

//        $path = storage_path('test_' . time() . '.pdf');
        // Define file path: should define in config file
//        $destinationPath = Config::get('paths.ftp_data_folder');
//        $fileName        = '' . $visitee->user_id . '_' . 'FB' . $visitee->createAt;
//        $fileName .= '_' . Carbon::now()->format('mdY_His') . ".pdf";
//        $path            = $destinationPath . '/' . $fileName;
        return $pdf->download('housebill.pdf');
        
        
//        $pdf = App::make('dompdf.wrapper');
//        $pdf->loadView('pdf.housebill', ['order' => $order, 'name' => 'Nhu', 'test' => 0]);
//        return $pdf->stream();
    }
}
