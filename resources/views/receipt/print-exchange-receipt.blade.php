<!doctype html>
<html lang="en">
<style>
    hr {
        display: block;
        margin-top: 0.5em;
        margin-bottom: 0.5em;
        margin-left: auto;
        margin-right: auto;
        border-style: ridge;
        border-width: 1px;
        /*border: thin;*/
    }

    table {
        border-collapse: collapse;
    }

    table, td, th {
        border: 1px solid black;
        text-align: center;
    }
</style>
<body>

    @foreach($exchanges as $exchange)
        <h2>Receipt Order #0000{{ $exchange->id }}</h2>
        <hr>
        <p>Transaction Type: Exchange</p>
        <p>Date & Time Transaction: {{ $exchange->created_at }}</p>
        <br>
        <h3>Exchange Requester Details</h3>
        <p>Name: {{ $exchange->seller->user->name }}</p>
        <p>Contact Number: {{ $exchange->seller->user->buyer->phoneNo }}</p>

        <table width="100%">
            <thead>
            <tr>
                <th style="width: 5%">#</th>
                {{--<th style="width: 35%">Product Image</th>--}}
                <th style="width: 30%">Product Name</th>
                <th style="width: 20%">Wanted Item</th>
                <th>Product Details</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                {{--<th><img src="{{ $exchange->product->image }}" alt=""></th>--}}
                {{--<th>{{ asset('/images/exchange/product_1494362679') }}</th>--}}
                <td>{{ $exchange->product->name }}</td>
                <td>{{ $exchange->product->changeItem }}</td>
                <td>{{ $exchange->product->detail }}</td>
            </tr>
            </tbody>
        </table>
        <br>
        <h3>Exchange Acceptor Details</h3>
        <p>Name: {{ $exchange->user->name }}</p>
        <p>Contact Number: {{ $exchange->user->buyer->phoneNo }}</p>
        <table width="100%">
            <thead>
            <tr>
                <th style="width: 5%">#</th>
                {{--<th style="width: 35%">Product Image</th>--}}
                <th style="width: 25%">Product Name</th>
                <th>Product Details</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                {{--<th><img src="{{ $exchange->image }}" alt="" style="max-height: 260px"></th>--}}
                <td>{{ $exchange->name }}</td>
                <td>{{ $exchange->details }}</td>
            </tr>
            </tbody>
        </table>
        @endforeach
</body>
</html>