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
    
    .mr-20{
        margin-right: 20px;
    }
    
    .font-size-50{
        font-size: 50px;
    }
    .text-right{
        text-align: right;
    }
    .word-break{
        width: 100%;
        word-break: break-all;
    }
    .bg-color{
        background-color: black;
        color: white;
    }
    .bg-color-gray{
        background-color: gray;
    }
    .collapse{
        border-collapse: collapse;
    }
    
    table {
        width: 100%;
        margin-bottom: 20px;
        font-family: 'sans-serif';
    }
    
    table tr td {
        width: 25%;
        padding: 5px;
        word-wrap: break-word;
    }
    
    table tr td:first-child {
        width:  50%;
        
    }
    
    td.w-50 {
        width: 50%;
    }
    
    .logo{
        display:none;
    }
    
    
</style>
</head>
<body>

    <table>
        <tr>
            <td> <img src="{{$invoice->imgPath??''}}" height="130px" width="200px" alt=""> </td>    
            <td colspan="2" class="text-right" >
                <span class="font-size-50">INVOICE</span><br/>
                <span>{{$invoice->number}}</span>
            </td>
        </tr>
        
        <tr>
            <td>
                {{$invoice->from}}
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
    
    <table>
        <tr>
            <td>
                {{$invoice->to_title}}
                <br />
                {{$invoice->to}}
            </td>
            <td class="w-50">
                <table class="collapse" style="table-layout:fixed;" width="100%">
                    <tr class="text-right">
                        <td class="w-50">{{$invoice->date_title}}:</td>
                        <td class="w-50">{{$invoice->date}}</td>
                    </tr>  
                    <tr class="text-right">
                        <td>{{$invoice->payment_terms_title}}:</td>
                        <td>{{$invoice->payment_terms}}</td>
                    </tr>  
                    <tr class="text-right">
                        <td >{{$invoice->due_date_title}}:</td>
                        <td>{{$invoice->due_date}}</td>
                    </tr>  
                    <tr class="text-right">
                        <td >{{$invoice->po_number_title}}:</td>
                        <td>{{$invoice->po_number}}</td>
                    </tr>
                    <tr class="text-right bg-color-gray">
                        <td><b>{{$invoice->total_title}}:</b></td>
                        <td><b>${{$balanceDue = $total-$invoice->amount_paid}}</b></td>
                    </tr>  
                </table>
            </td>
        </tr>
    </table>
    
    
    
    
    
    <table class="collapse">
        <tr class="bg-color">
            <td>Item</td>
            <td class="text-right">Quantity</td>
            <td class="text-right">Rate</td>
            <td class="text-right">Amount</td>
        </tr>
        @foreach ($invoice->items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td class="  text-right">{{$item->quantity}}</td>
            <td class=" text-right">${{$item->unit_cost}}</td>
            <td class=" text-right">${{$item_cost = $item->quantity * $item->unit_cost}}</td>
        </tr>
        @endforeach
        
    </table>
    
    <table>
        <tr>
            <td> 
            </td>
            <td class="w-50">
                <table style="table-layout:fixed;" width="100%">
                    <tr class="text-right">
                        <td class="w-50" >{{$invoice->subtotal_title}}:</td> 
                        <td class="w-50">${{$subtotal}}</td> 
                    </tr>
                    <tr class="text-right">
                        <td >{{$invoice->discount_title ?? 'Discount'}}:</td>
                        <td>${{$invoice->discounts??'0.00'}}</td>  
                    </tr>
                    <tr class="text-right">
                        <td >{{$invoice->tax_title ?? 'Tax'}}:</td>
                        <td>${{$invoice->tax??'0.00'}}</td>  
                    </tr>
                    <tr class="text-right">
                        <td >{{$invoice->shipping_title ?? 'Shipping'}}:</td>
                        <td>${{$invoice->shipping??'0.00'}}</td>  
                    </tr>
                    <tr class="text-right">
                        <td >Total:</td> 
                        <td>${{$total}}</td> 
                    </tr>
                    <tr class="text-right">
                        <td >{{$invoice->amount_paid_title}}:</td>
                        <td>${{$invoice->amount_paid}}</td>  
                    </tr>
                    
                </table>
            </td>
        </tr>
    </table>
    
    
    <table width="720px">
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

