@extends('backend.layouts.app')
@section('content')
	<div class="container mt-4">
    <div class="card invoice">
        <div class="card-header pl-3 pr-3 border-bottom-0 bg-light text-black-50">
            <div class="row justify-content-between align-items-center">
                <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                    <div class="h3 text-info">Invoice</div>
                    # {{$order ? $order->order_no : '' }}
                    <br />
                    {{ date('d-M-Y', strtotime($order->created_at)) }}
                </div>
                <div class="col-12 col-lg-auto text-center text-lg-right">
                	<div class="h3 text-info">Order Status</div>
                    <form>
	                <select name="order_status" class="form-control" data-id="{{ $order->id }}">
	                    <option value="0" {{ $order->order_status == 0 ? 'selected' : '' }}>Pending</option>
	                    <option value="1" {{ $order->order_status == 1 ? 'selected' : '' }}>Processing</option>
	                    <option value="2" {{ $order->order_status == 2 ? 'selected' : '' }}>Delivery</option>
	                    <option value="3" {{ $order->order_status == 3 ? 'selected' : '' }}>Complete</option>
	                </select>
	            </form>
                </div>
            </div>
        </div>
        <div class="card-body p-4 p-md-5">
            <div class="table-responsive">
                <table class="table table-borderless mb-0">
                    <thead class="border-bottom">
                        <tr class="small text-uppercase text-muted">
                            <th scope="col">Products</th>
                            <th class="text-right" scope="col">Quantity</th>
                            <th class="text-right" scope="col">Rate</th>
                            <th class="text-right" scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($order->orderItems as $ord)
                        <tr class="border-bottom">
                            <td>
                                <div class="font-weight-bold">{{ $ord->proName ? $ord->proName->name : '' }}</div>
                            </td>
                            <td class="text-right font-weight-bold">{{ $ord->count }}</td>
                            <td class="text-right font-weight-bold">${{ $ord->unit_price }}</td>
                            <td class="text-right font-weight-bold">${{ $ord->sub_price }}</td>
                        </tr>
                      @endforeach
                        <tr>
                            <td class="text-right pb-0" colspan="3"><div class="text-uppercase small font-weight-700 text-muted">Total Amount:</div></td>
                            <td class="text-right pb-0"><div class="h5 mb-0 font-weight-700 text-green">${{ $order->total_price }}</div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer p-4 p-lg-5 border-top-0">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="small text-muted text-uppercase font-weight-700 mb-2">To</div>
                    <div class="h6 mb-1">ESHOP Ltd.</div>
                    <div class="small">0987456231</div>
                    <div class="small">Nikunja, Dhaka</div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                </div>
                <div class="col-lg-6">
                    <div class="small text-muted text-uppercase font-weight-700 mb-2">Note</div>
                    <div class="small mb-0">Payment is due 15 days after receipt of this invoice. Please make checks or money orders out to Company Name, and include the invoice number in the memo. We appreciate your business, and hope to be working with you again very soon!</div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
       $('select[name="order_status"]').on('change', function() {
       		var id = $(this).attr('data-id');
            var status = $(this).val();
            if(status) {
                $.ajax({
                    url: '/postStatus/'+id+'/'+status,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                    	if (data) {
                    		alert('Status change successfully!');
                    	}
                    }
                });
            }
        });
    });
</script>
@endsection