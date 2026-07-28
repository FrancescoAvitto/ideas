<x-layout>
    <x-form title="Edit your account" description="Need to make a tweak?">


            <form action="/profile" method="POST" class="mt-10 space-y-4">
                @csrf
                @method('PATCH')
        
                <x-form.field label="Name" name="name" placeholder="Enter your name" :value="$user->name" required />
                <x-form.field label="Email" name="email" type="email" placeholder="Enter your email" :value="$user->email"   required />
                <x-form.field label="New Password" name="password" type="password" placeholder="Enter your password" required />

                <button type="submit" class="btn mt-2 h-10 w-full">Update Account</button>
            </form>

    </x-form>
    
</x-layout>