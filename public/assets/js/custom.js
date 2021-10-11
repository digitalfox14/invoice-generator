var values = [] ;
var subTotal;
var total;
var discountInput;
var taxInput;
var shippingInput;
var amountPaid

$(document).ready(function(){
    
    $('.dropify').dropify(); 

    $('#line-item').on('click',function(){
        var index = $('.items-table .item-row').length;

        $('.items-table').append(`<div class="item-row">
            <div class="main-row">
                <div class="delete"><button type="button"  class="btn btn-link deleteItem"><strong>X</strong></button></div>
                <div class="amount value">
                    <span>&#8377;</span><span class="currency-symbol total-items"></span>    
                </div>
                <div class="unit_cost">
                    <div class="input-group">
                        <span class="input-group-addon currency-sign">&#8377;</span>
                        <input class="item-calc form-control item-amount" type="number" step="any" autocomplete="off" name="items[${index}][unit_cost]" value="0" />
                    </div>
                </div>
                <div class="quantity">
                    <input type="number" step="any" class="item-calc form-control item-quantity" name="items[${index}][quantity]" autocomplete="off"  value="1" />
                </div>
                <div class="name">
                    <textarea class="item-calc form-control itemName" name="items[${index}][name]" rows="1"  placeholder="Description of item/service..." style="resize: none;"></textarea>
                </div>
            </div>
        </div>`);
        
});

    $('body').on('click','.deleteItem',function(){
        var item = $(this).parents('.main-row').remove();
            calculateInvoice();
    });
 
    $('#discount').click(function() {
        $('#discount-div').append(`<div class="input-group addon-input discountDiv btnshow" id="discountDiv">
            <input class="input-label form-control" type="text" name="discounts_title" value="Discounts" />
            <div class="input-group-addon">
            <input type="number" class="form-control discounts" name="discounts" id="discounts" />
            <button type="button" id="discountClose" class="btn btn-link"><strong>X</strong></button>    
            </div>
        </div>`);
 
        $('#discount').hide();
    });
 
    $('body').on('keyup','#discounts',function(){
        discounts = $(this).val();
            discountInput = parseInt(discounts);
            calculateInvoice();
    });
 
    $( 'body' ).on( 'click' , '#discountClose' , function() {
             discountInput = 0;
             calculateInvoice();
        $( '.discountDiv' ).hide();
        $( '#discount' ).show();
    });
 
    $('#tax').click(function(){
        $('#tax-div').append(`<div class="input-group addon-input taxDiv btnshow" id="taxDiv">
            <input class="input-label form-control" type="text" name="tax_title" value="Tax" />
            <div class="input-group-addon">
                <input type="number" class="form-control" id="taxInput" name="tax"/>
                <button type="button" id="taxClose" class="btn btn-link btn-close"><strong>X</strong></button>
            </div>
        </div>`);
        $('#tax').hide();
    });
 
    $( 'body' ).on( 'keyup' , '#taxInput' , function() {
        var taxInputBox = $(this).val();
            taxInput = parseInt(taxInputBox);
                calculateInvoice();
     });
 
    $( 'body' ).on( 'click' , '#taxClose' , function() {
           taxInput = 0;
           calculateInvoice();
        $('.taxDiv').hide();
        $('#tax').show();
     });
 
    $('#shipping').click(function(){
            $('#shipping-div').append(`<div class="input-group addon-input shippingDiv btnshow" id="shippingDiv">
                <input class="input-label form-control" type="text" name="shipping_title" value="Shipping" />
                <div class="input-group-addon">
                    <div class="input-group">
                        <span class="input-group-addon currency-sign">&#8377;</span>
                        <input type="number" class="form-control" id="shippingInput" name="shipping"  />
                        <button type="button" id="shippingClose" class="btn btn-link btn-close"><strong>X</strong></button>
                    </div>
                </div>
            </div>`);
            $('#shipping').hide();
        });
     
    $( 'body' ).on( 'keyup' , '#shippingInput' , function() {
 
        var shippingInputBox = $(this).val();
            shippingInput = parseInt(shippingInputBox);
            calculateInvoice();
    });
    
    $( 'body' ).on( 'click' , '#shippingClose' , function(){
        shippingInput = 0;
        calculateInvoice();
        $('.shippingDiv').hide();
        $('#shipping').show();
    });
    
    $( function() {
        $( '#invoiceDate' ).datepicker();
    });
    
    $( function() {
        $( '#invoiceDueDate' ).datepicker();
    });
    
    $( 'body' ).on( 'mouseenter' , '#discountDiv' , function() {
        $('#discountClose').show();
    });

    $( 'body' ).on( 'mouseleave' , '#discountDiv' , function() {
        $('#discountClose').hide();
    });
    
    $( 'body' ).on( 'mouseenter' , '#taxDiv' , function() {
        $('#taxClose').show();
    });

    $( 'body' ).on( 'mouseleave' , '#taxDiv' , function() {
        $('#taxClose').hide();
    });
    
    $( 'body' ).on( 'mouseenter' , '#shippingDiv' , function() {
        $('#shippingClose').show();
    });

    $( 'body' ).on( 'mouseleave' , '#shippingDiv' , function() {
        $('#shippingClose').hide();
    });

    $('body').on('keyup','.item-quantity',function(){
        var quantity = $(this).val();
        var amount = $(this).parents('.quantity').siblings('.unit_cost').children('.input-group').children('.item-amount').val();
        var total = quantity * amount;
        var itemAmountSpan = $(this).parents('.quantity').siblings('.value').children('.total-items');
        itemAmountSpan.html(total);
            
            calculateInvoice();
    
    });

    $('body').on('keyup','.item-amount',function(){
        var amount = $(this).val();
        var quantity = $(this).parents('.unit_cost').siblings('.quantity').children('.item-quantity').val();
        var total = quantity * amount;
        var itemAmountSpan = $(this).parents('.unit_cost').siblings('.value').children('.total-items');
        itemAmountSpan.html(total);
        
        calculateInvoice();
        
    });
    
    $('body').on( 'keyup' , '#amountPaid' , function(){
            amountPaidBox= $(this).val();
            amountPaid = parseInt(amountPaidBox);
            balanceDue = total - amountPaid;
            document.getElementById('balanceDue').innerHTML = balanceDue;
    });
    
    $('#downloadInvoice').click(function(){
        
        
        $data = $('#invoiceForm').serialize();
        $.ajax({
            type : 'POST',
            url : '/form',
            data : $data
        });
    });
    

    
});
function calculateInvoice() {
    // ItemsTotal
    // 1 total cost items quantity and price 
    
        values = [];
        $( ".total-items" ).each(function( index,value ) {
            aaa = ($(this).text());
            var iNum = parseInt(aaa);
            values.push(iNum);
        });
        const sum = values.reduce((partial_sum, a) => partial_sum + a,0); 
        subTotal = sum;
        total = subTotal;
        document.getElementById('subtotal').innerHTML = subTotal;
        document.getElementById('total').innerHTML = total;
        document.getElementById('balanceDue').innerHTML = total;
        
        // less discount on  totalAmount
        if (discountInput != null) {
            total = total - discountInput;
            document.getElementById('total').innerHTML = total;
            document.getElementById('balanceDue').innerHTML = total;
                    
            // Add Tax and Shipping
        }
        if (taxInput != null) {
            total = total + taxInput;
            document.getElementById('total').innerHTML = total;
            document.getElementById('balanceDue').innerHTML = total;
        }
        if (shippingInput) {
            total = total + shippingInput;
            document.getElementById('total').innerHTML = total;  
            document.getElementById('balanceDue').innerHTML = total;
        }
        if (amountPaid != null) {
            balanceDue = total - amountPaid;
            document.getElementById('balanceDue').innerHTML = balanceDue;
        }
        
    
}

