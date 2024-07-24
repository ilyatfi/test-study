<x-layout>
    <x-page-heading>Product Audit</x-page-heading>

    <form action="/products/audit" method="GET" class="text-center relative w-fit mt-6">

        <label for="start_date">From:</label>
        <x-forms.input type="date" name="start_date" value="{{ request()->get('start_date') }}"/>

        <label for="end_date">Until:</label>
        <x-forms.input type="date" name="end_date" value="{{ request()->get('end_date') }}"/>

        <x-button>Load Audit</x-button>

        @foreach ($errors->all() as $error)
            <p class="text-sm text-red-900 mt-2">{{ $error }}</p>
        @endforeach
    </form>

    <table class="text-center my-10 mx-auto border border-black">
        <tr class="bg-gray-500/20">
            <x-table-element>#</x-table-element>
            <x-table-element>user_id</x-table-element>
            <x-table-element>Product_id</x-table-element>
            <x-table-element>action</x-table-element>
            <x-table-element>when</x-table-element>
        </tr>
        @isset($logs)
            @foreach($logs as $log)
            
            <tr>
                <x-table-element>{{ $log->id }}</x-table-element>
                <x-table-element>{{ $log->user_id }}</x-table-element>
                <x-table-element>{{ $log->product_id }}</x-table-element>
                <x-table-element>{{ $log->action }}</x-table-element>
                <x-table-element>{{ $log->created_at }}</x-table-element>
            </tr>
            @endforeach
        @endisset
    </table>
</x-layout>