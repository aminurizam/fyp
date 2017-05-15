@extends('admin.dashboard')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List Products</h3>
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
                        <td>
                                @if($product->statusItem == 'accepted')
                                    <span class="label label-success">{{ $product->statusItem }}</span>
                                @elseif($product->statusItem == 'pending')
                                    <span class="label label-warning">{{ $product->statusItem }}</span>
                                @else
                                    <span class="label label-danger">{{ $product->statusItem }}</span>
                                @endif
                        </td>
                        <td>{{ $product->created_at }}</td>
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