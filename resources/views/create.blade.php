<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Task</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans antialiased">

    <!-- Main Container -->
    <div class="min-h-screen flex flex-col bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500">

        <!-- Header Section -->
        <header class="text-center py-12 text-white">
            <h1 class="text-5xl font-extrabold">Add New Task</h1>
            <p class="mt-4 text-lg">Fill out the form below to add a new task to your to-do list.</p>
        </header>

        <!-- Task Form Section -->
        <div class="max-w-4xl mx-auto px-6 py-8 bg-white rounded-xl shadow-lg">
            <form action="{{ route('store') }}" method="POST">
                @csrf
                <!-- Title Field -->
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700">Task Title</label>
                    <input type="text" id="title" name="title" class="mt-2 px-4 py-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Description Field -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="4" class="mt-2 px-4 py-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>

                <!-- Status Field -->
                <div class="mb-6">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status" class="mt-2 px-4 py-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>

                <!-- Due Date Field -->
                <div class="mb-6">
                    <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date</label>
                    <input type="date" id="due_date" name="due_date" class="mt-2 px-4 py-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-lg rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Add Task
                    </button>
                </div>
            </form>
        </div>

        <!-- Footer Section -->
        <footer class="bg-gray-900 text-white text-center py-4 mt-12">
            <p>&copy; 2024 To-Do List Application | Designed by Nihal</p>
        </footer>
    </div>

</body>

</html>
