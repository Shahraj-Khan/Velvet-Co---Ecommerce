@extends('admin.layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Order Management</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Order List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5 class="mb-3">Order Information</h5>
                        <p><strong>Order ID:</strong> {{ $order->order_code }}</p>
                        <p><strong>Date:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                        <p><strong>Status:</strong>
                            <span class="badge bg-{{ $order->status_badge_color }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </p>
                        <p><strong>Payment:</strong>
                            <span class="badge bg-{{ $order->payment_status_badge_color }}">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </p>
                        <p><strong>Method:</strong> {{ ucfirst($order->payment_method) }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="mb-3">Customer Information</h5>
                        <p><strong>Name:</strong> {{ $order->customer_name }}</p>
                        <p><strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}</p>
                        <p><strong>Contact Number:</strong> {{ $order->billing_info['phone'] ?? 'N/A' }}</p>
                        <p><strong>Address:</strong> {{ $order->full_address }}</p>
                    </div>
                </div>

                <div class="table-responsive mb-4">
                    <h5 class="mb-3">Product</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->products as $product)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset($product->pivot->image) }}" width="50" class="me-3">
                                        <div>
                                            <p class="mb-0">{{ $product->name }}</p>
                                            @if($product->pivot->color)
                                                <small class="text-muted">Màu: {{ $product->pivot->color }}</small>
                                            @endif
                                            @if($product->pivot->size)
                                                <small class="text-muted">Size: {{ $product->pivot->size }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>{{ number_format($product->pivot->price, 0, ',', '.') }}BDT</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>{{ number_format($product->pivot->price * $product->pivot->quantity, 0, ',', '.') }}BDT</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total Amount:</strong></td>
                                <td>{{ $order->formatted_total }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <h5 class="mb-3">Update Status</h5>
                        <form action="{{ route('admin.orders.update-status', $order) }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <select name="status" class="form-select">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>In Progress</option>
                                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Canceled</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                
                    <!-- Thêm form cập nhật Payment Status -->
                    <div class="col-md-4">
                        <h5 class="mb-3">Update Payment</h5>
                        <form action="{{ route('admin.orders.update-payment-status', $order) }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <select name="payment_status" class="form-select">
                                    <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="completed" {{ $order->payment_status == 'completed' ? 'selected' : '' }}>Paid</option>
                                    <option value="failed" {{ $order->payment_status == 'failed' ? 'selected' : '' }}>Payment Failed</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                
                    <div class="col-md-4">
                        <h5 class="mb-3">Order Notes</h5>
                        <form action="{{ route('admin.orders.update-notes', $order) }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <textarea name="notes" class="form-control" rows="1">{{ $order->notes }}</textarea>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection