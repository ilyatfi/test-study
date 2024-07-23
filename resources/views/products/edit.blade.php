<x-layout>
    <x-page-heading>Edit Product</x-page-heading>

    <x-forms.form id="main" action="/products/{{ $product->id }}" method="POST">
        @csrf
        @method('PATCH')

        <x-forms.input type="text" name="item_name" placeholder="Item name" value="{{ $product->item_name }}"/>
        <x-forms.input type="number" name="quantity" placeholder="Quantity" value="{{ $product->quantity }}"/>
        <x-forms.input type="text" name="price" placeholder="Price" value="{{ $product->price }}"/>

        @foreach ($errors->all() as $error)
            <p class="text-sm text-red-900 mt-1">{{ $error }}</p>
        @endforeach
        
        <div class="flex mt-6 gap-2">
            <x-link href="/products/{{$product->id}}">Back</x-link>
            <x-button>Save</x-button>
        </div>
    </x-forms.form>
    <form class="text-center mt-2" action="/products/{{$product->id}}" method="POST">
        @csrf
        @method('DELETE')
        <x-button color="red">Delete Item</x-button>
    </form>
</x-layout>
