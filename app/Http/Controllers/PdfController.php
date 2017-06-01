<?php namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
//use Barryvdh\DomPDF\PDF;
use App\Order;
use PDF;
use App\Visitors\Pdf\Order2HouseBill;
use App\Visitors\Pdf\Order2ArrivalNotice;

class PdfController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function houseBillAction($orderId)
    {
        $order = Order::find($orderId);
        $engine = new Order2HouseBill();
        $pdf = $engine->accept($order);
        $fileName = $engine->getFileName($order);
        return $pdf->stream($fileName);
        
        
//        $pdf = App::make('dompdf.wrapper');
//        $pdf->loadView('pdf.housebill', ['order' => $order, 'name' => 'Nhu', 'test' => 0]);
//        return $pdf->stream();
    }
    
    /**
     * Export an order report by type
     * 
     * @param string $type
     * @param integer $orderId
     */
    public function exportAction($type, $orderId)
    {
        $order = Order::find($orderId);
        $engine = $this->getEngineByType($type);
        if (empty($engine) || empty($order)) {
            abort(404);
        }
        $pdf = $engine->accept($order);
        $fileName = $engine->getFileName($order);
        return $pdf->stream($fileName);
    }
    
    protected function getEngineByType($type)
    {
        switch ($type) {
            case 'housebill':
                return new Order2HouseBill();
            case 'arrivalnotice':
                return new Order2ArrivalNotice();
            default:
                break;
        }
        return null;
    }
}
