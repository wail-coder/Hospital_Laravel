<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hospitals List') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

          <div class="flex space-x-4">
         
          <div class="grid grid-flow-col auto-cols-max">
            <a href="#" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-full">
              Add Hospital
            </a>
          </div>
          <div class="grid grid-flow-col auto-cols-max">
            <a href="#" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-full">
              Add Building
            </a>
          </div>
          <div class="grid grid-flow-col auto-cols-max">
            <a href="#" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-full">
              Add Floor
            </a>
          </div>
          <div class="grid grid-flow-col auto-cols-max">
            <a href="#" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-full">
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
  
              <!-- More items... -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
        </div>
    </div>
</x-app-layout>
