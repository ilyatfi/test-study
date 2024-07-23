<x-layout>
    <x-page-heading>Login</x-page-heading>
    
    <x-forms.form action="/login" method="POST">
        @csrf

        <x-forms.input type="text" name="name" placeholder="Username" value="{{old('name')}}"/>
        <x-forms.input type="password" name="password" placeholder="Password"/>

        @foreach ($errors->all() as $error)
            <p class="text-sm text-red-900 mt-1">{{ $error }}</p>
        @endforeach
        
        <x-button class="border w-20 mt-5">Submit</x-button>
    </x-forms.form>
</x-layout>
