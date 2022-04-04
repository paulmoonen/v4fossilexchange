@extends('layouts.app')

@section('content')

<div class="row accountpage">
    <div class="col-2"></div>

    <div class="col-8 userdata">
        <table>
            <th><h2>Customer account of {{ $user->name }}</h2></th>
            <tr>
                <td>User ID:</td>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <td>Street:</td>
                <td>{{ $user->street }}</td>
            </tr>
            <tr>
                <td>Housenumber:</td>
                <td>{{ $user->housenumber }}</td>
            </tr>
            <tr>
                <td>Postal Code:</td>
                <td>{{ $user->postal_code }}</td>
            </tr>
            <tr>
                <td>City:</td>
                <td>{{ $user->city }}</td>
            </tr>
            <tr>
                <td>Country:</td>
                <td>{{ $user->country }}</td>
            </tr>            
            <tr>
                <td>Mailaddress:</td>
                <td>{{ $user->email }}</td>
            </tr>
        </table>        

        <h2>Your order history:</h2>
        <ul>
            <?php foreach ($orders as $order) : ?>
                <li><a href="/order/show/{{$order->id}}">Order from: {{ $order->date }}</a></li>
            <?php endforeach ?>
        </ul>
    </div>
    <div class="col-2"></div>
</div>
@endsection