<x-app-layout>
    <div class="container px-12 py-8 mx-auto">
        <form action="/search" class="navbar-form navbar-left">
            <div class="form-group">
                <h4 class="text-l  text-gray-900"> ค้นหาสินค้า   
        <input type="text" name="query" class="form-control search-box" placeholder="พิมพ์ชื่อสินค้า">
            <button class="px-4 py-1.5 text-white text-sm bg-purple-700 rounded" type="submit" class="btn btn-default">ค้นหา</button> </div>
        </form><br><br>
       
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right mb-2">
                        <a class="px-4 py-1.5 text-white text-l bg-green-500 rounded" href="{{ route('products.create') }}"> Create Products</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

            

            @foreach ($products as $item)  
            <div class="w-full max-w-sm mx-auto overflow-hidden bg-white rounded-md shadow-md">
                <img src="{{ url($item->image) }}" alt="" class="w-full max-h-60">
                <div class="flex items-end justify-end w-full bg-cover">
                    
                </div>

                <div class="px-5 py-3">
                    
                    <div class="flex items-center justify-between mb-5"></div>
                        <h3 class="text-gray-700 uppercase">ชื่อสินค้า : {{ $item->name }}</h3>
                        <h3 class="text-gray-700 uppercase">รายละเอียดสินค้า :{{ $item->description }}</h3> 
                         <h3 class="text-gray-700 uppercase"> ยี่ห้อ : {{ $item->brand->brand_name}}</h3> 
                         <h3 class="text-gray-700 uppercase">ประเภท : {{ $item->category->category_name }}</h3> 
                       <h3 class="text-gray-700 uppercase">ปริมาณสินค้า : {{ $item->product_size }} ml </h3> <br>
                        <span class="mt-2 text-red-600 font-semibold">ราคา : {{ $item->price }} บาท </span> <br> <br>
                    
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data" class="flex justify-end">
                        @csrf
                        <input type="hidden" value="{{ $item->id }}" name="id">
                        <input type="hidden" value="{{ $item->name }}" name="name">
                        <input type="hidden" value="{{ $item->description  }}" name="description ">
                        <input type="hidden" value="{{ $item->price }}" name="price">
                        <input type="hidden" value="{{ $item->image }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        
                        <button class="px-4 py-1.5 text-white text-sm bg-purple-700 rounded">Add To Cart</button>
                       
                    </form>
                    <div class="container mt-2 flex justify-end ">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-right mb-2">
                                    <form action="{{ route('products.destroy',$item->id) }}" method="Post">
                                        <a class="px-4 py-1.5 text-white text-sm bg-blue-500 rounded" href="{{ route('products.edit',$item->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-1.5 text-white text-sm bg-red-500 rounded">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            @endforeach 
        </div>
    </div>
</x-app-layout>