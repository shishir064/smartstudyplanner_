<?php include '../backend/db_connect.php';
$result = mysqli_query($conn, "SELECT * FROM tasks ORDER BY id DESC");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="./output.css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css"
      rel="stylesheet"
    />
  </head>

  <body class="min-h-screen flex flex-col bg-[#F7FAFF]">
    <header
      class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white sticky z-10 top-0">
      <nav
        class="flex container mx-auto justify-between items-center px-4 py-6"
      >
        <h1 class="text-1xl md:text-3x1 lg:text-4xl font-bold">
          <a href="./home.html"> Smart Study Planner</a>
        </h1>
        <div class="flex items-center gap-4 text-2xl">
          <span class="hidden sm:block">Welcome, Student</span>

          <form action="../backend/logout.php" method="POST" class="mt-3">
            <button
              type="submit"
              onclick="return confirm('Are you sure you want to logout?')"
              class="bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-gray-200 flex items-center gap-1"
            >
              <i class="ri-delete-bin-6-line"></i> Logout
            </button>
          </form>
        </div>
      </nav>
    </header>

    <main class="flex-1 w-full">
      <div class="max-w-8xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
          <aside class="bg-white rounded-xl shadow p-6 h-full">
            <ul class="space-y-4 font-medium">
              <li
                class="text-blue-600 hover:text-blue-500 flex items-center gap-2"
              >
                <i class="ri-dashboard-line"></i>
                <a href="dashboard.php">Dashboard</a>
              </li>
              <li
                class="text-blue-600 hover:text-blue-500 flex items-center gap-2"
              >
                <i class="ri-dashboard-line"></i>
                <a href="mytask.php">My tasks</a>
              </li>
              <li
                class="flex items-center gap-2 text-blue-600 hover:text-blue-500 cursor-pointer"
              >
                <i class="ri-calendar-line"></i>
                <a href="status.php">Status</a>
              </li>
              <li
                class="text-blue-600 hover:text-blue-500 flex items-center gap-2"
              >
                <i class="ri-dashboard-line"></i>
                <a href="profile.php">Profile</a>
              </li>
            </ul>
          </aside>

          <section class="lg:col-span-3 space-y-6">
            <div class="flex justify-end">
              <button
                onclick="openModal()"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center gap-2">
                <i class="ri-add-line"></i> Add Task
              </button>
            </div>
            <div class="bg-white rounded-xl shadow p-4">
              <div class="bg-white rounded-xl shadow overflow-hidden">
             <div class="relative overflow-x-auto min-h-[420px] max-h-[420px] -mx-4 sm:mx-0">
             <table class="min-w-[900px] w-full text-sm text-left text-gray-700">
            <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="table-checkbox" type="checkbox" value="" class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="table-checkbox" class="sr-only">Table checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    S.N
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Title
                </th>
                <th scope="col" class="px-6  py-3 font-medium">
                    Description
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Category
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Time
                </th>
                <th scope="col" class="px-6 py-3  font-medium">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="table-checkbox-2" type="checkbox" value="" class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="table-checkbox-2" class="sr-only">Table checkbox</label>
                    </div>
                </td>
                <td class="px-6 py-4">
                    1
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                    Math
                </th>
                <td class="px-6 py-4">
                    Silver Lorem ipsum, dolor sit amet consectetur adipisicing elit. I
                </td>
                <td class="px-6 py-4">
                    pending
                </td>
                <td class="px-6 py-4">
                    2025-12-12
                </td>
                <td class="flex items-center px-6 py-4">
                    <a href="#" class="font-medium text-fg-brand hover:underline">Edit</a>
                    <a href="#" class="font-medium text-danger hover:underline ms-3">Remove</a>
                </td>
            </tr>
            <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="table-checkbox-3" type="checkbox" value="" class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="table-checkbox-3" class="sr-only">Table checkbox</label>
                    </div>
                </td>
                <td class="px-6 py-4">
                    2
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                    Science
                </th>
                <td class="px-6 py-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam.
                </td>
                <td class="px-6 py-4">
                    completed
                </td>
                <td class="px-6 py-4">
                    2025-12-12
                </td>
                <td class="flex items-center px-6 py-4">
                    <a href="#" class="font-medium text-fg-brand hover:underline">Edit</a>
                    <a href="#" class="font-medium text-danger hover:underline ms-3">Remove</a>
                </td>
            </tr>
            <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="table-checkbox-4" type="checkbox" value="" class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="table-checkbox-4" class="sr-only">Table checkbox</label>
                    </div>
                </td>
                <td class="px-6 py-4">
                    3
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                    english
                </th>
                <td class="px-6 py-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto explicabo quaerat harum.
                </td>
                <td class="px-6 py-4">
                    pending
                </td>
                <td class="px-6 py-4">
                    2025-12-12
                </td>
                <td class="flex items-center px-6 py-4">
                    <a href="#" class="font-medium text-fg-brand hover:underline">Edit</a>
                    <a href="#" class="font-medium text-danger hover:underline ms-3">Remove</a>
                </td>
            </tr>
            
        </tbody>
    </table>
  </div>
</div>


            </div>
          </section>
        </div>
      </div>
    </main>

    <footer class="bg-gray-900 text-gray-300 text-center py-6">
      <p>© 2025 Smart Study Planner | All Rights Reserved</p>
    </footer>
    <div
      id="taskModal"
      class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50"
    >
      <div class="bg-white rounded-xl w-full max-w-md p-6">
        <h2 class="text-xl font-semibold mb-4">Add New Task</h2>

        <form action="../backend/tasks.php" method="POST">
          <div class="space-y-2">
              <label for="taskTitle" class="text-sm font-medium"
                >Task Title *</label
              >
              <input type="text" name="task_title" id="taskTitle" required
                class="w-full px-3 py-2 rounded-lg border border-input bg-[#F7FAFF] focus:outline-none"
                placeholder="Enter task title"
              />
            </div>

            <div class="space-y-2">
              <label for="taskDescription" class="text-sm font-medium"
                >Description</label
              >
              <textarea id="taskDescription" rows="3" name="task_dis"
                class="w-full px-3 py-2 rounded-lg border border-input bg-[#F7FAFF] focus:outline-none"
                placeholder="Add task details..."
              ></textarea>
            </div>

            <div class="space-y-2">
              <label for="taskCategory" class="text-sm font-medium"
                >Category *</label
              >
              <input type="text" id="taskCategory" name="categoty"
                class="w-full px-3 py-2 rounded-lg border bg-[#F7FAFF] focus:outline-none"
                placeholder="e.g., Mathematics, Science"
              />
            </div>

            <div class="space-y-2">
              <label for="taskDueDate" class="text-sm font-medium"
                >Deadline *</label
              >
              <input type="date" id="taskDueDate" name="created_at"
                class="w-full px-3 py-2 rounded-lg border bg-[#F7FAFF] focus:outline-none"
              />
            </div>

          <div class="flex justify-end gap-3 mt-6">
            <button
              type="button"
              onclick="closeModal()"
              class="px-4 py-2 border rounded-lg"
            >
              Cancel
            </button>
            <button
              class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
              Add Task
            </button>
          </div>
        </form>
      </div>
    </div>

    <div id="editModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
  <div class="bg-white rounded-xl w-full max-w-md p-6">
    <h2 class="text-xl font-semibold mb-4">Edit Task</h2>

    <form action="../backend/update_task.php" method="POST">
      <input type="hidden" name="task_id" id="edit_id">

      <input id="edit_title" name="task_title"
        class="w-full mb-3 px-3 py-2 border rounded-lg" required>

      <textarea id="edit_description" name="task_dis"
        class="w-full mb-3 px-3 py-2 border rounded-lg"></textarea>

      <input id="edit_category" name="categoty"
        class="w-full mb-4 px-3 py-2 border rounded-lg">

      <div class="flex justify-end gap-3">
        <button type="button" onclick="closeEditModal()"
          class="px-4 py-2 border rounded-lg">Cancel</button>

        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg">
          Save
        </button>
      </div>
    </form>
  </div>
</div>

    <script>
  function openModal() {
    taskModal.classList.remove('hidden');
    taskModal.classList.add('flex');
  }
  function closeModal() {
    taskModal.classList.add('hidden');
    taskModal.classList.remove('flex');
  }

 
function openEditModal(id, title, description, category) {
  editModal.classList.remove('hidden');
  editModal.classList.add('flex');

  document.getElementById('edit_id').value = id;
  document.getElementById('edit_title').value = title;
  document.getElementById('edit_description').value = description;
  document.getElementById('edit_category').value = category;
}

function closeEditModal() {
  editModal.classList.add('hidden');
  editModal.classList.remove('flex');
}
</script>

  </body>
</html>
