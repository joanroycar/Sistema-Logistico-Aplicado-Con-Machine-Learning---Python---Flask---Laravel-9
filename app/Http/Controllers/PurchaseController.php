<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Suplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
         $this->middleware('can:purchases.index')->only('index');
         $this->middleware('can:purchases.show')->only('show');
         $this->middleware('can:purchases.create')->only('create','store');
         $this->middleware('can:purchases.pdf')->only('pdf');
         $this->middleware('can:purchases.reportpurchase')->only('reportpurchase');
    }

    public function index()
    {
        $purchases = Purchase::all();
        
        return view('purchases.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = Suplier::get();
        $products = Product::get();
        $category= Category::pluck('name','id');

        return view('purchases.create',compact('providers','products','category'));
    }

    public function getStates(Request $request)
    {
        $states = Product::where('category_id', $request->category_id )
            ->get();
        
        if (count($states) > 0) {
            return response()->json($states);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'suplier_id' => 'required',
            'product_id' => 'required'     
        ]);
        $purchase = Purchase::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'date_purchase'=>Carbon::now('America/Lima'),
        ]);

        foreach ($request->product_id as $key => $product) {
            $results[] = array("product_id"=>$request->product_id[$key], "quantity"=>$request->quantity[$key], "price"=>$request->price[$key]);
        }
        $purchase->purchaseDetails()->createMany($results);

        return redirect()->route('purchases.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        $subtotal = 0 ;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
        return view('purchases.show', compact('purchase', 'purchaseDetails', 'subtotal'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }

    public function reportpurchase(){


        $getyearmonth = Carbon::now('America/Lima')->format('Y-m');


        $orders= DB::select('call spcomprasmes(?)',array($getyearmonth));
        
        $data=[];
        foreach($orders as $order){
                 
               $data['label'][] = $order->estado;

               $data['data'][] = $order->cantidad;

        }

        $data['data'] = json_encode($data);

        $totalpurchases=0;
        $totalpurchases=$this->getpurchasestotal($totalpurchases);

        $total=0;
        $total= $this->gettotalprices($total);

        $purchases=0;
        $purchases=$this->getpurchases($purchases);

        $reporte="";
        $report=$this->reporte($reporte);

        return view('purchases.report.index',compact('totalpurchases','total','purchases'),$data+$report);
    }


    public function getpurchasestotal(){
        $totalpurchases = Purchase::where(('purchases.status'),'=','VALID')->get()->count();

        return $totalpurchases;

    }

    public function gettotalprices(){
        $total = Purchase::sum('total');

        return $total;
    }

    public function getpurchases(){

        $mes = Carbon::now('America/Lima')->format('m');
        $year = Carbon::now('America/Lima')->format('Y');
        $purchases = Purchase::where('status','VALID')->whereMonth(('purchases.date_purchase'),'=',$mes)->whereYear(('purchases.date_purchase'),'=',$year)->get()->count();

        return $purchases;
    }


    public function reporte(){

        $year = Carbon::now('America/Lima')->format('Y');

        $salesByMonths = DB::select(
            DB::raw("SELECT coalesce(total,0)as total
                FROM (SELECT 'january' AS month UNION SELECT 'february' AS month UNION SELECT 'march' AS month UNION SELECT 'april' AS month UNION SELECT 'may' AS month UNION SELECT 'june' AS month UNION SELECT 'july' AS month UNION SELECT 'august' AS month UNION SELECT 'september' AS month UNION SELECT 'october' AS month UNION SELECT 'november' AS month UNION SELECT 'december' AS month ) 
                m LEFT JOIN (SELECT MONTHNAME(date_purchase) AS MONTH, COUNT(*) AS purchases, SUM(total)AS total 
                FROM purchases WHERE year(date_purchase	)=$year
                GROUP BY MONTHNAME(date_purchase),MONTH(date_purchase) 
                ORDER BY MONTH(date_purchase)) c ON m.MONTH =c.MONTH;")
        );
        
        
        $report=[];
        foreach($salesByMonths as $salesByMonth){
                 
            //    $report['label'][] = $salesByMonth->mes;

                $report['report'][] = $salesByMonth->total;

          }

         $report['report'] = json_encode($report);

         $reporte=$report;

         return $reporte;

    }
    public function pdf(Purchase $purchase)
    {
        $subtotal = 0 ;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
        $pdf = Pdf::loadView('purchases.pdf.index', compact('purchase', 'subtotal', 'purchaseDetails'));
        return $pdf->download('Reporte_de_compra_'.$purchase->id.'.pdf'); 
    }
}
