<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label for="user_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
            <select id="user_type" name="user_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option selected>Choose User Type</option>
                <option value="sl">Supplier</option>
                <option value="bu">Centers</option>
                <option value="pb">Local Shop</option>
            </select>
        </div>
        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('User Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4" id='supplier_group'>
            <div class="mt-4">
                <x-input-label for="id_number" :value="__('Id Number')" />
                <x-text-input id="id_number" class="block mt-1 w-full" type="text" name="id_number" :value="old('id_number')" />
                <x-input-error :messages="$errors->get('id_number')" class="mt-2" />
            </div>
        </div>
        <!-- Number -->
        <div id="center_group">
            <div class="mt-4" >
                <x-input-label for="center_name" :value="__('Center Name')" />
                <x-text-input id="center_name" class="block mt-1 w-full" type="text" name="center_name" :value="old('center_name')"  />
                <x-input-error :messages="$errors->get('center_name')" class="mt-2" />
            </div>
            <div class="mt-4" >
                <x-input-label for="center_manager_name" :value="__('Center Manager Name')" />
                <x-text-input id="center_manager_name" class="block mt-1 w-full" type="text" name="center_manager_name" :value="old('center_manager_name')"  />
                <x-input-error :messages="$errors->get('manager_name')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="centera_address" :value="__('Center Address')" />
                <x-text-input id="centera_address" class="block mt-1 w-full" type="text" name="centera_address" :value="old('centera_address')" />
                <x-input-error :messages="$errors->get('centera_address')" class="mt-2" />
            </div>
        </div>

        <div id="shop_group">
            <div class="mt-4">
                <x-input-label for="shop_name" :value="__('Shop Name')" />
                <x-text-input id="shop_name" class="block mt-1 w-full" type="text" name="shop_name" :value="old('shop_name')"  />
                <x-input-error :messages="$errors->get('center_name')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="shop_address" :value="__('Shop Address')" />
                <x-text-input id="shop_address" class="block mt-1 w-full" type="text" name="shop_address" :value="old('shop_address')"  />
                <x-input-error :messages="$errors->get('shop_address')" class="mt-2" />
            </div>
        </div>
        <!-- Postal Code -->
        <div class="mt-4">
            <x-input-label for="postal_code" :value="__('Postal Code')" />
            <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" :value="old('postal_code')" required />
            <x-input-error :messages="$errors->get('numner')" class="mt-2" />
        </div>
        <!-- Number -->
        <div class="mt-4" id='number_group'>
            <x-input-label for="number" :value="__('Phone Number')" />
            <x-text-input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('number')" required />
            <x-input-error :messages="$errors->get('numner')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        const selectBox = document.getElementById('user_type');
        const shop_group = document.getElementById('shop_group');
        const center_group = document.getElementById('center_group');
        const supplier_group = document.getElementById('supplier_group');
        shop_group.style.display = 'none';
        center_group.style.display = 'none';
        supplier_group.style.display = 'none';

        selectBox.addEventListener('change', function() {
            if (selectBox.value === 'sl') {
                shop_group.style.display = 'none';
                center_group.style.display = 'none';
                supplier_group.style.display = 'block';
            } else if(selectBox.value === 'bu') {
                shop_group.style.display = 'none';
                center_group.style.display = 'block';
                supplier_group.style.display = 'none';
            } else if(selectBox.value === 'pb') {
                shop_group.style.display = 'block';
                center_group.style.display = 'none';
                supplier_group.style.display = 'block';
            }
        });
    </script>
</x-guest-layout>