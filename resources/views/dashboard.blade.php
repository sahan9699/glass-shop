<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(Auth::user()->user_type_id == '1')
                    <form action="{{ route('user.search')}} " method="GET" class=" mb-5 w-full">
                        @csrf
                        <div class="mb-4">
                            <input type="text" id="query" name="query" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Search using ID">
                            <!-- Replace 'input' with your actual input type and attributes -->
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md ml-2">
                            Search ID
                        </button>
                        <button id="cameraButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md ml-2">
                            Search QR
                        </button>
                        <input type="file" accept="image/*" id="fileInput" capture="capture" style="display: none;">
                    </form>

                    <hr class="border-t border-gray-300 my-6">
                    @if(isset($userById))
                    <h2 class="mt-5 font-bold">Price(Rs.)</h2>
                    <form action="{{ route('user.localShopUpdate', ['id' => $userById->id])}}" method="POST" class=" mb-5 w-full">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <input type="text" id="weight" name="weight" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Price">
                            <!-- Replace 'input' with your actual input type and attributes -->
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md ml-2" onclick="return confirm('Are you sure you want to submit?')">
                            Add Point
                        </button>
                    </form>

                   
                    <h2 class="mt-5 font-bold">Search User</h2>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Seller</th>
                                <th class="px-4 py-2">Point Price(Rs.)</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="border px-4 py-2">{{ $userById->name }}</td>
                                <td class="border px-4 py-2">{{ $userById->points * 50}}</td>
                            </tr>

                        </tbody>
                    </table>

                    <hr class="border-t border-gray-300 my-6">
                    @endif

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Seller</th>
                                <th class="px-4 py-2">Points</th>
                                <th class="px-4 py-2">Price(Rs.)</th>
                                <th class="px-4 py-2">Qr</th>
                                <th class="px-4 py-2">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2 text-center">{{ Auth::user()->name }}</td>
                                <td class="border px-4 py-2 text-center">{{ Auth::user()->points }}</td>
                                <td class="border px-4 py-2 text-center">{{ Auth::user()->points  * 50}}</td>
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
                                @if($user->user_type_id == '2')
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
                            @if($user->user_type_id == '3')
                            <tr>
                                <td class="border px-4 py-2 text-center">{{ $user->name }}</td>
                                <td class="border px-4 py-2 text-center">{{ $user->number }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    @endif


                    @if(Auth::user()->user_type_id == '2')
                    <form action="{{ route('user.search')}} " method="GET" class=" mb-5 w-full">
                        @csrf
                        <div class="mb-4">
                            <input type="text" id="query" name="query" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Search using ID">
                            <!-- Replace 'input' with your actual input type and attributes -->
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md ml-2">
                            Search ID
                        </button>
                        <button id="cameraButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md ml-2">
                            Search QR
                        </button>
                        <input type="file" accept="image/*" id="fileInput" capture="capture" style="display: none;">
                    </form>
                    <hr class="border-t border-gray-300 my-6">
                    @if(isset($userById))
                    <h2 class="mt-5 font-bold">Search User</h2>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Seller</th>
                                <th class="px-4 py-2">Point Price(Rs.)</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="border px-4 py-2">{{ $userById->name }}</td>
                                <td class="border px-4 py-2">{{ $userById->points * 50}}</td>
                            </tr>

                        </tbody>
                    </table>
                    <hr class="border-t border-gray-300 my-6">

                    <h2 class="mt-5 font-bold">Add Weight(kg)</h2>
                    <form action="{{ route('user.edit', ['id' => $userById->id]) }}" method="POST" class=" mb-5 w-full">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <input type="text" id="weight" name="weight" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Weight">
                            <!-- Replace 'input' with your actual input type and attributes -->
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md ml-2" onclick="return confirm('Are you sure you want to submit?')">
                            Add Point
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
                                @if($user->user_type_id == '1')
                                <tr>
                                    <td class="border px-4 py-2 text-center">{{ $user->name }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $user->number}}</td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    @endif

                    @if(Auth::user()->user_type_id == '3')
                    <form action="{{ route('user.search')}} " method="GET" class=" mb-5 w-full">
                        @csrf
                        <div class="mb-4">
                            <input type="text" id="query" name="query" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Search using ID">
                            <!-- Replace 'input' with your actual input type and attributes -->
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md ml-2">
                            Search ID
                        </button>
                        <button id="cameraButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md ml-2">
                            Search QR
                        </button>
                        <input type="file" accept="image/*" id="fileInput" capture="capture" style="display: none;">
                    </form>
                    @if(isset($userById))
                    <h2 class="mt-5 font-bold">Search User</h2>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Seller</th>
                                <th class="px-4 py-2">Point Price(Rs.)</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="border px-4 py-2">{{ $userById->name }}</td>
                                <td class="border px-4 py-2">{{ $userById->points * 50}}</td>
                            </tr>

                        </tbody>
                    </table>

                    @endif
                    <hr class="border-t border-gray-300 my-6">
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
                            @if($user->user_type_id == '1')
                            <tr>
                                <td class="border px-4 py-2 text-center">{{ $user->name }}</td>
                                <td class="border px-4 py-2 text-center">{{ $user->number}}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    <hr class="border-t border-gray-300 my-6">
                    <h2 class="mt-9 font-bold">Your Data</h2>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Seller</th>
                                <th class="px-4 py-2">Points</th>
                                <th class="px-4 py-2">Price(Rs.)</th>
                                <th class="px-4 py-2">Qr</th>
                                <th class="px-4 py-2">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2 text-center">{{ Auth::user()->name }}</td>
                                <td class="border px-4 py-2 text-center">{{ Auth::user()->points }}</td>
                                <td class="border px-4 py-2 text-center">{{ Auth::user()->points  * 50}}</td>
                                <td class="border px-4 py-2 text-center"><img src="{{ route('generate.qr_code',['id' => Auth::user()->id]) }}" alt="QR Code"></td>
                                <td class="border px-4 py-2 text-center"><a href="{{ route('generate.qr_code', ['id' => Auth::user()->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" download>Downloads</a></td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var cameraButton = document.getElementById('cameraButton');
                var fileInput = document.getElementById('fileInput');

                // Add click event listener to the button
                cameraButton.addEventListener('click', function() {
                    // Trigger click event on the file input
                    fileInput.click();
                });

                // Add change event listener to the file input
                fileInput.addEventListener('change', function() {
                    // Handle file selection here if needed
                    console.log('File selected:', this.files[0]);
                });
            });
        </script>

</x-app-layout>