@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Заказ №: {{$order->id}} от {{$order->created_at}}</h1>
        @include('admin._partials.breadcrumbs', $breadcrumbs = [
            ['name' => 'Заказы', 'url' => route('admin.pages.all')],
            ['name' => 'Просмотр заказа', 'active' => true]
        ])
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div id="checkoutShipto">
                    <h2 id="checkoutConfirmDefaultShippingAddress">@lang('cart.order.dsTitle')</h2>
                    <address>
                        <p><strong>@lang('cart.order.name'):</strong> {{$order->name}}</p>
                        <p><strong>@lang('cart.order.email'):</strong> {{$order->email}}</p>
                        <p><strong>@lang('cart.order.phone'):</strong> {{$order->phone}}</p>
                        <p><strong>@lang('cart.order.address'):</strong> {{$order->delivery}}</p>
                    </address>
                    <h3 id="checkoutConfirmDefaultShipment">@lang('cart.order.sMethod'):</h3>
                    <h4 id="checkoutConfirmDefaultShipmentTitle">{{$order->delivery_option == 2 ? __('cart.order.nova') : __('cart.order.courier')}}</h4>
                </div>
                @if ($order->without_call)
                    <h3 id="checkoutConfirmDefaultHeadingComments">@lang('cart.order.special')</h3>
                    <div>@lang('cart.order.without-call')</div>
                    <hr>
                @endif
                <h3>Заказанные товары</h3>
                <table class="table table-striped" width="100%" cellspacing="0" cellpadding="0" id="" style="background: white">
                    <thead>
                    <tr>
                        <th width="30">@lang('g.quantity')</th>
                        <th>@lang('cart.itemName')</th>
                        <th>@lang('cart.total')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->products as $product)
                        @php($total[$product->currency] += $product->price * $product->quantity)
                        <tr>
                            <td>{{$product->quantity}}&nbsp;x</td>
                            <td><a href="/item/{{$product->getProduct->url}}" target="_blank">{{$product->getProduct->ru_title}}</a></td>
                            <td>{{$product->price * $product->quantity}} {{$product->currency}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr>
                <div id="orderTotals">
                    <div id="ottotal">
                        <div class="lineTitle larger forward">@lang('cart.total'): @foreach($total as $currency => $cTotal) @if ($cTotal == 0) @continue @endif
                            {{$cTotal}} {{$currency}}<br>
                            @endforeach</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h4>Статус заказа: @if($order->is_complete) <b>Выполнен</b> @else <b>Не выполнен</b> @endif</h4>
            </div>
            <!-- /.box-body -->
            <form action="{{route('admin.orders.update', $order->id)}}" method="post">
            <div class="box-footer">
                <a href="{{route('admin.orders.all')}}" class="btn btn-default">Назад к заказам</a>
                @if(!$order->is_complete)<button type="submit" class="btn btn-primary">Отметить как выполненым</button>@endif
            </div>
            {{csrf_field()}}
            </form>
        </div>
    </section>
@endsection