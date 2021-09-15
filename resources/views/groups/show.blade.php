<x-app-layout>


<!-- component -->
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
                            {{ $groups->number }}
                            </td>
                        </tr>
                        <tr class="border-b">
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                            {{ $groups->name  }}
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
    

</div>

    </div>
</div>



</x-app-layout>