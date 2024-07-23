<x-layout>
    <x-page-heading>Product</x-page-heading>

    <table class="text-center mx-auto border border-black">
        <tr class="bg-gray-500/20">
            <x-table-element>#</x-table-element>
            <x-table-element>title</x-table-element>
            <x-table-element>quantity</x-table-element>
            <x-table-element>price</x-table-element>
            <x-table-element>-</x-table-element>
            <x-table-element>-</x-table-element>
        </tr>
            <tr>
                <x-table-element>{{ $product->id }}</x-table-element>
                <x-table-element>{{ $product->item_name }}</x-table-element>
                <x-table-element>{{ $product->quantity }}</x-table-element>
                <x-table-element>{{ $product->price }}</x-table-element>
                <x-table-element><a href="/products/{{$product->id}}/edit" class="hover:underline text-blue-900">EDIT</a></x-table-element>
                <x-table-element>
                    <form action="/products/{{$product->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="hover:underline text-red-600">DELETE</button>
                    </form>
                </x-table-element>
            </tr>
    </table>
    <div class=" flex flex-col gap-2 items-center mt-6">
        <x-link href="/products">Back</x-link>
    </div>
</x-layout>