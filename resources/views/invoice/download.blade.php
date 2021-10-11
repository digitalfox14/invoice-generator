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
    <style>
    .row {
        width: 100%;
    }
    
    .col-sm-3 {
        width: 25%;
        float: left;
    }
    .font-size-50{
        font-size: 50px;
    }
    .text-right{
        text-align: right;
    }
    .word-break{
        word-break: break-all;
    }
    .bg-color{
        background-color: black;
        color: white;
    }
    .mp{
        margin: inherit;
        padding: inherit;   
    }
    .font-family{
    font-family: inherit;
    }
    .collapse {
        border-collapse: collapse;
        border-radius: 1em;
    }
    
    </style>
</head>
    <body>
        
        
    <table  width = "100%">
        <tr>
            <td width="50%">
                {{$invoice->from}}
            </td>
            
            <td width="25%">
            </td>
            <td width="25%" class="text-right">
                <table width="100%">
                    <tr class="text-right font-family">
                        <td>
                            <span class="font-size-50 ">INVOICE</span>
                        </td>
                        <tr class="text-right">
                            <td>
                                <span>{{$invoice->number}}</span>
                            </td>
                        </tr>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table width = "100%">
        <tr>
            <td width="50%">
                <table  width = "100%">
                    <tr><td>{{$invoice->to_title}}</td></tr>
                    <tr><td>{{$invoice->to}}</td></tr>
                </table>
            </td>
            
            <td width="25%">
                <table width = "100%">
                    <tr class="text-right"><td >{{$invoice->date_title}}:</td></tr>  
                    <tr class="text-right"><td >{{$invoice->payment_terms_title}}:</td></tr>  
                    <tr class="text-right"><td >{{$invoice->due_date_title}}:</td></tr>  
                    <tr class="text-right"><td >{{$invoice->po_number_title}}:</td></tr>  
                    <tr class="text-right"><td ><b>{{$invoice->total_title}}:</b></td></tr>  
                    
                </table>
            </td>
            <td width="25%">
                <table width = "100%">
                    <tr class="text-right"><td>{{$invoice->date}}</td></tr>
                    <tr class="text-right word-break"><td >{{$invoice->payment_terms}}</td></tr>
                    <tr class="text-right"><td>{{$invoice->due_date}}</td></tr>
                    <tr class="text-right word-break"><td>{{$invoice->po_number}}</td></tr>
                    <tr class="text-right"><td><b>${{$balanceDue = $total-$invoice->amount_paid}}</b></td></tr>
                </table>
            </td>
        </tr>
    </table>

    <table width="100%" class="mp collapse">
        <tr class="bg-color">
            <td width="55%">Item</td>
            <td width="15%" class="text-right">Quantity</td>
            <td width="15%" class="text-right">Rate</td>
            <td width="15%" class="text-right">Amount</td>
        </tr>
        @foreach ($invoice->items as $item)
        <tr class="mp">
            <td width="55%">{{$item->name}}</td>
            <td width="15%" class="text-right">{{$item->quantity}}</td>
            <td width="15%" class="text-right">${{$item->unit_cost}}</td>
            <td width="15%" class="text-right">${{$item_cost = $item->quantity * $item->unit_cost}} </td>
        </tr>
        @endforeach
    </table>


    <table width = "100%">
        <tr>
            <td width="25%">
                
            </td>
            <td width="25%">
                
            </td>
            <td width="25%">
                <table width = "100%">
                    <tr class="text-right"><td >{{$invoice->subtotal_title}}:</td></tr>  
                    <tr class="text-right"><td >{{$invoice->discount_title ?? 'Discount'}}:</td></tr>  
                    <tr class="text-right"><td >{{$invoice->tax_title ?? 'Tax'}}:</td></tr>  
                    <tr class="text-right"><td >{{$invoice->shipping_title ?? 'Shipping'}}:</td></tr>  
                    <tr class="text-right"><td >Total:</td></tr>  
                    <tr class="text-right"><td >{{$invoice->amount_paid_title}}:</td></tr>  
                    
                </table>
            </td>
            <td width="25%">
                <table width = "100%">
                    <tr class="text-right"><td>${{$subtotal}}</td></tr>
                    <tr class="text-right word-break"><td >${{$invoice->discounts??'0.00'}}</td></tr>
                    <tr class="text-right"><td>${{$invoice->tax??'0.00'}}</td></tr>
                    <tr class="text-right word-break"><td>${{$invoice->shipping??'0.00'}}</td></tr>
                    <tr class="text-right"><td>${{$total}}</td></tr>
                    <tr class="text-right"><td>${{$invoice->amount_paid}}</td></tr>
                </table>
            </td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td>{{$invoice->notes_title}}:</td>
        </tr>
        <tr>
            <td>{{$invoice->notes}}</td>
        </tr>
    </table>

    <table>
        <tr>
            <td>{{$invoice->terms_title}}:</td>
        </tr>
        <tr>
            <td>{{$invoice->terms}}</td>
        </tr>
    </table>
    </body>
</html>
