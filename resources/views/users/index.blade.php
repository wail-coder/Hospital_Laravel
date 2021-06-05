<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users List') }}
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

          <div class="grid grid-flow-col auto-cols-max">
              <a href="{{ route('users.create') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-full">Add User</a>

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
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Job Title
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Status
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Role
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Action
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($users as $user)
              <tr>
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
                  <!-- <div class="text-sm text-gray-500">sub-title</div> -->
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
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a href="{{ route('users.show', $user->id) }}" class="text-blue-600 hover:text-indigo-900 mb-2 mr-2">Show</a>
                  <a href="{{ route('users.edit', $user->id) }}" class="text-yellow-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                  <a href="{{ route('users.reset', $user->id) }}" class="text-red-600 hover:text-indigo-900 mb-2 mr-2">Reset Password</a>
                  <form class="inline-block" action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
