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
                <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-green-600 text-bold">Groups Information</div>
            </div>
            <div class="flex-auto border-t-2 transition duration-500 ease-in-out bg-green-600 border-green-600"></div>
            <div class="flex items-center text-white  relative">
                <div class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 bg-green-600  border-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus ">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="8.5" cy="7" r="4"></circle>
                        <line x1="20" y1="8" x2="20" y2="14"></line>
                        <line x1="23" y1="11" x2="17" y2="11"></line>
                    </svg>
                </div>
                <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-green-600 text-bold">Member Information</div>
            </div>
            <div class="flex-auto border-t-2 transition duration-500 ease-in-out bg-green-600 border-green-600"></div>
            <div class="flex items-center text-gray-500  relative">
                <div class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail ">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                </div>
                
                <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-green-600 text-bold">Confirm</div>
            </div>
        </div>
    </div>
    <div class="mt-8 p-4">
    
    <h3 class="text-xl text-gray-700 mb-2 font-bold" >Group Information</h3>

<!-- <div class="flex flex-wrap space-x-5 -mx-1 overflow-hidden bg-white border border-gray-300"> -->
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
                            {{ session('group_number') }}
                            </td>
                        </tr>
                        <tr class="border-b">
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                            {{ session('group_name') }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <!-- </div> -->

    <div class="mt-8 p-4">
            <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead>
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  ID
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Job Title
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Status
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Role
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($users as $user)
              <tr  id="hideShowFloor_{{ $user->id }}" >
              <!-- <input type="hidden" name="user_id[]" value="{{ $user->id }}"> -->

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{$user->id}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                      <img class="h-10 w-10 rounded-full" src="https://i2.wp.com/boingboing.net/wp-content/uploads/2020/06/IMG_20200602_082003_707.jpg" alt="">
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{$user->name}}
                      </div>
                      <div class="text-sm text-gray-500">
                        {{$user->email}}
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{$user->job_title}}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if ($user->password_status == '0')
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      Active
                    </span>
                    @else
                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                        Not Active
                      </span>
                    @endif 
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  @foreach ($user->roles as $role)
                  {{ $role->title }}
                  @endforeach
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
    <form method="POST" action="{{ route('groups.storeThirdStep') }}">
            @csrf
            <x-jet-validation-errors class="mb-4" />
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
</div>



</x-app-layout>