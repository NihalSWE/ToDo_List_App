<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
</head>

<body class="bg-gray-50 font-['Inter']">
    <!-- Header -->
    <div class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <h1 class="text-xl font-bold text-gray-800">Task Manager</h1>
                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors"><i
                        data-feather="plus" class="w-4 h-4"></i>
                    <a href="{{ route('create') }}">
                        New Task</a>
                </button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <i data-feather="list" class="w-6 h-6 text-blue-600"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">All Tasks</p>
                        <p class="text-2xl font-semibold">{{ $tasks->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-yellow-100 rounded-lg">
                        <i data-feather="clock" class="w-6 h-6 text-yellow-600"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Pending</p>
                        <p class="text-2xl font-semibold">{{ $tasks->where('status', 'pending')->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-green-100 rounded-lg">
                        <i data-feather="check-circle" class="w-6 h-6 text-green-600"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Completed</p>
                        <p class="text-2xl font-semibold">{{ $tasks->where('status', 'completed')->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

    <!-- Search Bar -->
<div class="bg-white rounded-lg shadow-sm p-4 mb-6 border border-gray-100">
    <div class="flex flex-wrap gap-4">
        <div class="flex-1 min-w-[240px]">
            <div class="relative">
                <!-- Search Form -->
                <form action="{{ route('search') }}" method="GET">
                    <input type="text" name="search" placeholder="Search tasks..."
                        class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        value="{{ request('search') }}"> <!-- Keeps the search value after submit -->
                    <i data-feather="search" class="w-4 h-4 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
                </form>
            </div>
        </div>
    </div>
</div>



        <!-- Task List -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-100">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Title</th>
                            <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Description</th>
                            <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Status</th>
                            <th class="text-left py-4 px-6 text-sm font-medium text-gray-500">Due Date</th>
                            <th class="text-right py-4 px-6 text-sm font-medium text-gray-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr class="border-b hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="font-medium text-gray-900">{{ $task->title }}</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="text-sm text-gray-500">{{ Str::limit($task->description, 50) }}</div>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                    {{ $task->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ ucfirst($task->status) }}
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="text-sm text-gray-900">
                                        {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}</div>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <a href="{{ route('edit', $task->id) }}"
                                        class="text-gray-400 hover:text-blue-600 mr-3">
                                        <i data-feather="edit-2" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('delete', $task->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-400 hover:text-red-600">
                                            <i data-feather="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>

</html>
