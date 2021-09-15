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
            <div class="flex items-center text-green-600 relative">
                <div class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail ">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                </div>
                <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-green-600 text-bold">Room Information</div>
            </div>
            <div class="flex-auto border-t-2 transition duration-500 ease-in-out"></div>
            <div class="flex items-center text-gray-500 relative">
                <div class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database ">
                        <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                        <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                        <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                    </svg>
                </div>
                <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-gray-500">Confirm</div>
            </div>
        </div>
    </div>
    
    <div class="mt-8 p-4">
    <div class="container text-center mx-auto p-4">
  <h3 class="text-xl text-gray-700 mb-2 font-bold" >floors</h3>
  <div class="flex justify-center rounded-lg text-lg" role="group">
  @for ($i = 1; $i <= $floor_number; $i++)
    <button id ="floor_{{ $i }}" href="#hideShowFloor_{{ $i }}" class="bg-white text-blue-500 active:bg-blue-700 hover:bg-blue-200 hover:text-white border border-blue-500  px-4 py-2 mx-0 rounded-l-lg rounded-r-lg outline-none focus:shadow-outline" onclick="showhide(this)">{{ $i }}</button>
    
  @endfor
  </div>
  
</div>
        <form method="POST" action="{{ route('buildings.storeRoomStep', $hospital->id) }}">
            @csrf
            <div>
            <x-jet-validation-errors class="mb-4" />
            <input type="hidden" name="hospital_id" value="{{ $hospital->id }}">

            @for ($i = 0; $i < count($room_number); $i++)
            <!-- {{ $room_number[$i]  }} -->
            <div id="hideShowFloor_{{ $i+1 }}" style="display:none">
                <!-- <a href="#">{{ $room_number[$i]  }}</a> -->

            <div href="#" class="flex flex-wrap space-x-5 -mx-1 overflow-hidden bg-white border border-gray-300">
              @for ($j = 1; $j <= $room_number[$i]; $j++)


            
    <!-- <div class ="flex-2">
        <div class="card bg-cyan-400 shadow-md inline-block w-96 h-96 rounded-3xl absolute bottom-0 transform -rotate-12"></div>
        <div class="card bg-indigo-400 shadow-lg inline-block w-96 h-96 rounded-3xl absolute bottom-0 transform -rotate-6"></div>
        <div class="card bg-pink-500 shadow-lg inline-block w-96 h-96 rounded-3xl absolute bottom-0 transform rotate-6"></div>
        <div class="card bg-white transition shadow-xl w-96 h-96 rounded-3xl absolute bottom-0 z-10 grid place-items-center">
            <div class="card bg-white shadow-inner h-4/5 w-3/4 rounded-2xl overflow-hidden relative">
                <h1 class="shadow-md text-xl font-thin text-center text-gray-600 uppercase p-3">Room #1</h1>
                <form action="" >
                    <input name="floor_number"  placeholder="name"  class="mx-5 my-4 px-4 rounded-2xl shadow-inner border border-blue-500 text-gray-800 text-center" required autofocus>
                    <input name="floor_number"  placeholder="number"  class="mx-5 my-4 px-4 rounded-2xl shadow-inner border border-blue-500 text-gray-800 text-center" required autofocus>
                </form>
            </div>
        </div>
    </div> -->

<br>
                <div class="mx-1 my-1 px-1 w-1/5 overflow-hidden bg-blue-200 border border-blue-300">
                <!-- <form action="" > -->
                    <label class="my-1 px-1 font-bold text-gray-500 uppercase">Room: </label>
                    <input name="room_name[]"  placeholder="name"  class="my-1 px-1 w-1/2 text-gray-800" required autofocus>
                    <input name="room_number[]"  placeholder="number"  class="my-1 px-1 w-1/4 text-gray-800" required autofocus>
                <!-- </form> -->
                </div>
              @endfor
            </div>
            </div>

            @endfor


            <div class="flex p-2 mt-4">
                
                <div class="flex-auto flex flex-row-reverse">
                    <button class="text-base  ml-2  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer 
            hover:bg-green-600  
            bg-green-600 
            text-green-100 
            border duration-200 ease-in-out 
            border-green-600 transition">Next</button>
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