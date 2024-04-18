<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if(Auth::user()->user_type == 'sl')
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Seller</th>
                                    <th class="px-4 py-2">Points</th>
                                    <th class="px-4 py-2">Qr</th>
                                    <th class="px-4 py-2">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border px-4 py-2 text-center">{{ Auth::user()->name }}</td>
                                    <td class="border px-4 py-2 text-center">{{ Auth::user()->points }}</td>
                                    <td class="border px-4 py-2 text-center"><img src="{{ route('generate.qr_code',['id' => Auth::user()->id]) }}" alt="QR Code"></td>
                                    <td class="border px-4 py-2 text-center"><a href="{{ route('generate.qr_code', ['id' => Auth::user()->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" download>Downloads</a></td>
                                </tr>
                            </tbody>
                        </table>

                        <h2 class="mt-9 font-bold">Buyers in your postalCode</h2>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Buyer</th>
                                    <th class="px-4 py-2">Number</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allUsers as $user)
                                @if($user->user_type == 'bu')
                                <tr>
                                    <td class="border px-4 py-2 text-center">{{ $user->name }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $user->number }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>

                        <h2 class="mt-9 font-bold">Point Buyers in your postalCode</h2>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Point Buyer</th>
                                    <th class="px-4 py-2">Number</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allUsers as $user)
                                @if($user->user_type == 'pb')
                                <tr>
                                    <td class="border px-4 py-2 text-center">{{ $user->name }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $user->number }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                   
                    @if($results != null)
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Seller</th>
                                <th class="px-4 py-2">Point Price(Rs.)</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2">{{ $results->name }}</td>
                                <td class="border px-4 py-2">{{ $results->points * 50}}</td>
                            </tr>
                        </tbody>
                    </table>
                    @endif


                    @if(Auth::user()->user_type == 'bu')
                        @if($results)
                            <h2 class="mt-5 font-bold">Add Points</h2>
                            <form action="{{ route('user.edit', ['id' => $results->id]) }}" method="POST" class=" mb-5 w-full">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="weight" class="block text-sm font-medium text-gray-700">Weight</label>
                                    <input type="text" id="weight" name="weight" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                                    <!-- Replace 'input' with your actual input type and attributes -->
                                </div>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md ml-2">
                                    Submit
                                </button>
                            </form>
                        @endif
                        <h2 class="mt-9 font-bold">Sellers in your postalCode</h2>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Buyer</th>
                                    <th class="px-4 py-2">Number</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allUsers as $user)
                                    @if($user->user_type == 'sl')
                                    <tr>
                                        <td class="border px-4 py-2 text-center">{{ $user->name }}</td>
                                        <td class="border px-4 py-2 text-center">{{ $user->number}}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
</x-app-layout>