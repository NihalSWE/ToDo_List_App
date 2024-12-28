<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List Application</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Inter:wght@400;600&display=swap"
        rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans antialiased">

    <!-- Main Container -->
    <div class="min-h-screen flex flex-col bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500">

        <!-- Header Section -->
        <header class="text-center py-12 text-white">
            <h1 class="text-5xl font-extrabold">To-Do List Application</h1>
            <p class="mt-4 text-lg">Stay organized and manage your tasks efficiently.</p>
        </header>

        <!-- Add Task Button -->
        <div class="flex justify-center mb-8">
            <a href="{{ route('create') }}"
                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-lg rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Add New Task
            </a>
        </div>

        <!-- Task List Section -->
        <div class="max-w-4xl mx-auto px-6 py-8 bg-white rounded-xl shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Your Tasks</h2>

            <!-- Task Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Title</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Due Date</th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        {{-- @foreach ($tasks as $task)
                            <tr class="hover:bg-gray-50 transition duration-300">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $task->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                    <span class="px-3 py-1 rounded-full text-white bg-{{ $task->status == 'completed' ? 'green' : 'yellow' }}-500">
                                        {{ ucfirst($task->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block ml-4">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer Section -->
        <footer class="bg-gray-900 text-white text-center py-4 mt-12">
            <p>&copy; 2024 To-Do List Application | Designed by Nihal</p>
        </footer>
    </div>

</body>

</html>
