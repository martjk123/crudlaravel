<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-xl mx-auto p-6">

    <div class="bg-white shadow rounded-lg p-6">

        <h2 class="text-2xl font-bold mb-6 text-gray-800">
            Edit User
        </h2>

        {{-- FORM --}}
        <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- NAME --}}
            <div>
                <label class="block text-sm font-medium mb-1">Name</label>
                <input type="text" name="name" value="{{ $user->name }}"
                    class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            {{-- EMAIL --}}
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ $user->email }}"
                    class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <div class="flex gap-3 mt-4">

                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Update User
                </button>

                <a href="{{ route('home') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>