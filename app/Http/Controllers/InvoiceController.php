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
    public function index($id)
    {
        $invoice = Invoice::find($id);
        $invoice= json_decode($invoice->invoice);
        
        $pdf = PDF::loadView('invoice.download',['invoice' => $invoice]);
        return $pdf->stream('invoice.pdf');
        return view('invoice.download',['invoice' => $invoice]);
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
        
        echo "<pre>"; print_r($request->all()); die;
        $encodeInvoive = json_encode($request->all());
        $authId = Auth::id();
        $ipAddress = $request->ip();
        $invoice = new Invoice;
        $invoice->user_id = $authId;
        $invoice->ip_address = $ipAddress;
        $invoice->invoice = $encodeInvoive;
        $invoice->save();    
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
        
        echo "<pre>"; print_r($request->all()); die;
        $path = $request->file('file')->store('public/img');
        // $fileOriginalName = $request->file->getClientOriginalName();
        // echo "<pre>"; print_r($fileOriginalName); die;
        // $fileextension = pathinfo($fileOriginalName);
        // $fileExt = $fileextension['extension'];
        // $file = new FileManager;
        // $fileOriginalName = $request->file->getClientOriginalName();    
        // $path = $request->file('file')->store('files');
        // $path_url = url('storage/'.$path);
        // $file->user_id = Auth::id();
        // $file->file_name = $fileOriginalName;
        // $file->file_ext = $fileExt;
        // $file->file_path = $path_url;
        
        // return Storage::putFile(
        //       storage_path(asset('assets/imgages')),
        //       request()->file('file')
        //   );
        //   echo "<pre>"; print_r($path); die;
          // $path = Storage::putFile(asset('assets/imgages'), $request->file);
        // $fileOriginalName = $request->file->getClientOriginalName();
        // $fileextension = pathinfo($fileOriginalName);
        // $fileExt = $fileextension['extension'];
        // 
        // $file = new FileManager;
        // $fileOriginalName = $request->file->getClientOriginalName();    
        // $path = $request->file('file')->store('files');
        // $path_url = url('storage/'.$path);
        // $file->user_id = Auth::id();
        // $file->file_name = $fileOriginalName;
        // $file->file_ext = $fileExt;
        // $file->file_path = $path_url;
        
        
        //$fileName = time().'_'.$req->file->getClientOriginalName();
        //$path = Storage::putFile('img', $request->file();
        //$name = $request->file();
        //echo "<pre>"; print_r($fileName); die;
        // Storage::put('file.jpg', $contents);
        // $path = Storage::putFile('$contents', new File('/img'));
            //$path = $request->file('$contents')->store('assets/img');

        //return $path;
        
    }
}
