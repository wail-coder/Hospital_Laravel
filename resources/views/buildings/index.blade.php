<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hospitals List') }}
        </h2>
    </x-slot>
    


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="flex items-center justify-center">
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">

    @foreach ($hospitals as $hospital)

        <!-- 1 card -->
        <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl">
            <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-blue-500 left-4 -top-6">
                <!-- svg  -->
                <button>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <!-- <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 12 0 00-2 2v14a2 2 0 002 2z" /> -->
                </svg>
                </button>
            </div>
            <div class="mt-8">
                <p class="text-xl font-semibold my-2">{{$hospital->name}}</p>
                <div class="flex space-x-2 text-gray-400 text-sm">
                    <!-- svg  -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                     <p>TBD</p> 
                </div>
                <div class="flex space-x-2 text-gray-400 text-sm my-3">
                    <!-- svg  -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                     <p>{{ $hospital->created_at }}</p> 
                </div>
                <div class="border-t-2"></div>

                <div class="flex justify-between">
                    <div class="my-2">
                        <p class="font-semibold text-base mb-2">Buildings</p>
                        <div class="text-base text-gray-400 font-semibold">
                            <p>&nbsp3</p>
                        </div>
                    </div>
                    <div class="my-2">
                        <p class="font-semibold text-base mb-2">Floors</p>
                        <div class="text-base text-gray-400 font-semibold">
                            <p>&nbsp3</p>
                        </div>
                    </div>
                     <div class="my-2">
                        <p class="font-semibold text-base mb-2">Rooms</p>
                        <div class="text-base text-gray-400 font-semibold">
                            <p>&nbsp3</p>
                        </div>
                    </div>
                </div>
                <div class="border-t-2"></div>
                <a class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                 href="{{ route('hospitals.show', $hospital->id) }}">
                Details
                </a>
                <a class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                 href="{{ route('hospitals.show', $hospital->id) }}">
                Edit
                </a>
            </div>
        </div>
        @endforeach

        </div>
    </div>
</div>
<!-- 
          <div class="flex space-x-4">
         
          <div class="grid grid-flow-col auto-cols-max">
            <a href="#" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-full">
              Add Hospital
            </a>
          </div>
          <div class="grid grid-flow-col auto-cols-max">
            <a href="{{ route('hospitals.createBuilding') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-full">
              Add Building
            </a>
          </div>
          <div class="grid grid-flow-col auto-cols-max">
            <a href="{{ route('hospitals.createFloor') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-full">
              Add Floor
            </a>
          </div>
          <div class="grid grid-flow-col auto-cols-max">
            <a href="{{ route('hospitals.createRoom') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-full">
              Add Room
            </a>
          </div>
        </div>
          <br>

        <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  ID
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Name
                </th>
                {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  created_at
                </th> --}}
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  updated_at
                </th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Action
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($hospitals as $hospital)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{$hospital->id}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                      <img class="h-10 w-10 rounded-full" src="https://i2.wp.com/boingboing.net/wp-content/uploads/2020/06/IMG_20200602_082003_707.jpg" alt="">
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{$hospital->name}}
                      </div>
                      <div class="text-sm text-gray-500">
                        {{$hospital->created_at}}
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{$hospital->updated_at}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  <a href="{{ route('hospitals.show', $hospital->id) }}" class="text-blue-600 hover:text-indigo-900 mb-2 mr-2">Show</a>
                  <a href="{{ route('hospitals.edit', $hospital->id) }}" class="text-red-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                  <form class="inline-block" action="{{ route('hospitals.destroy', $hospital->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                  </form>
                </td>
              </tr>
              @endforeach
  
              More items...
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
   -->
        </div>
    </div>
</x-app-layout>


