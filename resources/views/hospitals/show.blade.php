<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $hospital->name }} Details
      </h2>
  </x-slot>

  <div>
      <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
          <div class="block mb-8">
              <a href="{{ route('hospitals.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Back to Hospitals list</a>
          </div>
        <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $hospital->id }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $hospital->name }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Location
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                    {{ $hospital->location }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Created_at
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $hospital->created_at }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Updated_at
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $hospital->updated_at }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


          <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <br>
        <div class="block mb-8">
              <h1 class="bg-blue-200 text-black text-center font-bold py-2 px-4 rounded">Buildings list</h1>
          </div>
       
        <div class="flex items-center justify-center">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">

            @for ($i = 0; $i < count($buildings); $i++)

            <!-- 1 card -->
            <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl">
                <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-blue-500 left-4 -top-6">
                    <!-- svg  -->
                    <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10v11h6v-7h6v7h6v-11L12,3z" />
                    </svg>
                    </button>
                </div>
                <div class="mt-8">
                    <p class="text-xl font-semibold my-2">{{ $buildings[$i]->name }}</p>
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
                        <p>{{ $buildings[$i]->created_at }}</p> 
                    </div>
                    <div class="border-t-2"></div>

                    <div class="flex justify-evenly">
                        <div class="my-2">
                            <p class="font-semibold text-base mb-2">Floors</p>
                            <div class="text-base text-gray-400 font-semibold">
                                <p>&nbsp {{ $arrayFloors[$i] }}</p>
                            </div>
                        </div>
                       
                    </div>
                    <div class="border-t-2"></div>
                    <a class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                    href="{{ route('buildings.show', $buildings[$i]->id) }}">
                    Details
                    </a>
                    <form class="inline-flex items-center h-4 px-2 m-1 text-sm" action="{{ route('buildings.destroy', ['id_h'=>$hospital->id, 'id_b'=>$buildings[$i]->id]) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                </form>
                </div>
            </div>
            @endfor


            <a href="{{ route('buildings.createFirstStep' ,$hospital->id) }}" class="hover:border-gray-600 hover:shadow-xs w-full flex items-center justify-center rounded-lg border-2 border-dashed border-gray-300 text-sm font-medium py-12">
                New Building
            </a>


      </div>
      
      
  </div>
</x-app-layout>