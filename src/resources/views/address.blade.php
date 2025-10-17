@extends('common2')
@section('css')
<link rel="stylesheet" href="{{asset('css/address.css')}}">
@endsection

@section('content')
<div class="address_background">
    <div class="address_content">
        <form action="{{route('purchase.address.item_id.update',['item_id'=>$item['id']])}}" method="post" class="address__content_form">
            @csrf
            @method('PATCH')
            <div class="address__content_title">
                <span class="title">住所の変更</span>
            </div>
            <div class="address__content_inner">
                <div class="group">
                    <div class="address__content_inner-title">
                        <span class="label">郵便番号</span>
                    </div>
                    <div class="address__content_inner-input">
                        <input type="text" class="text" name="postcode" value="{{$item->user->postcode}}">
                        <input type="hidden" name="id" value="">
                        <div class="error">
                            @error('postcode')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="group">
                    <div class="address__content_inner-title">
                        <span class="label">住所</span>
                    </div>
                    <div class="address__content_inner-input">
                        <input type="text" class="text" name="address" value="{{$item->user->address}}">
                        <input type="hidden" name="id" value="">
                        <div class="error">
                            @error('address')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="group">
                    <div class="address__content_inner-title">
                        <span class="label">建物名</span>
                    </div>
                    <div class="address__content_inner-input">
                        <input type="text" class="text" name="building" value="{{$item->user->building}}">
                        <input type="hidden" name="id" value="">
                        <div class="error"></div>
                    </div>
                </div>
            </div>
            <div class="address__content_button">
                <button class="button">更新する</button>
            </div>
        </form>
    </div>
</div>
@endsection