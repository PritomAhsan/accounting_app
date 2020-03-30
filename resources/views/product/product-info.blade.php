@extends('master')

@section('title', 'Manage Products')

@section('body')
    <div class="row page-titles">
        <div class="col-md-3 align-self-center">
            <h3 class="text-primary">Accounts</h3>
        </div>
        <div class="col-md-5 text-center">
            <a href="{{ route('sales.product-info') }}" class="btn btn-link disabled">Manage Products</a>
            <a href="javascript:void(0)" class="btn btn-link" onclick="openModal('#addProductModal')">Create A Product</a>
        </div>
        <div class="col-md-4 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Sales</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Start Page Content -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card p-0">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-dark">All Products</h5>
                    </div>
                    <div class="card-body p-20">
                        <div class="table-responsive">
                            <table class="table exportable table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th class="no-sort no-export text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($products as $product)
                                <tr>
                                    <th>{{ $i++ }}</th>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->product_price }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="javascript:void(0);" title="Edit" id="{{ $product->id }}" class="btn btn-info btn-rounded btn-xs p-l-10 p-r-8 p-t-3 p-b-1 m-l-2 m-r-2 edit-product"><i class="fa fa-12 fa-edit"></i></a>
                                            <a href="javascript:void(0);" title="Delete" id="{{ $product->id }}" class="btn btn-danger btn-rounded btn-xs p-l-10 p-r-8 p-t-3 p-b-1 m-l-2 m-r-2 delete-product"><i class="fa fa-12 fa-trash-o"></i></a>
                                            @csrf
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End PAge Content -->

    <!-- Create Product Modal -->
    <div class="modal" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-80" role="document">
            <div class="modal-content">
                <div class="modal-header p-0 m-b-10">
                    <button type="button" class="close m-r-0 p-t-5 p-b-25" onclick="closeModal('#addProductModal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-20">
                    <div class="basic-form">
                        <form action="{{ route('new-product') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Product Name</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="product_name" class="form-control" placeholder="Product Name"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Product Description</span></label>
                                <div class="col-md-9">
                                    <textarea name="product_description" class="form-control" placeholder="Product Description" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Product Price</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="product_price" class="form-control" placeholder="Product Price"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"></label>
                                <div class="col-md-9">
                                    <div class="form-check">
                                        <input id="sellProduct" type="checkbox" value="1" name="sell_status" class="form-check-input"/>
                                        <label for="sellProduct" class="form-check-label">Sell This Product</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row" id="incomeShowHide">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Income Account</span></label>
                                <div class="col-md-9">
                                        <select name="income_account_id" class="form-control">
                                            <option value="demo"> --- Select Income Account --- </option>
                                            @foreach($incomeAccounts as $incomeAccount)
                                            <option value="{{ $incomeAccount->id }}">{{ $incomeAccount->account_name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"></label>
                                <div class="col-md-9">
                                    <div class="form-check">
                                        <input id="buyProduct" type="checkbox" value="1" name="buy_status" class="form-check-input"/>
                                        <label for="buyProduct" class="form-check-label">Buy This Product</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row" id="expenseShowHide">
                                <label class="col-md-3 col-form-label"><span class="float-right text-right">Expense Account</span></label>
                                <div class="col-md-9">
                                    <select name="expense_account_id" class="form-control">
                                        <option value="demo"> --- Select Expense Account --- </option>
                                        @foreach($expenseAccounts as $expenseAccount)
                                            <option value="{{ $expenseAccount->id }}">{{ $expenseAccount->account_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row m-0 p-0">
                                <label for="" class="col-md-3 col-form label"></label>
                                <div class="col-md-9 p-l-10 p-r-0">
                                    <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Create Product Info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
        <div class="modal" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-80" role="document">
                <div class="modal-content">
                    <div class="modal-header p-0 m-b-10">
                        <button type="button" class="close m-r-0 p-t-5 p-b-25" onclick="closeModal('#editProductModal')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-20">
                        <div class="basic-form">
                            <form action="{{ route('update-product') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label"><span class="float-right text-right">Product Name</span></label>
                                    <div class="col-md-9">
                                        <input type="text" name="product_name" id="productName" class="form-control" placeholder="Product Name"/>
                                        <input type="hidden" name="product_id" id="productId"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label"><span class="float-right text-right">Product Description</span></label>
                                    <div class="col-md-9">
                                        <textarea name="product_description" id="productDescription" class="form-control" placeholder="Product Description" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label"><span class="float-right text-right">Product Price</span></label>
                                    <div class="col-md-9">
                                        <input type="text" name="product_price" id="productPrice" class="form-control" placeholder="Product Price"/>
                                    </div>
                                </div>
                                <div class="form-group row" id="editSellProductDiv">
                                    <label class="col-md-3 col-form-label"></label>
                                    <div class="col-md-9">
                                        <div class="form-check">
                                            <input id="editSellProduct" type="checkbox" value="1" name="sell_status" class="form-check-input"/>
                                            <label for="editSellProduct" class="form-check-label">Sell This Product</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" id="editIncomeShowHide">
                                    <label class="col-md-3 col-form-label"><span class="float-right text-right">Income Account</span></label>
                                    <div class="col-md-9">
                                        <select name="income_account_id" id="incomeAccountId" class="form-control">
                                            <option value="demo"> --- Select Income Account --- </option>
                                            @foreach($incomeAccounts as $incomeAccount)
                                                <option value="{{ $incomeAccount->id }}">{{ $incomeAccount->account_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" id="editBuyProductDiv">
                                    <label class="col-md-3 col-form-label"></label>
                                    <div class="col-md-9">
                                        <div class="form-check">
                                            <input id="editBuyProduct" type="checkbox" value="1" name="buy_status" class="form-check-input"/>
                                            <label for="editBuyProduct" class="form-check-label">Buy This Product</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" id="editExpenseShowHide">
                                    <label class="col-md-3 col-form-label"><span class="float-right text-right">Expense Account</span></label>
                                    <div class="col-md-9">
                                        <select name="expense_account_id" class="form-control" id="expenseAccountId">
                                            <option value="demo"> --- Select Expense Account --- </option>
                                            @foreach($expenseAccounts as $expenseAccount)
                                                <option value="{{ $expenseAccount->id }}">{{ $expenseAccount->account_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row m-0 p-0">
                                    <label for="" class="col-md-3 col-form label"></label>
                                    <div class="col-md-9 p-l-10 p-r-0">
                                        <input type="submit" name="btn" class="btn btn-flat btn-block btn-primary" value="Update Product Info">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
