<x-app-layout>


<!-- component -->
<div class="p-5">
    <div class="mx-3 p-4">
        <div class="flex items-center">
            <div class="flex items-center text-white relative">
                <div class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 bg-green-600  border-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark ">
                        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                    </svg>
                </div>
                <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-green-600 text-bold">Building Information</div>
            </div>
            <div class="flex-auto border-t-2 transition duration-500 ease-in-out bg-green-600 border-green-600"></div>
            <div class="flex items-center text-white relative">
                <div class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 bg-green-600  border-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus ">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="8.5" cy="7" r="4"></circle>
                        <line x1="20" y1="8" x2="20" y2="14"></line>
                        <line x1="23" y1="11" x2="17" y2="11"></line>
                    </svg>
                </div>
                <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-green-600 text-bold">Floor Information</div>
            </div>
            <div class="flex-auto border-t-2 transition duration-500 ease-in-out bg-green-600 border-green-600"></div>
            <div class="flex items-center text-white relative">
                <div class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 bg-green-600 border-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail ">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                </div>
                <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-green-600 text-bold">Room Information</div>
            </div>
            <div class="flex-auto border-t-2 transition duration-500 ease-in-out bg-green-600 border-green-600"></div>
            <div class="flex items-center text-gray-500 relative">
                <div class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database ">
                        <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                        <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                        <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                    </svg>
                </div>
                <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-green-600 text-bold">Confirm</div>
            </div>
        </div>
    </div>
    
    <div class="mt-8 p-4">
    <div class="container text-center mx-auto p-4">
  <div class="flex justify-center rounded-lg text-lg" role="group">
    
  </div>
  
</div>
        

            <h3 class="text-xl text-gray-700 mb-2 font-bold" >Building Information</h3>

            <div class="flex flex-wrap space-x-5 -mx-1 overflow-hidden bg-white border border-gray-300">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 w-full">
                                    
                                    <tr class="border-b">
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Number
                                        </th>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ session('building_number') }}
                                        </td>
                                    </tr>
                                    <tr class="border-b">
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ session('building_name') }}
                                        </td>
                                    </tr>
                                    <tr class="border-b">
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Location
                                        </th>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ session('building_location') }}
                                        </td>
                                    </tr>
                                    <tr class="border-b">
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Number Of Floors
                                        </th>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ count(session('floor_number')) }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- {{ $count = 0 }} -->
            @for ($i = 0; $i < count(session('floor_number')); $i++)

                <h3 class="text-xl text-gray-700 mb-2 font-bold" >Floor {{ session('floor_number')[$i] }} Information</h3>

                <div class="flex flex-wrap space-x-5 -mx-1 overflow-hidden bg-white border border-gray-300">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 w-full">
                                        
                                        <tr class="border-b">
                                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Number
                                            </th>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                            {{  session('floor_number')[$i] }}
                                            </td>
                                        </tr>
                                        <tr class="border-b">
                                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                            {{ session('building_name') }}
                                            </td>
                                        </tr>
                                        <tr class="border-b">
                                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Location
                                            </th>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                            {{ session('building_location') }}
                                            </td>
                                        </tr>
                                        <tr class="border-b">
                                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Number Of Rooms
                                            </th>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                            {{ session('room_numbers')[$i] }}
                                            </td>
                                        </tr>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                   

                </div>

                <div href="#" class="flex flex-wrap space-x-5 -mx-1 overflow-hidden bg-white border border-gray-300">
                <br>
                @for ($j = $count; $j < session('room_numbers')[$i]+$count; $j++)

                    <div class="mx-1 my-1 px-1 w-1/5 overflow-hidden bg-blue-200 border border-blue-300">
                    <!-- <form action="" > -->
                    <label class="my-1 px-1 font-bold text-gray-500 ">Room Name: {{ session('room_name')[$j] }} </label>
                    <label class="my-1 px-1 font-bold text-gray-500 ">Room NO: {{ session('room_number')[$j] }} </label>

                    <!-- </form> -->
                    </div>
                @endfor
                @php
                $count = session('room_numbers')[$i]+$count;
                @endphp 
                </div>

            @endfor


            <form method="POST" action="{{ route('buildings.storeLastStep', $hospital->id) }}">
            @csrf
            <x-jet-validation-errors class="mb-4" />
            <input type="hidden" name="hospital_id" value="{{ $hospital->id }}">
            <div class="flex p-2 mt-4">
                
                <div class="flex-auto flex flex-row-reverse">
                    <button class="text-base  ml-2  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer 
            hover:bg-green-600  
            bg-green-600 
            text-green-100 
            border duration-200 ease-in-out 
            border-green-600 transition">Submit</button>
                </div>
            </div>
            </form>


    </div>
</div>

<script type="text/javascript">
function showhide(elem) 
    {  
        // console.log(elem.getAttribute("href"));
        var div = document.getElementById(elem.getAttribute("href").replace("#", ""));
        
        if (div.style.display !== "none") {  
            div.style.display = "none";  
        }  
        else {  
            div.style.display = "block";  
        }  
    } 



    </script>

</x-app-layout>