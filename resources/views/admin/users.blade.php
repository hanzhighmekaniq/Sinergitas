<x-layout-admin>
    <h1 class="text-2xl font-bold mb-4 text-gray-900">Users</h1>
    <div class="rounded-xl bg-white p-4">

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Message -->
        @if (session('error'))
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <a href="{{ route('users.create') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg mb-6 inline-block shadow-md">
            Create New User
        </a>

        <div class="overflow-x-auto rounded-lg">
            <table class="table-auto w-full border-collapse rounded-lg bg-white shadow-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b text-center text-gray-700">#</th>
                        <th class="px-4 py-2 border-b text-left text-gray-700">Name</th>
                        <th class="px-4 py-2 border-b text-left text-gray-700">Email</th>
                        <th class="px-4 py-2 border-b text-left text-gray-700">Role</th>
                        <th class="px-4 py-2 border-b text-center text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr class="bg-white hover:bg-gray-50">
                            <td class="px-4 py-2 border-b text-center text-gray-600">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border-b text-gray-900">{{ $user->name }}</td>
                            <td class="px-4 py-2 border-b text-gray-600">{{ $user->email }}</td>
                            <td class="px-4 py-2 border-b text-gray-600">{{ ucfirst($user->role) }}</td>
                            <td class="px-4 py-2 border-b text-center space-x-2 space-y-2">
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded text-sm shadow-md">
                                    Edit
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-sm shadow-md"
                                        onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-2 border-b text-center text-gray-500">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout-admin>
