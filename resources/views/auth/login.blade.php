<x-layout>
    <x-form title="Login" description="Glad to have you back.">


            <form action="/login" method="POST" class="mt-10 space-y-4">
                @csrf
        
                <x-form.field label="Email" name="email" type="email" placeholder="Enter your email" required />
                <x-form.field label="Password" name="password" type="password" placeholder="Enter your password" required />

                <button type="submit" class="btn mt-2 h-10 w-full">Login</button>
            </form>

    </x-form>
    
</x-layout>