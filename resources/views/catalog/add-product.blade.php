@extends('layouts.app')
@section('content')

    <div class="panel panel-default">
        <div class="panel-body container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-heading">
                        <h2>Add product into catalogue</h2>
                        <hr>
                    </div>
                    <form class="form-horizontal" action="{{action('ProductController@store')}}"  method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-8">
                            <label class="control-label" for="addproduct"><h3>Enter details</h3></label><br><br>
                        </div>

                        <div class="col-md-8">
                            <label for="">Product Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name"><br>
                        </div>

                        <div class="col-md-8">
                            <label for="">Transaction Type</label>
                            <input type="text" name="transactionType" class="form-control" placeholder="Choose below"><br>
                        </div>

                        <div class="col-md-8">
                            <label for="">Price</label>
                            <input type="text" name="price" class="form-control" placeholder="Price"><br>
                        </div>

                        <div class="col-md-8">
                            <label for="">Category</label>
                            <input type="text" name="category" class="form-control" placeholder="Choose below"><br>
                        </div>

                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Electronic</a></li>
                                <li><a href="#">Sports & Recreation</a></li>
                                <li><a href="">Health & Beauty</a></li>
                                <li><a href="">Books</a></li>
                                <li><a href="">Others</a></li>
                            </ul>
                        </div>

                        <div class="col-md-8">
                            <label for="">Detail</label>
                            <input type="text" name="detail" class="form-control" placeholder="Additional informations"><br>
                        </div>

                        <div class="col-md-8">
                            <label>Upload image</label><br>
                            <input type="file" name="image" />
                        </div>
                        {{--<input type="hidden" name="status" class="form-control" value="{{  }}">--}}
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection