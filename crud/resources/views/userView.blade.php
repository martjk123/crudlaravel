<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-3xl mx-auto p-6">

    {{-- SUCCESS MESSAGE --}}
{{-- SUCCESS TOAST --}}
@if(session('success'))
    <div id="toast-success"
        class="fixed top-5 right-5 z-50 bg-green-500 text-white px-4 py-3 rounded-lg shadow-lg flex items-center gap-3 transition-opacity duration-500">

        <span>✔ {{ session('success') }}</span>

        <button onclick="document.getElementById('toast-success').remove()"
            class="font-bold text-white">
            ✕
        </button>
    </div>

    <script>
        setTimeout(() => {
            const el = document.getElementById('toast-success');
            if (el) el.style.opacity = '0';
            setTimeout(() => el?.remove(), 500);
        }, 3000);
    </script>
@endif

@if($errors->any())
    <div id="toast-error"
        class="fixed top-5 right-5 z-50 bg-red-500 text-white px-4 py-3 rounded-lg shadow-lg">

        <div class="flex items-center gap-3">
            <span>⚠ Something went wrong</span>

            <button onclick="document.getElementById('toast-error').remove()"
                class="font-bold">
                ✕
            </button>
        </div>

    </div>

    <script>
        setTimeout(() => {
            const el = document.getElementById('toast-error');
            if (el) el.remove();
        }, 4000);
    </script>
@endif

    {{-- FORM --}}
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Create User</h2>

        <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" name="password" required
                    class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Create User
            </button>
        </form>
    </div>

    {{-- USERS TABLE --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Existing Users</h2>

        @if($users->isEmpty())
            <p class="text-gray-500">No users found.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="text-left px-4 py-2">ID</th>
                            <th class="text-left px-4 py-2">Name</th>
                            <th class="text-left px-4 py-2">Email</th>
                            <th class="text-left px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $user->id }}</td>
                                <td class="px-4 py-2">{{ $user->name }}</td>
                                <td class="px-4 py-2">{{ $user->email }}</td>
                                <td class="px-4 py-2">
                                <a href="{{ route('users.show', $user->id) }}"
                                class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">
                                    View
                                </a>
                                <a href="{{ route('users.edit', $user->id) }}" class="bg-green-500 text-white px-3 py-1 rounded text-sm hover:bg-green-600">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this user?')"
                                    class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</div>

</body>
</html>

