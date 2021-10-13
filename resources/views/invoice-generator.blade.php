@extends ('layouts.footer')
@extends ('layouts.app')
@extends ('layouts.navbar')
@section ('content')
<div class="papers" style="margin-top:20;">
        <div class="invoice">
            <div class="two-col clearfix">
                <div class="title">
                    <form id="invoiceForm" name="invoiceForm" enctype="multipart/form-data">
                    @csrf
                    <input type="text" class="form-control input-label" name="header" value="INVOICE" />
                    <div class="subtitle">
                        <div class="input-group">
                            <span class="input-group-addon">#</span>
                            <input class="form-control" type="text" name="number" />
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <div class="col-sm-7">
                            <input type="file" id="input-file-now" name="logo" class="dropify"  data-height="110" data-default-file="url_of_your_file">
                    </div>
                    <div class="contact from">
                        <div class="field">
                            <input type="text" class="input-label form-control" name="from_title" value="From" />
                        </div>
                        <div class="value">
                            <textarea class="form-control" placeholder="Who is this invoice from?" name="from" style="resize: none;"></textarea>
                        </div>
                    </div>
                    <div class="contact to">
                        
                        <div class="field">
                            <input type="text" class="input-label form-control" name="to_title" value="Bill To" >
                        </div>
                        <div class="value">
                            <textarea class="form-control" placeholder="Who is this invoice to?" name="to"  style="resize: none;" ></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <div class="input-group addon-input">
                        <input class="input-label form-control" type="text" name="date_title" value="Date" />
                        <div class="input-group-addon">
                            <input id="invoiceDate" class="form-control datepicker" type="text" name="date"  />
                        </div>
                    </div>
                    
                    <div class="input-group addon-input">
                        <input class="input-label form-control" type="text" name="payment_terms_title" value="Payment Terms" />
                        <div class="input-group-addon">
                            <input id="invoiceDate" class="form-control" type="text" name="payment_terms"  />
                        </div>
                    </div>
                    
                    <div class="input-group addon-input">
                        <input class="input-label form-control" type="text" name="due_date_title" value="Due Date" />
                        <div class="input-group-addon">
                            <input id="invoiceDueDate" class="form-control datepicker" type="text" name="due_date" />
                        </div>
                    </div>
                    <div class="input-group addon-input">
                        <input class="input-label form-control" type="text" name="po_number_title" value="PO Number" />
                        <div class="input-group-addon">
                            <input id="invoiceDate" class="form-control " type="text" name="po_number"  />
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="items-holder">
                <div class="items-table-header">
                    <div class="amount">
                        <div class="field bordered">
                            <input type="text" class="input-label form-control" value="Amount" name="amount_header" />
                        </div>
                    </div>
                    <div class="unit_cost">
                        <div class="field bordered">
                            <input type="text" class="input-label form-control" value="Rate" name="unit_cost_header" />
                        </div>
                    </div>
                    <div class="quantity">
                        <div class="field bordered">
                            <input type="text" class="input-label form-control" value="Quantity" name="quantity_header" />
                        </div>
                    </div>
                    <div class="name">
                        <div class="field bordered">
                            <input type="text" class="input-label form-control" value="Description" name="item_header"  />
                        </div>
                    </div>
                </div>
                <div class="items-table">
                    <div class="item-row">
                        <div class="main-row">
                            <div class="delete"><button type="button"  class="btn btn-link deleteItem"><strong>X</strong></button></div>
                            <div class="amount value">
                                <span>&#8377;</span><span class="currency-symbol total-items"></span>    
                            </div>
                            <div class="unit_cost">
                                <div class="input-group">
                                    <span class="input-group-addon currency-sign">&#8377;</span>
                                    <input class="item-calc form-control item-amount" type="number" step="any" autocomplete="off" name="items[0][unit_cost]" value="0" />
                                </div>
                            </div>
                            <div class="quantity">
                                <input type="number" step="any" class="item-calc form-control item-quantity" autocomplete="off" name="items[0][quantity]" value="1" />
                            </div>
                            <div class="name">
                                <textarea class="item-calc form-control itemName" rows="1" name="items[0][name]" placeholder="Description of item/service..." style="resize: none;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div id="item-list"></div>
                </div>
                <button type="button" class="btn btn-primary" id="line-item" name="button">
                    +Line Item
                </button>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <div class="footer">
                        <div class="notes-holder">
                            <div class="field">
                                <input type="text" class="input-label form-control" name="notes_title" value="Notes" />
                            </div>
                            <div class="value">
                                <textarea class="notes form-control" placeholder="Notes - any relevant information not already covered" name="notes" style="resize: none;"></textarea>
                            </div>
                        </div>
                        <div class="terms-holder">
                            <div class="field">
                                <input type="text" class="input-label form-control" name="terms_title" value="Terms" />
                            </div>
                            <div class="value">
                                <textarea class="terms form-control" placeholder="Terms and conditions - late fees, payment methods, delivery schedule" name="terms" style="resize: none;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="input-group addon-input">
                        <input class="input-label form-control " type="text" name="subtotal_title" value="Subtotal" />
                        <div class="input-group-addon value"><span>&#8377;</span><span class="currency-symbol" id="subtotal"></span></div>
                    </div>
                    <div id="discount-div"></div>
                    <div id="tax-div"></div>
                    <div id="shipping-div"></div>
                    <div class="input-group addon-input aaas">
                        <button type="button" class="btn btn-link" id="discount" name="button"><strong>+</strong>Discount</button>
                        <button type="button" class="btn btn-link" id="tax" name="button"><strong>+</strong>Tax</button>
                        <button type="button" class="btn btn-link" id="shipping" name="button"><strong>+</strong>Shipping</button>
                    </div>
                    <div>
                        <div class="input-group addon-input">
                            <input class="input-label form-control" type="text" name="total_title" value="Total" />
                            <div class="input-group-addon value"><span class="currency-symbol">&#8377;</span><span id="total">0</span></div>
                        </div>
                        <div class="input-group addon-input">
                            <input class="input-label form-control" type="text" name="amount_paid_title" value="Amount Paid" />
                            <div class="input-group-addon">
                                <div class="input-group">
                                    <span class="input-group-addon currency-sign">&#8377;</span>
                                    <input type="text" class="form-control" name="amount_paid" id="amountPaid" value="0" />
                                </div>
                            </div>
                        </div>
                        <div class="input-group addon-input">
                            <input class="input-label form-control" type="text" name="total_title" value="Balance Due" />
                            <div class="input-group-addon value"><span class="currency-symbol">&#8377;</span><span id="balanceDue">0</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection