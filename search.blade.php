<x-app-layout>
    <div class=" custom-product">
        <div class="col-sm-4">
            <div class="trending-wrapper">
                @foreach ($product as $item)<br>
                <center><h1 class="text-xl font-bold text-gray-900">{{$item['name']}}</h1><br>
                <div class="container searched-item">
                        <img class="trending-image" src="{{$item['image']}}" height="400" width="400">
                        <br><div class="">
                            <h5>รายละเอียดสินค้า : {{$item['description']}}</h5>
                            <h5>ยี่ห้อ : {{ $item->brand->brand_name}}</h3>
                            <h5>ขนาด : {{ $item->product_size }} ml</h3> 
                            <h5 class="mt-2 text-red-600 font-semibold" >ราคา : {{$item['price']}} บาท </h5><br>

                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data" class="flex justify-end">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <input type="hidden" value="{{ $item->name }}" name="name">
                                <input type="hidden" value="{{ $item->description  }}" name="description ">
                                <input type="hidden" value="{{ $item->price }}" name="price">
                                <input type="hidden" value="{{ $item->image }}"  name="image">
                                <input type="hidden" value="1" name="quantity">
                                <div style="width:100%;text-align:center;"> <button class=" px-4 py-1.5 text-white text-sm bg-purple-700 rounded">Add To Cart</button> </div>
                            </form>
                            
                        </div>
                    </a></center>
                </div>
                @endforeach
            </div>
        </div>
     </div> 
</x-app-layout>