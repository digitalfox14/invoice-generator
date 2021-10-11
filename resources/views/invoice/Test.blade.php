<?php 
    
$subtotal = 0;
$item_cost = 0;
$total = 0;
$discount = $invoice->discounts ?? 0;
$tax = $invoice->tax ?? 0;
$shipping = $invoice->shipping ?? 0;
    
foreach ($invoice->items as $item)   {
    $item->quantity;
    $item->unit_cost;
    $item_cost = $item->quantity * $item->unit_cost;
    $subtotal = $subtotal + $item_cost;
}
$total = $subtotal;
if (($invoice->discounts ?? '') || ($invoice->tax ?? '') || ($invoice->shipping ?? '')) {
    $total = $subtotal - $discount + $tax + $shipping;
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-3" >
                    <b>{{$invoice->from}}</b>
                </div>
                <div class="col-3" >
                </div>
                <div class="col-3">
                </div>
                <div class="col-3 text-black-50 text-end">
                    <div>
                        <span style="font-size: xxx-large;">INVOICE</span>
                    </div>
                    <div>
                        <span>{{$invoice->number}}</span>
                    </div>
                </div>
            </div>
            
            <div class="row mt-5" >
                <div class="col-3">
                    <div class="opacity-75">
                        {{$invoice->to_title}}
                    </div>
                    <div>
                        <b>{{$invoice->to}}</b>
                    </div>
                </div>
                <div class="col-3">
                    
                </div>
                <div class="col-6 text-end  text-break">
                    <div class="row">
                        <div class="col-6 opacity-75">{{$invoice->date_title}}:</div>
                        <div class="col-6">{{$invoice->date}}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 opacity-75">{{$invoice->payment_terms_title}}:</div>
                        <div class="col-6">{{$invoice->payment_terms}}</div>
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-6 opacity-75">{{$invoice->due_date_title}}:</div>
                        <div class="col-6">{{$invoice->due_date}}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 opacity-75">{{$invoice->po_number_title}}:</div>
                        <div class="col-6">{{$invoice->po_number}}</div>
                    </div>
                    
                </div>
                
            </div>
            <div class="row offset-6 bg-secondary p-1 bg-opacity-75">
                
                <div class="col-6 text-end">
                    <b>{{$invoice->total_title}}:</b>
                </div>
                <div class="col-6 text-end">
                    <b>&#8377;{{$balanceDue = $total-$invoice->amount_paid}}</b>
                </div>
            </div>
            
            
            <!-- item count -->
            <div class="row bg-dark p-1 mt-5 text-white">
                <div class="col-6">
                    Item
                </div>
                <div class="col-2 text-center">
                    Quantity
                </div>
                <div class="col-2 text-center">
                    Rate
                </div>
                <div class="col-2 text-center">
                    Amount
                </div>    
            </div>
            
            @foreach ($invoice->items as $item)
            <div class="row p-1">
                <div class="col-6">
                    {{$item->name}}
                </div>
                <div class="col-2 text-center">
                    {{$item->quantity}}
                </div>
                <div class="col-2 text-center">
                    &#8377;{{$item->unit_cost}}
                </div>
                <div class="col-2 text-center">
                    &#8377;{{$item_cost = $item->quantity * $item->unit_cost}}    
                </div>
            </div>        
            @endforeach
            <!-- total -->
            <div class="row mt-5">
                <div class="col-3">
                </div>
                <div class="col-3">
                    
                </div>
                <div class="col-3 text-end opacity-75">
                    <div>
                        {{$invoice->subtotal_title}}:
                    </div>        
                    <div>
                        {{$invoice->discount_title ?? 'Discount'}}:
                    </div>
                    <div>
                        {{$invoice->tax_title ?? 'Tax'}}:
                    </div>
                    <div>
                        {{$invoice->shipping_title ?? 'Shipping'}}:
                    </div>
                    <div>
                        Total:
                    </div>
                    <div>
                        {{$invoice->amount_paid_title}}:
                    </div>
                </div>
                <div class="col-3 text-end">
                    <div>
                        &#8377;{{$subtotal}}
                    </div>
                    <div>
                        &#8377;{{$invoice->discounts??'0.00'}}
                    </div>
                    <div>
                        &#8377;{{$invoice->tax??'0.00'}}
                    </div>
                    <div>
                        &#8377;{{$invoice->shipping??'0.00'}}
                    </div>
                    <div>
                        &#8377;{{$total}}
                    </div>
                    <div>
                        &#8377;{{$invoice->amount_paid}}
                    </div>
                </div>
            </div>
            
            <div class="opacity-75 mt-5">
                {{$invoice->notes_title}}:
            </div>
            <div>
                {{$invoice->notes}}
            </div>
            
            
            <div class="opacity-75 mt-5">
                {{$invoice->terms_title}}:
            </div>
            <div>
                {{$invoice->terms}}
            </div>
            
        </div>
    </body>
</html>
