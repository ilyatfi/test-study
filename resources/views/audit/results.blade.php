<x-layout>
    <x-page-heading>Products Audit Result</x-page-heading>

    @foreach($logs as $log)
        <p class="mt-3">{{ json_encode($log) }}</p>
    @endforeach
</x-layout>