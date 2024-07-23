<x-layout>
    <x-page-heading>Register</x-page-heading>

    <x-forms.form action="/register" method="POST">
        @csrf

        <x-forms.input type="text" name="name" placeholder="Username" value="{{old('name')}}"/>
        <x-forms.input type="password" name="password" placeholder="Password"/>
        <x-forms.input type="password" name="password_confirmation" placeholder="Confirm Password"/>
        <div>
            <span>Admin</span>
            <input type="checkbox" name="role" class="w-4 h-4">
        </div>

        @foreach ($errors->all() as $error)
            <p class="text-sm text-red-900 mt-1">{{ $error }}</p>
        @endforeach
        
        <x-button class="border w-20 mt-4">Submit</x-button>
    </x-forms.form>
</x-layout>
