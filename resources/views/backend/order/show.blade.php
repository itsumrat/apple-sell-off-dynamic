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
                    <br />
                    {{ $order->address->name }}
                    <br />
                    {{ $order->address->phone }}
                    <br />
                    {{ $order->address->email }}
                    <br />
                    {{ $order->address->address }}
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
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-borderless mb-0">
                        <thead class="border-bottom">
                        <tr class="small text-uppercase text-muted">
                            <th scope="col">Products</th>
                            <th scope="col">Additional</th>
                            <th class="text-right" scope="col">Quantity</th>
                            <th class="text-right" scope="col">Rate</th>
                            <th class="text-right" scope="col">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->orderItems as $ord)
                            <tr class="border-bottom">
                                <td> <div class="font-weight-bold">{{ $ord->product->name }}</div> </td>
                                <td>
                                    {!! isset($ord->product->ram) ?? $ord->product->ram->ram_size .' '. $ord->product->ram->ram_sign .'<br>' !!}
                                    {!! isset($ord->product->hard_drive) ?? $ord->product->hard_drive->hard_drive_size .' '. $ord->product->hard_drive->hard_drive_sign .'<br>' !!}
                                    {!! isset($ord->product->graphics_card) ?? $ord->product->graphics_card->graphics_card_size .' '. $ord->product->graphics_card->graphics_card_sign .'<br>' !!}
                                    {!! isset($ord->product->processor) ?? $ord->product->processor->processors_type .' '. $ord->product->processor->processors_sign .'<br>' !!}
                                </td>
                                <td class="text-right font-weight-bold">{{ $ord->quantity }}</td>
                                <td class="text-right font-weight-bold">${{ $ord->price }}</td>
                                <td class="text-right font-weight-bold">${{ $ord->quantity * $ord->price }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="text-right pb-0" colspan="3"><div class="text-uppercase small font-weight-700 text-muted">Total Amount:</div></td>
                            <td class="text-right pb-0"><div class="h5 mb-0 font-weight-700 text-green">${{ $order->total_price }}</div></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12">
                    <br>
                    <br>
                </div>
                <div class="col-lg-5">
                    <h4>Billing Address</h4>
                    <hr>
                    <table>
                        <tr>
                            <th>Name</th> <th>:</th> <td>{{ $order->address->bname }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th> <th>:</th> <td>{{ $order->address->bphone }}</td>
                        </tr>
                        <tr>
                            <th>Email</th> <th>:</th> <td>{{ $order->address->bemail }}</td>
                        </tr>
                        <tr>
                            <th>Country</th> <th>:</th> <td>{{ $order->address->billing_country->name }}</td>
                        </tr>
                        <tr>
                            <th>Division</th> <th>:</th> <td>{{ $order->address->billing_division->name }}</td>
                        </tr>
                        <tr>
                            <th>District</th> <th>:</th> <td>{{ $order->address->billing_division->name }}</td>
                        </tr>
                        <tr>
                            <th>Address</th> <th>:</th> <td>{{ $order->address->baddress }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-5">
                    <h4>Shipping Address</h4>
                    <hr>
                    <table>
                        <tr>
                            <th>Name</th> <th>:</th> <td>{{ $order->address->sname }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th> <th>:</th> <td>{{ $order->address->sphone }}</td>
                        </tr>
                        <tr>
                            <th>Email</th> <th>:</th> <td>{{ $order->address->semail }}</td>
                        </tr>
                        <tr>
                            <th>Country</th> <th>:</th> <td>{{ $order->address->shipping_country->name }}</td>
                        </tr>
                        <tr>
                            <th>Division</th> <th>:</th> <td>{{ $order->address->shipping_division->name }}</td>
                        </tr>
                        <tr>
                            <th>District</th> <th>:</th> <td>{{ $order->address->shipping_district->name }}</td>
                        </tr>
                        <tr>
                            <th>Address</th> <th>:</th> <td>{{ $order->address->saddress }}</td>
                        </tr>
                    </table>
                </div>
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
