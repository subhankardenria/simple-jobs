<x-layout>
    <x-slot name="heading">Log In</x-slot>
    <form method="POST" action="#">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="email" name="email" id="email" :value="old('email')" placeholder="johndoe@me.com"
                                required />
                            <x-form-error for="email" />
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password" name="password" id="password" required />
                            <x-form-error for="password" />
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            <x-form-button>Login</x-form-button>
        </div>
    </form>
</x-layout>
