@extends('layouts.app')

@section('content')

    <div class="container">
        <hr>
        <h2>Add Product to Catalog</h2>
        <p>Choose type of transaction you want to make</p>
        <ul class="nav nav-pills">
            <li class="active"><a data-toggle="pill" href="#home"><strong>Instruction</strong></a></li>
            <li><a data-toggle="pill" href="#sell-buy">Sell-buy</a></li>
            <li><a data-toggle="pill" href="#free">Free</a></li>
            <li><a data-toggle="pill" href="#exchange">Exchange Item</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>Rules and Regulation</h3>
                <h4><strong>The following rules are obligated to be followed by seller;</strong></h4>
                <ul>
                    <li>Product must not violated rules and regulation in Malaysia</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda consequuntur, earum
                        eos esse et fugiat illo, molestiae natus optio tempore unde ut. Deserunt dolore expedita facilis
                        in tenetur vero!</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda at autem culpa error
                        explicabo facilis id itaque iure laborum magnam molestiae, molestias nam odio odit officia
                        quaerat quasi reiciendis repellat!</li>
                </ul>
            </div>

            <div id="sell-buy" class="tab-pane fade">
                <div class="col-md-6 col-md-offset-3">
                <h3><strong>Sell-buy Transaction</strong></h3><br>
                    <form class="form-horizontal" action="{{action('ProductController@store')}}"  method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{--<h4>Product ID</h4><input type="text" name="id" class="form-control" value="{{ $products->id+1 }}" readonly="readonly"><br>--}}
                        <div class="form-group">
                            <h4>Product name</h4><input type="text" name="name" class="form-control" placeholder="Example: Baju Kemeja"><br>
                            <h4>Price (RM)</h4><input type="text" name="price" class="form-control" placeholder="Eg: 20"><br>
                            <h4>Category</h4>
                            <div class="dropdown">
                                <select id="mySelect" class="form-control" name="category">
                                    <option value="">Select category</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Electronic">Electronic</option>
                                    <option value="Sports">Sports</option>
                                    <option value="Health">Health</option>
                                    <option value="Books">Books</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <br>
                            <h4>Details</h4><textarea name="detail" id="" cols="30" rows="5" class="form-control" placeholder="Eg: Good condition: 7/10"></textarea><br>
                            <h4>Upload Image </h4>
                            <input type="file" name="image"/>
                            <input type="hidden" name="transactionType" value="buy">
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            <hr>
                        </div>
                    </form>
                </div>
            </div>

            <div id="free" class="tab-pane fade">
                <div class="col-md-6 col-md-offset-3">
                <h3><strong>Free Transaction</strong></h3><br>
                    <form class="form-horizontal" action="{{action('ProductController@store')}}"  method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <h4>Product name</h4><input type="text" name="name" class="form-control" placeholder="Name"><br>
                        <h4>Price</h4><input type="text" name="price" readonly="readonly" class="form-control" placeholder="RM 0" value="0"><br>
                        <h4>Category</h4>
                        <div class="dropdown">
                            <select id="mySelect" class="form-control" name="category">
                                <option value="">Select category</option>
                                <option value="Fashion">Fashion</option>
                                <option value="Electronic">Electronic</option>
                                <option value="Sports">Sports</option>
                                <option value="Health">Health</option>
                                <option value="Books">Books</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <br>
                        <h4>Details</h4><textarea name="detail" id="" cols="30" rows="5" class="form-control"></textarea>
                        <h4>Upload Image</h4>
                        {{--<input type="hidden" name="qty" value="1">--}}
                        <input type="file" name="image" />
                        <input type="hidden" name="transactionType" value="free">
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <hr>
                    </form>
                </div>
            </div>

            <div id="exchange" class="tab-pane fade">
                <div class="col-md-6 col-md-offset-3">
                <h3><strong>Exchange Item Transaction</strong></h3><br>
                    <form class="form-horizontal" action="{{action('ProductController@store')}}"  method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{--<h4>Product ID</h4><input type="text" name="id" class="form-control" value="{{ $products->id+1 }}" readonly="readonly"><br>--}}
                        <h4>Product name</h4><input type="text" name="name" class="form-control" placeholder="Example: Baju Kemeja"><br>
                        <h4>Item to change</h4><input type="text" name="changeItem" class="form-control" placeholder="Example: Baju T-Shirt"><br>
                        <h4>Category</h4>
                        <div class="dropdown">
                            <select id="mySelect" class="form-control" name="category">
                                <option value="">Select category</option>
                                <option value="Fashion">Fashion</option>
                                <option value="Electronic">Electronic</option>
                                <option value="Sports">Sports</option>
                                <option value="Health">Health</option>
                                <option value="Books">Books</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <br>
                        <h4>Details</h4><textarea name="detail" id="" cols="30" rows="5" class="form-control" placeholder="Eg: Good condition: 7/10"></textarea>
                        <h4>Upload Image</h4>
                        <input type="file" name="image" />
                        <input type="hidden" name="transactionType" value="exchange">
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <hr>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

