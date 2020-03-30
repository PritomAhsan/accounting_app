<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">

            <ul id="sidebarnav">

                <li class="nav-devider"></li>

                <li><a href="{{ route('home') }}"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="nav-devider"></li>

                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">User Info</span></a>

                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('add-role') }}"><i class="fa fa-tag"></i>Add Role</a></li>
                        <li><a href="{{ route('manage-role') }}"><i class="fa fa-cog"></i>Manage Role</a></li>
                        <li><a href="{{ route('add-user') }}"><i class="fa fa-user-plus"></i>Add User</a></li>
                        <li><a href="{{ route('manage-user') }}"><i class="fa fa-cog"></i>Manage User</a></li>
                    </ul>

                </li>
                <li class="nav-devider"></li>

                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Accounts </span></a>

                    <ul aria-expanded="false" class="collapse">

                        <li><a href="#" class="has-arrow"><i class="fa fa-bank"></i>Accounts Head</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('view-asset') }}">Assets</a></li>
                                <li><a href="{{ route('view-liabilities') }}">Liabilities</a></li>
                                <li><a href="{{ route('owners-equity') }}">Owners Equity</a></li>
                                <li><a href="{{ route('view-income') }}">Income/Revenue</a></li>
                                <li><a href="{{ route('view-expense') }}">Expense</a></li>
                            </ul>
                        </li>

                        <li><a href="{{ route('chart-of-account') }}"><i class="fa fa-list"></i>Chart of Account</a></li>

                        <li><a href="#" class="has-arrow"><i class="fa fa-exchange"></i>Transaction</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('add-transaction') }}">Transaction</a></li>
                                <li class="journal-transaction"><a href="{{ route('journal-transaction') }}">Journal Transaction</a></li>
                            </ul>
                        </li>

                        <li><a href="#" class="has-arrow"><i class="fa fa-file-text-o"></i>Voucher</a>
                            <ul class="collapse" aria-expanded="false">
                                <li><a href="{{ route('voucher') }}">All Vouchers</a></li>
                                <li><a href="{{ route('payment-voucher') }}">Payment Voucher</a></li>
                                <li><a href="{{ route('credit-voucher') }}">Credit Voucher</a></li>
                                <li><a href="{{ route('journal-voucher') }}">Journal Voucher</a></li>
                            </ul>
                        </li>

                        <li><a href="#"><i class="fa fa-exclamation"></i>Contra</a></li>

                    </ul>

                </li>
                <li class="nav-devider"></li>

                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-usd"></i><span class="hide-menu">Sales </span></a>
                    <ul aria-expanded="false" class="collapse">

                        <li class="invoice"><a href="{{ route('invoice-info') }}"><i class="fa fa-file-text-o"></i>Invoice</a></li>
                        <li><a href="{{ route('customer-info') }}"><i class="fa fa-users"></i>Customers</a></li>
                        <li><a href="{{ route('sales.product-info') }}"><i class="fa fa-shopping-cart"></i>Products</a></li>

                    </ul>
                </li>
                <li class="nav-devider"></li>

                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-shopping-bag"></i><span class="hide-menu">Purchase </span></a>
                    <ul aria-expanded="false" class="collapse">

                        <li class="bill"><a href="{{ route('bill-info') }}"><i class="fa fa-money"></i>Bill</a></li>
                        <li><a href="{{ route('vendor-info') }}"><i class="fa fa-truck"></i>Vendor</a></li>
                        <li><a href="{{ route('purchase.product-info') }}"><i class="fa fa-shopping-cart"></i>Products</a></li>

                    </ul>
                </li>
                <li class="nav-devider"></li>

                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-area-chart"></i><span class="hide-menu">Reports </span></a>
                    <ul aria-expanded="false" class="collapse">

                        <li><a href="{{ route('balance-sheet') }}"><i class="fa fa-balance-scale"></i>Balance Sheet</a></li>
                        <li><a href="{{ route('account-transaction') }}"><i class="fa fa-exchange"></i>Account Transactions</a></li>

                    </ul>
                </li>
                <li class="nav-devider"></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>