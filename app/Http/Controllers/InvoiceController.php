<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Auth;
use PDF;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $encodeInvoive = json_encode($request->all());
        $authId = Auth::id();
        $ipAddress = $request->ip();
        $invoice = new Invoice;
        $invoice->user_id = $authId;
        $invoice->ip_address = $ipAddress;
        $invoice->invoice = $encodeInvoive;
        $invoice->save();
        $invoice= json_decode($invoice->invoice);
        $pdf = PDF::loadView('invoice.download',['invoice' => $invoice]);
        return $pdf->download('invoice.pdf');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
    public function img(Request $request)
    {
        $path = Storage::putFile('img', $request->file('file'));
        $path_url = url('storage/'.$path);
          $imgPath = $path_url;
        return response($imgPath);
    }
}
