@foreach($carts as $cart)
@foreach($cart->item->images as $image)
    <img src="{{ $image->url }}" alt="Item Image" width="100px">
@endforeach
<p>商品名:{{$cart->item->item_name}}</p>
<p>値段:{{$cart->item->price}}</p>
@if($cart->is_variable)
    @if( $cart->amount != 1)
    <form action="{{ route('cart.minusUpdate', ['cartId' => $cart->id]) }}" method="post">
        @csrf
        <button type="submit">-</button>
    </form>
    @else
    <button type="submit">-</button>
    @endif
    <p>{{ $cart->amount }}</p>
    <form action="{{ route('cart.plusUpdate', ['cartId' => $cart->id]) }}" method="post">
        @csrf
        <button type="submit">+</button>
    </form>
    <form action="{{ route('cart.destroy', ['cartId' => $cart->id]) }}" method="post">
        @csrf
        <button>削除する</button>
    </form>
@else
<p>売り切れ</p>
@endif
@endforeach
