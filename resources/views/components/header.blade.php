<header>
    <div class="left-wrapper">
        <h1><a href="/">PANZON</a></h1>
        <p><a href="{{route('cart.index')}}">cart</a></p>
        @if(Auth::check())
        <p><a href="">{{Auth::user()->name}}</a></p>
        @else
        <p><a href="/login">login</a></p>
        <p><a href="/register">register</a></p>
        @endif
    </div>
    <form action="{{route('item.list')}}" method="get">
        <input type="text" name="search" placeholder="商品を検索する..." value="{{ request('search') }}" class="input">
        <input type="hidden" name="category_id" value="{{ request('category_id') }}">
        <input type="hidden" name="order" value="{{ request('order') }}">
        <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path></svg></button>
    </form>
</header>

