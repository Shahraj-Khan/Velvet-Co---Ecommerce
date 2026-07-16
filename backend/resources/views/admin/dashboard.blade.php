@extends('admin.layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
           <div class="col">
             <div class="card radius-10 border-start border-0 border-4 border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Total Orders</p>
                            <h4 class="my-1 text-info">{{ $totalOrders }}</h4>
                            <p class="mb-0 font-13">+2.5% from last week</p>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='bx bxs-cart'></i>
                        </div>
                    </div>
                </div>
             </div>
           </div>
           <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-danger">
               <div class="card-body">
                   <div class="d-flex align-items-center">
                       <div>
                           <p class="mb-0 text-secondary">Total Revenue</p>
                           <h4 class="my-1 text-danger">৳{{ number_format($totalRevenue, 2) }}</h4>
                           <p class="mb-0 font-13">+5.4% from last week</p>
                       </div>
                       <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='bx bxs-wallet'></i>
                       </div>
                   </div>
               </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-success">
               <div class="card-body">
                   <div class="d-flex align-items-center">
                       <div>
                           <p class="mb-0 text-secondary">Pending Orders</p>
                           <h4 class="my-1 text-success">{{ $totalCustomers }}</h4>
                           <p class="mb-0 font-13">-4.5% from last week</p>
                       </div>
                       <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
                       </div>
                   </div>
               </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-warning">
               <div class="card-body">
                   <div class="d-flex align-items-center">
                       <div>
                           <p class="mb-0 text-secondary">Total Customers</p>
                           <h4 class="my-1 text-warning">{{ $pendingOrders }}</h4>
                           <p class="mb-0 font-13">+8.4% from last week</p>
                       </div>
                       <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='bx bxs-group'></i>
                       </div>
                   </div>
               </div>
            </div>
          </div> 
        </div><!--end row-->

        <div class="row">
           <div class="col-12 col-lg-8 d-flex">
              <div class="card radius-10 w-100">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Sales Overview</h6>
                        </div>
                        <div class="dropdown ms-auto">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                  <div class="card-body">
                    <div class="d-flex align-items-center ms-auto font-13 gap-2 mb-3">
                        <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #14abef"></i>Sales</span>
                        <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #ffc107"></i>Visits</span>
                    </div>
                    <div class="chart-container-1">
                        <canvas id="chart1"></canvas>
                      </div>
                  </div>
                  <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top">
                    <div class="col">
                      <div class="p-3">
                        <h5 class="mb-0">24.15M</h5>
                        <small class="mb-0">Overall Visitor <span> <i class="bx bx-up-arrow-alt align-middle"></i> 2.43%</span></small>
                      </div>
                    </div>
                    <div class="col">
                      <div class="p-3">
                        <h5 class="mb-0">12:38</h5>
                        <small class="mb-0">Visitor Duration <span> <i class="bx bx-up-arrow-alt align-middle"></i> 12.65%</span></small>
                      </div>
                    </div>
                    <div class="col">
                      <div class="p-3">
                        <h5 class="mb-0">639.82</h5>
                        <small class="mb-0">Pages/Visit <span> <i class="bx bx-up-arrow-alt align-middle"></i> 5.62%</span></small>
                      </div>
                    </div>
                  </div>
              </div>
           </div>
           <div class="col-12 col-lg-4 d-flex">
               <div class="card radius-10 w-100">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Trending Products</h6>
                        </div>
                        <div class="dropdown ms-auto">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                   <div class="card-body">
                    <div class="chart-container-2">
                        <canvas id="chart2"></canvas>
                      </div>
                   </div>
                   
                   
<ul class="list-group list-group-flush">

@forelse($trendingProducts as $product)

<li class="list-group-item d-flex justify-content-between align-items-center">

    <div class="d-flex align-items-center">

        <img src="{{ asset($product->thumbnail) }}"
             class="product-img-2 me-2"
             alt="{{ $product->name }}">

        <div>
            <strong>{{ $product->name }}</strong>
            <br>
            <small class="text-muted">{{ $product->total_sold }} Sold</small>
        </div>

    </div>

    <span class="badge bg-success rounded-pill">
        {{ $product->total_sold }}
    </span>

</li>

@empty

<li class="list-group-item text-center">
    No products found.
</li>

@endforelse

</ul>
               
            
            </div>
           </div>
        </div><!--end row-->

         <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Recent Orders</h6>
                    </div>
                    <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
                 <div class="card-body">
                 <div class="table-responsive">
                   <table class="table align-middle mb-0">
<thead class="table-light">
<tr>
    <th>Order Code</th>
    <th>Customer</th>
    <th>Total</th>
    <th>Payment</th>
    <th>Status</th>
    <th>Date</th>
    <th>Action</th>
</tr>
</thead>
 
<tbody>
@forelse($recentOrders as $order)
<tr>

    <td>{{ $order->order_code }}</td>

    <td>{{ $order->customer_name }}</td>

    <td>৳{{ number_format($order->total,2) }}</td>

    <td>
        @if($order->payment_status=='completed')
            <span class="badge bg-success">Paid</span>

        @elseif($order->payment_status=='pending')
            <span class="badge bg-warning text-dark">Pending</span>

        @else
            <span class="badge bg-danger">Failed</span>
        @endif
    </td>

    <td>
        <span class="badge bg-primary">
            {{ ucfirst($order->status) }}
        </span>
    </td>

    <td>{{ $order->created_at->format('d M Y') }}</td>

    <td>
        <a href="{{ route('admin.orders.show',$order->id) }}"
           class="btn btn-sm btn-primary">
            View
        </a>
    </td>

</tr>
@empty
<tr>
    <td colspan="7" class="text-center">
        No recent orders found.
    </td>
</tr>


@endforelse
</tbody>
                  </table>
                  </div>
                 </div>
            </div>


            <div class="row">
                <div class="col-12 col-lg-7 col-xl-8 d-flex">
                  <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Recent Orders</h6>
                            </div>
                            <div class="dropdown ms-auto">
                                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a>
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                       </div>
                     <div class="card-body">
                        <div class="row">
                          <div class="col-lg-7 col-xl-8 border-end">
                             <div id="geographic-map-2"></div>
                          </div>
                          <div class="col-lg-5 col-xl-4">
                           
                            <div class="mb-4">
                            <p class="mb-2"><i class="flag-icon flag-icon-us me-1"></i> USA <span class="float-end">70%</span></p>
                            <div class="progress" style="height: 7px;">
                                 <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 70%"></div>
                             </div>
                            </div>
       
                            <div class="mb-4">
                             <p class="mb-2"><i class="flag-icon flag-icon-ca me-1"></i> Canada <span class="float-end">65%</span></p>
                             <div class="progress" style="height: 7px;">
                                 <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 65%"></div>
                             </div>
                            </div>
       
                            <div class="mb-4">
                             <p class="mb-2"><i class="flag-icon flag-icon-gb me-1"></i> England <span class="float-end">60%</span></p>
                             <div class="progress" style="height: 7px;">
                                 <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 60%"></div>
                               </div>
                            </div>
       
                            <div class="mb-4">
                             <p class="mb-2"><i class="flag-icon flag-icon-au me-1"></i> Australia <span class="float-end">55%</span></p>
                             <div class="progress" style="height: 7px;">
                                 <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: 55%"></div>
                               </div>
                            </div>
       
                            <div class="mb-4">
                             <p class="mb-2"><i class="flag-icon flag-icon-in me-1"></i> India <span class="float-end">50%</span></p>
                             <div class="progress" style="height: 7px;">
                                 <div class="progress-bar bg-info progress-bar-striped" role="progressbar" style="width: 50%"></div>
                               </div>
                            </div>

                            <div class="mb-0">
                               <p class="mb-2"><i class="flag-icon flag-icon-cn me-1"></i> China <span class="float-end">45%</span></p>
                               <div class="progress" style="height: 7px;">
                                   <div class="progress-bar bg-dark progress-bar-striped" role="progressbar" style="width: 45%"></div>
                                 </div>
                            </div>

                          </div>
                        </div>
                     </div>
                   </div>
                </div>
       
                <div class="col-12 col-lg-5 col-xl-4 d-flex">
                    <div class="card w-100 radius-10">
                     <div class="card-body">
                      <div class="card radius-10 border shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Likes</p>
                                    <h4 class="my-1">45.6M</h4>
                                    <p class="mb-0 font-13">+6.2% from last week</p>
                                </div>
                                <div class="widgets-icons-2 bg-gradient-cosmic text-white ms-auto"><i class='bx bxs-heart-circle'></i>
                                </div>
                            </div>
                        </div>
                     </div>
                     <div class="card radius-10 border shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Comments</p>
                                    <h4 class="my-1">25.6K</h4>
                                    <p class="mb-0 font-13">+3.7% from last week</p>
                                </div>
                                <div class="widgets-icons-2 bg-gradient-ibiza text-white ms-auto"><i class='bx bxs-comment-detail'></i>
                                </div>
                            </div>
                        </div>
                     </div>
                     <div class="card radius-10 mb-0 border shadow-none">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Shares</p>
                                    <h4 class="my-1">85.4M</h4>
                                    <p class="mb-0 font-13">+4.6% from last week</p>
                                </div>
                                <div class="widgets-icons-2 bg-gradient-kyoto text-dark ms-auto"><i class='bx bxs-share-alt'></i>
                                </div>
                            </div>
                        </div>
                      </div>
                     </div>

                    </div>
       
                </div>
             </div><!--end row-->

             <div class="row row-cols-1 row-cols-lg-3">
                 <div class="col d-flex">
                   <div class="card radius-10 w-100">
                       <div class="card-body">
                        <p class="font-weight-bold mb-1 text-secondary">Weekly Revenue</p>
                        <div class="d-flex align-items-center mb-4">
                            <div>
                                <h4 class="mb-0">$89,540</h4>
                            </div>
                            <div class="">
                                <p class="mb-0 align-self-center font-weight-bold text-success ms-2">4.4% <i class="bx bxs-up-arrow-alt mr-2"></i>
                                </p>
                            </div>
                        </div>
                        <div class="chart-container-0 mt-5">
                            <canvas id="chart3"></canvas>
                          </div>
                       </div>
                   </div>
                 </div>
                 <div class="col d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-header bg-transparent">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Orders Summary</h6>
                                </div>
                                <div class="dropdown ms-auto">
                                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:;">Action</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container-1 mt-3">
                                <canvas id="chart4"></canvas>
                              </div>
                        </div>
                        <ul class="list-group list-group-flush">
<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
    Completed
    <span class="badge bg-success rounded-pill">
        {{ $completedOrders }}
    </span>
</li>

<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
    Pending
    <span class="badge bg-danger rounded-pill">
        {{ $pendingOrders }}
    </span>
</li>

<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
    Processing
    <span class="badge bg-primary rounded-pill">
        {{ $processingOrders }}
    </span>
</li>
                        </ul>
                    </div>
                  </div>
                  <div class="col d-flex">
                    <div class="card radius-10 w-100">
                         <div class="card-header bg-transparent">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Top Selling Categories</h6>
                                </div>
                                <div class="dropdown ms-auto">
                                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:;">Action</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                        </li>
                                    </ul>
                                </div>
                             </div>
                         </div>
                        <div class="card-body">
                           <div class="chart-container-0">
                             <canvas id="chart5"></canvas>
                           </div>
                        </div>
                        <div class="row row-group border-top g-0">
                            <div class="col">
                                <div class="p-3 text-center">
                                    <h4 class="mb-0 text-danger">$45,216</h4>
                                    <p class="mb-0">Clothing</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="p-3 text-center">
                                    <h4 class="mb-0 text-success">$68,154</h4>
                                    <p class="mb-0">Electronic</p>
                                </div>
                             </div>
                        </div><!--end row-->
                    </div>
                  </div>
             </div><!--end row-->

<div class="card radius-10">
    <div class="card-header">
        <h6 class="mb-0">Low Stock Products</h6>
    </div>

    <div class="card-body">
        <div class="list-group list-group-flush">

            @forelse($lowStockProducts as $product)

                <div class="list-group-item d-flex align-items-center">

                    <img src="{{ asset($product->thumbnail) }}"
                         class="product-img-2 me-3"
                         alt="{{ $product->name }}">

                    <div class="flex-grow-1">

                        <h6 class="mb-0">{{ $product->name }}</h6>

                        <small class="text-muted">
                            Stock Left:
                            <strong>{{ $product->quantity }}</strong>
                        </small>

                    </div>

                    @if($product->quantity <= 5)

                        <span class="badge bg-danger">
                            Critical
                        </span>

                    @else

                        <span class="badge bg-warning text-dark">
                            Low
                        </span>

                    @endif

                </div>

            @empty

                <div class="text-center text-success py-3">
                    🎉 All products have sufficient stock.
                </div>

            @endforelse

        </div>
    </div>
</div>
<!-- ==========================
     Low Stock Products end
========================== -->

<!-- ==========================
     Top Categorise start
========================== -->

<div class="card radius-10">
    <div class="card-header">
        <h6 class="mb-0">Top Selling Categories</h6>
    </div>

    <div class="card-body">

        @forelse($topCategories as $category)

            <div class="d-flex justify-content-between align-items-center mb-3">

                <div>
                    <h6 class="mb-0">{{ $category->name }}</h6>
                </div>

                <span class="badge bg-primary">
                    {{ $category->total_sold }} Sold
                </span>

            </div>

        @empty

            <p class="text-muted mb-0">
                No sales found.
            </p>

        @endforelse

    </div>
</div>

<!-- ==========================
     Top Categorise end    
========================== -->


    </div>
</div>



<script>
    const salesData = @json($salesData);

    const salesLabels = [
        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
    ];

 window.statusData = @json($statusData);

 //chart-5
 window.orderData = @json($orderData);
//chart-3
window.paymentData = @json($paymentData);

</script>


@endsection