<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Groups List') }}
        </h2>
    </x-slot>
    


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if(Session::has('message-success'))
            <div class="alert flex flex-row items-center bg-green-200 p-5 rounded border-b-2 border-green-300">
              <div class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                <span class="text-green-500">
                  <svg fill="currentColor"
                    viewBox="0 0 20 20"
                    class="h-6 w-6">
                    <path fill-rule="evenodd"
                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                  </svg>
                </span>
              </div>
              <div class="alert-content ml-4">
                <div class="alert-title font-semibold text-lg text-green-800">
                  Success
                </div>
                <div class="alert-description text-sm text-green-600">
                  {{ Session::get('message-success') }}
                </div>
              </div>
            </div>
            <br>
          @endif

        <div class="flex items-center justify-center">
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">

    @foreach ($groups as $group)

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
        <p class="text-xl font-semibold my-2">{{$group->name}}</p>
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
             <p>{{ $group->created_at }}</p> 
        </div>
        <div class="border-t-2"></div>

        
        <div class="border-t-2"></div>
        <a class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800"
         href="{{ route('groups.show', $group->id) }}">
        Details
        </a>
        <a class="inline-flex items-center h-8 px-1 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"
         href="{{ route('groups.assignFirstStep', $group->id) }}">
        assign rooms
        </a>
    </div>
</div>
@endforeach


        @can('SuperAdmin_access')
        <a href="{{ route('groups.createFirstStep') }}" class="hover:border-transparent hover:shadow-xs w-full flex items-center justify-center rounded-lg border-2 border-dashed border-gray-200 text-sm font-medium py-4">
        New Group
        </a>
        @endcan
        </div>
    </div>
</div>

        </div>
    </div>
</x-app-layout>


