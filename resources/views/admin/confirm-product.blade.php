@extends('admin.dashboard')

@section('content')
    <div class="container">
        <div class="col-md-12">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (isset($errors))
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Transaction Type</th>
                    <th>Price</th>
                    <th>Wanted Item</th>
                    <th>Status Item</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->transactionType }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->changeItem }}</td>
                        <td style="text-align: center;"><span class="label label-warning">{{ $product->statusItem }}</span></td>
                        <td>{{ $product->created_at }}</td>
                        <td style="text-align: center;"><a href="{{ action('AdminController@confirmProductDetail', $product->id) }}" class="btn btn-primary btn-sm">View Details</a></td>
                    </tr>

                @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection