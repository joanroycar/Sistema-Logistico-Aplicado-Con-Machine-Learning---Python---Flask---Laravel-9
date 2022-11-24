<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
         $this->middleware('can:orders.index')->only('index');
         $this->middleware('can:orders.show')->only('show');
         $this->middleware('can:orders.create')->only('create','store');
         $this->middleware('can:orders.culminated')->only('culminated');
         $this->middleware('can:orders.ordercompleted')->only('ordercompleted');
         $this->middleware('can:orders.orderincompleted')->only('orderincompleted');
         $this->middleware('can:orders.ontime')->only('ontime');
         $this->middleware('can:orders.untimely')->only('untimely');
         $this->middleware('can:orders.pdf')->only('pdf');
         $this->middleware('can:orders.reportorder')->only('reportorder');
    }
    
    public function index()
    {
        $orders = Order::where('status','=','PENDIENTE')->latest('id')->get();
        
        return view('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::get();
        $employees = Employee::get();
        $category= Category::pluck('name','id');
        return view('orders.create',compact('products','employees','category'));
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
        $now = Carbon::now('America/Lima');    

        $request->validate([
            'employee_id' => 'required',
            'product_id' => 'required',
            'date_order_delivery'=>'required|after_or_equal:'. $now     
        ]);

        $order = Order::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'date_order'=>Carbon::now('America/Lima'),
        ]);
        foreach ($request->product_id as $key => $product) {
            $results[] = array("product_id"=>$request->product_id[$key], "quantity"=>$request->quantity[$key]);
        }
        $order->orderDetails()->createMany($results);
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $subtotal = 0 ;
        $orderDetails = $order->orderDetails;
        foreach ($orderDetails as $orderDetail) {
            $subtotal += $orderDetail->quantity*$orderDetail->price;
        }

        return view('orders.show', compact('order', 'orderDetails', 'subtotal'));
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function culminated(){



        $orders =Order::where('status','=','ENTREGADO')->latest('id')->get();

        return view('orders.culminated.index',compact('orders'));
    }

    public function ordercompleted(Order $order){

        if($order->date_order_delivery > Carbon::now()->format('Y-m-d h:i:s')){
            $order->update(['status'=>'ENTREGADO','status_delivery'=>'DESTIEMPO']);
        }
        else {
            $order->update(['status'=>'ENTREGADO','status_delivery'=>'TIEMPO']);
        }

        return redirect()->route('orders.index')->with('editar', 'ok');

    }

    public function orderincompleted(Order $order){

        if($order->date_order_delivery < Carbon::now()->format('Y-m-d h:i:s')){
            $order->update(['status'=>'ENTREGADO','status_delivery'=>'DESTIEMPO']);
        }
        // $order->update(['status'=>'INCOMPLETO','status'=>'ENTREGADO']);
        else{
            $order->update(['status'=>'ENTREGADO','status_delivery'=>'TIEMPO']);
        }

        return redirect()->route('orders.index')->with('editar', 'ok');
    }

    public function ontime(){

        $orders =Order::where('status_delivery','=','TIEMPO')->latest('id')->get();

        return view('orders.ontime.index',compact('orders'));

    }

    public function untimely(){
        $orders =Order::where('status_delivery','=','DESTIEMPO')->latest('id')->get();

        return view('orders.untimely.index',compact('orders'));
    }
    
    public function pdf(Order $order)
    {
        $subtotal = 0 ;
        $orderDetails = $order->orderDetails;
        foreach ($orderDetails as $orderDetail) {
            $subtotal += $orderDetail->quantity*$orderDetail->price;
        }
        $pdf = Pdf::loadView('orders.pdf.index', compact('order', 'subtotal', 'orderDetails'));
        return $pdf->download('Reporte_de_Pedido_'.$order->id.'.pdf');
        
    }

    public function reportorder(){

        $getyearmonth = Carbon::now('America/Lima')->format('Y-m');


        $orders= DB::select('call sppedidosmes(?)',array($getyearmonth));
        

        $data=[];
        foreach($orders as $order){
                 
               $data['label'][] = $order->estado;

               $data['data'][] = $order->cantidad;

        }

        $data['data'] = json_encode($data);

        $orderscompleted=0;
        $orderscompleted= $this->getorderscompleted($orderscompleted);


        $ordersincompleted=0;
        $ordersincompleted= $this->getordersincompleted($ordersincompleted);

        $orderstotal=0;

        $orderstotal=$this->getorderstotal($orderstotal);

        $reporte="";
        $report=$this->reporte($reporte);

        return view('orders.report.index',compact('orderscompleted','ordersincompleted','orderstotal'),$data+$report);

    }
    public function getorderscompleted(){

        $mes = Carbon::now('America/Lima')->format('m');
        $year = Carbon::now('America/Lima')->format('Y');
        $orderscompleted = Order::where('statusend','COMPLETO')->whereMonth(('orders.date_order'),'=',$mes)->whereYear(('orders.date_order'),'=',$year)->get()->count();

        return $orderscompleted;
    }

    public function getordersincompleted(){

        $mes = Carbon::now('America/Lima')->format('m');
        $year = Carbon::now('America/Lima')->format('Y');
        $ordersincompleted = Order::where('statusend','INCOMPLETO')->whereMonth(('orders.date_order'),'=',$mes)->whereYear(('orders.date_order'),'=',$year)->get()->count();

        return $ordersincompleted;
    }

    public function getorderstotal(){

        $mes = Carbon::now('America/Lima')->format('m');
        $year = Carbon::now('America/Lima')->format('Y');
        $orderstotal = Order::whereMonth(('orders.date_order'),'=',$mes)->whereYear(('orders.date_order'),'=',$year)->get()->count();

        return $orderstotal;
    }

    public function reporte(){
        $year = Carbon::now('America/Lima')->format('Y');

        $salesByMonths = DB::select(
            DB::raw(" SELECT coalesce(total,0) as total FROM (SELECT 'january' AS month UNION SELECT 'february' 
            AS month UNION SELECT 'march' AS month UNION SELECT 'april' AS month UNION SELECT 'may' AS month UNION SELECT 'june'
             AS month UNION SELECT 'july' AS month UNION SELECT 'august' AS month UNION SELECT 'september' AS month UNION SELECT 'october'
              AS month UNION SELECT 'november' AS month UNION SELECT 'december' AS month ) m LEFT JOIN (SELECT MONTHNAME(date_order) AS MONTH,
               COUNT(*) AS orders, COUNT(orders.id) AS total FROM orders WHERE year(date_order)= $year GROUP BY MONTHNAME(date_order),
               MONTH(date_order) ORDER BY MONTH(date_order)) c ON m.MONTH =c.MONTH;
            ")
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




}
