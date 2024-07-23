<x-layout>
    <x-page-heading>Create Product</x-page-heading>

    <x-forms.form action="/products" method="POST">
        @csrf

        <x-forms.input type="text" name="item_name" placeholder="Item name" value="{{old('item_name')}}"/>
        <x-forms.input type="number" name="quantity" placeholder="Quantity"/>
        <x-forms.input type="text" name="price" placeholder="Price (e.g. 7.45)"/>

        @foreach ($errors->all() as $error)
            <p class="text-sm text-red-900 mt-1">{{ $error }}</p>
        @endforeach
        
        <div class="flex mt-6 gap-2">
            <x-link href="/products" class="border border-black w-20 text-center hover:text-blue-600">Back</x-link>
            <x-button>Submit</x-button>
        </div>
    </x-forms.form>
</x-layout>
