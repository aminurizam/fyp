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

@foreach($freeCart as $free)
    <h2>Receipt Order #0000{{ $free->id }}</h2>
    <hr>
    <p>Transaction Type: Free</p>
    <p>Date & Time Transaction: {{ $free->created_at }}</p>
    <br>
    <h3>Giver Details</h3>
    <p>Name: {{ $free->seller->user->name }}</p>
    <p>Contact Number: {{ $free->seller->user->buyer->phoneNo }}</p>

    <table width="100%">
        <thead>
        <tr>
            <th style="width: 5%">#</th>
            {{--<th style="width: 35%">Product Image</th>--}}
            <th style="width: 30%">Product Name</th>
            <th>Product Details</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>{{ $free->product->name }}</td>
            <td>{{ $free->product->detail }}</td>
        </tr>
        </tbody>
    </table>
    <br>
@endforeach
</body>
</html>