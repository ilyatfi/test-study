<x-layout>
    <x-page-heading>Products Audit</x-page-heading>

    <form action="/api/products/audit" method="GET" class="text-center relative w-fit mt-6">

        <label for="start_date">From:</label>
        <x-forms.input type="date" name="start_date" value="{{old('start_date')}}"/>

        <label for="end_date">Until:</label>
        <x-forms.input type="date" name="end_date" value="{{old('end_date')}}"/>

        <x-button>Load Audit</x-button>

        @foreach ($errors->all() as $error)
            <p class="text-sm text-red-900 mt-2">{{ $error }}</p>
        @endforeach
    </form>
</x-layout>