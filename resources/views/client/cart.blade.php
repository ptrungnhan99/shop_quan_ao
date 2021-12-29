@if(Cart::count() === 0)
        <h3>Giỏ hàng rỗng</h3>
@else
    <div class="header-cart-content flex-w js-pscroll">
        <ul class="header-cart-wrapitem w-full">
            @foreach (Cart::content() as $row )
            <li class="header-cart-item flex-w flex-t m-b-12">
                <div class="header-cart-item-img">
                    <img src="{{URL::asset('storage/app/hinh_san_pham/'.$row->options->hinh)}}" alt="IMG">
                </div>

                <div class="header-cart-item-txt p-t-8">
                    <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                        {{$row->name}}
                    </a>

                    <span class="header-cart-item-info">
                        {{$row->qty}} x {{number_format($row->price)}}đ
                    </span>
                </div>
            </li>
            @endforeach
        </ul>

        <div class="w-full">
            <div class="header-cart-total w-full p-tb-40">
                Total: {{Cart::total()}}đ
                <input hidden id="total-quanty-cart" type="number" value="{{Cart::count()}}">
            </div>

            <div class="header-cart-buttons flex-w w-full">

                <a href="{{url('khach-hang/info-cart')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                    View Cart
                </a>

            </div>
        </div>
    </div>
@endif
