<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
     
    @can('Admin_access')
    @else

<!-- <div id="app">
    <post-component></post-component>
</div> -->

    <div class="row notification-container">
    @forelse($notifications as $notification)
    <!-- <button type="submit" value="delete">delete</button> -->
        
                @forelse($notification->data['Room'] as $room)
                
                    @switch($notification->data['Code'] )
                        @case("red")
                        <div class="flex justify-between text-white-200 shadow-inner rounded p-3 bg-red-600">
                            @break
                        @case("blue")
                        <div class="flex justify-between text-white-200 shadow-inner rounded p-3 bg-blue-600">
                            @break
                        @case("gray")
                        <div class="flex justify-between text-white-200 shadow-inner rounded p-3 bg-gray-600">
                            @break
                        @case("green")
                        <div class="flex justify-between text-white-200 shadow-inner rounded p-3 bg-green-600">
                            @break
                            @case("pink")
                        <div class="flex justify-between text-white-200 shadow-inner rounded p-3 bg-pink-600">
                            @break
                    @endswitch
                        <!-- Warning -->
                        
                        <!-- </div> -->
                        
                    <!-- @switch($notification->data['Code'] )
                        @case("red")
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            @break
                        @case("blue")
                        <div class="border border-t-0 border-blue-400 rounded-b bg-blue-100 px-4 py-3 text-blue-700">
                            @break
                        @case("gray")
                        <div class="border border-t-0 border-gray-400 rounded-b bg-gray-100 px-4 py-3 text-gray-700">
                            @break
                            @case("green")
                            <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
                            @break
                    @endswitch -->
                    <p class="self-center"><strong>Danger </strong>>Alarm!!! Code {{ $notification->data['Code'] }} from Room No.  {{ $room}}</p>
    <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>
    </div>
    <br>
                        <!-- <p>Alarm!!! Code {{ $notification->data['Code'] }} from Room No.  {{ $room}}</p> -->
                    <!-- </div> -->
                    @empty
        <!-- No, Notification found! -->
    @endforelse
            <!-- </div> -->
        <!-- </div> -->
    @empty
        <!-- No, Notification found! -->
    @endforelse
</div>
<!--    
<div class="flex justify-between text-red-200 shadow-inner rounded p-3 bg-red-600">
    <p class="self-center"><strong>Danger </strong>This is Danger alert.</p>
    <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>
    </div> -->


    <div class="flex items-center w-full justify-center">

        <div class="max-w-xs">
            <div class="bg-white shadow-xl rounded-lg py-3">
                <div class="photo-wrapper p-2">
                    <!-- <img class="w-32 h-32 rounded-full mx-auto" src="https://4.imimg.com/data4/MQ/WE/MY-21177865/nurse-hospital-uniform-500x500.jpg" alt="https://4.imimg.com/data4/MQ/WE/MY-21177865/nurse-hospital-uniform-500x500.jpg"> -->
                </div>
                <div class="p-2">
                    <h3 class="text-center text-xl text-gray-900 font-medium leading-8">{{ Auth::user()->name }}</h3>
                    <div class="text-center text-gray-400 text-xs font-semibold">
                        <p>{{ Auth::user()->job_title }}</p>
                    </div>
                    <table class="text-xs my-3">
                        <tbody><tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Rooms</td>
                            <td class="px-2 py-2">
                            @forelse($rooms as $room)
                                {{$room->number}},
                            @empty
                                No, Room found!
                            @endforelse
                            </td>
                        </tr>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Phone</td>
                            <td class="px-2 py-2">+966 xxxxxxxx</td>
                        </tr>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Email</td>
                            <td class="px-2 py-2">{{ Auth::user()->email }}</td>
                        </tr>
                    </tbody></table>

                    <!-- <div class="text-center my-3">
                        <a class="text-xs text-indigo-500 italic hover:underline hover:text-indigo-600 font-medium" href="#">View Profile</a>
                    </div> -->

                </div>
            </div>
        </div>
    </div>
    <br>

 

    <div class="flex justify-center">
    <form method="POST" action="{{ route('users.sendNotifications') }}">
    @csrf
    @forelse($rooms as $room)
    <div class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

        <!-- <div class="p-5" x-data="{ active: false }"> -->
            <!-- <button :class="{ 'bg-green-300': active }" class="hover:bg-green-200 border border-gray-700 py-2 px-4 rounded w-40 text-left text-black font-bold" @click="active = !active" type="input" name ="room" value = "{{$room->number}}" /> -->
            <!-- {{$room->number}}
            </button> -->

                  <input type="checkbox" name="room_value[]" class="form-checkbox h-5 w-5 text-gray-600" value="{{$room->number}}" id ="room_{{ $room->number }}" href="#hideShowroom_{{ $room->number }}"  onclick="showhide(this)">
                  Room : {{$room->number}}
                  </input>
                          

        </div>
    @empty
         No, Room found!
    @endforelse
    
    @if($errors->any())
   <ul class="alert alert-danger">
         <li> {{$errors->first()}} </li>
   </ul>
@endif
</div>

   


<br>
<div class="flex justify-center ...">

@if(count($rooms) > 0)
        <button class="h-10 px-5 m-2 text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800" type="submit" name ="value" value ="red">Red</button>
        <button class="h-10 px-5 m-2 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800" type="submit" name ="value" value ="green">Green</button>
        <button class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700" type="submit" name ="value" value ="blue">Blue</button>
        <button class="h-10 px-5 m-2 text-gray-100 transition-colors duration-150 bg-gray-700 rounded-lg focus:shadow-outline hover:bg-gray-800" type="submit" name ="value" value ="gray">Gray</button>
        <button class="h-10 px-5 m-2 text-pink-100 transition-colors duration-150 bg-pink-600 rounded-lg focus:shadow-outline hover:bg-pink-700" type="submit" name = "value" value ="pink">Pink</button>
@endif
    </form>
</div>


    @endcan

    </div>
  </div>
  
        </div>
    </div>

    <script>
     // Script For Close alert

  var alert_del = document.querySelectorAll('.alert-del');
  alert_del.forEach((x) =>
    x.addEventListener('click', function () {
      x.parentElement.classList.add('hidden');
    })
  );
    </script>

    
</x-app-layout>
