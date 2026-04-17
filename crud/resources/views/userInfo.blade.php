<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Info</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-xl mx-auto p-6">

    <div class="bg-white shadow rounded-lg p-6">

        <h2 class="text-2xl font-bold mb-6 text-gray-800">
            User Information
        </h2>

        <div class="space-y-3 text-gray-700">

            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold">ID:</span>
                <span>{{ $user->id }}</span>
            </div>

            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold">Name:</span>
                <span>{{ $user->name }}</span>
            </div>

            <div class="flex justify-between border-b pb-2">
                <span class="font-semibold">Email:</span>
                <span>{{ $user->email }}</span>
            </div>

        </div>

        {{-- BACK BUTTON --}}
        <div class="mt-6">
            <a href="{{ route('home') }}"
               class="inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                Back
            </a>
        </div>

    </div>

</div>

</body>
</html>