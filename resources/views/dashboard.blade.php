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
   

    <div class="flex items-center w-full justify-center">

        <div class="max-w-xs">
            <div class="bg-white shadow-xl rounded-lg py-3">
                <div class="photo-wrapper p-2">
                    <img class="w-32 h-32 rounded-full mx-auto" src="https://4.imimg.com/data4/MQ/WE/MY-21177865/nurse-hospital-uniform-500x500.jpg" alt="https://4.imimg.com/data4/MQ/WE/MY-21177865/nurse-hospital-uniform-500x500.jpg">
                </div>
                <div class="p-2">
                    <h3 class="text-center text-xl text-gray-900 font-medium leading-8">{{ Auth::user()->name }}</h3>
                    <div class="text-center text-gray-400 text-xs font-semibold">
                        <p>{{ Auth::user()->job_title }}</p>
                    </div>
                    <table class="text-xs my-3">
                        <tbody><tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Rooms</td>
                            <td class="px-2 py-2">202,203,204,205</td>
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
  <div class="p-5" x-data="{ active: false }">
    <button :class="{ 'bg-green-300': active }" class="hover:bg-green-200 border border-gray-700 py-2 px-4 rounded w-40 text-left text-black font-bold" @click="active = !active">
      202
    </button>
  </div>
  <div class="p-5" x-data="{ active: false }">
    <button :class="{ 'bg-green-300': active }" class="hover:bg-green-200 border border-gray-700 py-2 px-4 rounded w-40 text-left text-black font-bold" @click="active = !active">
    203
    </button>
  </div>
  <div class="p-5" x-data="{ active: false }">
    <button :class="{ 'bg-green-300': active }" class="hover:bg-green-200 border border-gray-700 py-2 px-4 rounded w-40 text-left text-black font-bold" @click="active = !active">
    204
    </button>
  </div>
  <div class="p-5" x-data="{ active: false }">
    <button :class="{ 'bg-green-300': active }" class="hover:bg-green-200 border border-gray-700 py-2 px-4 rounded w-40 text-left text-black font-bold" @click="active = !active">
    205
    </button>
  </div>
</div>
   
<br>
<div class="flex justify-center ...">
        <button class="h-100 px-5 m-2 text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800">Red</button>
        <button class="h-10 px-5 m-2 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800">Green</button>
        <button class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">Blue</button>
        <button class="h-10 px-5 m-2 text-gray-100 transition-colors duration-150 bg-gray-700 rounded-lg focus:shadow-outline hover:bg-gray-800">Gray</button>
        <button class="h-10 px-5 m-2 text-pink-100 transition-colors duration-150 bg-pink-600 rounded-lg focus:shadow-outline hover:bg-pink-700">Pink</button>
        <button class="h-10 px-5 m-2 text-purple-100 transition-colors duration-150 bg-purple-600 rounded-lg focus:shadow-outline hover:bg-purple-700">Purple</button>
    </div>


    @endcan

    </div>
  </div>
  
        </div>
    </div>

    
</x-app-layout>
