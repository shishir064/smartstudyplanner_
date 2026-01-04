
<?php include '../backend/fetchtask.php'; ?>
<?php include('open_layout.php') ?>

            
          <div class="flex justify-between">
              <h1 class="text-black text-4xl font-semibold  px-3 py-4 rounded-lg ">Task List</h1>
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
                    Topic
                </th>
                <th scope="col" class="px-6  py-3 font-medium">
                    Description
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Subject
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Status
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Start Date
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    End Date
                </th>
                <th scope="col" class="px-6 py-3  font-medium">
                    Action
                </th>
                <th scope="col" class="px-6 py-3  font-medium">
                    Mark as Complete
                </th>
            </tr>
        </thead>


        <tbody>
        <?php if ($result->num_rows > 0): ?>
    <?php $sn = 1; while ($row = $result->fetch_assoc()): ?>
    <tr id="row-<?= $row['task_id']; ?>" class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">

        <!-- Checkbox -->
        <td class="w-4 p-4 text-center">
            <form action="../backend/update_status.php" method="POST">
                <input type="hidden" name="task_id" value="<?= $row['task_id']; ?>">
                <input type="checkbox" class="w-4 h-4 accent-blue-600">
            </form>
        </td>

        <!-- S.N -->
        <td class="px-6 py-4 font-medium">
            <?= $sn++; ?>
        </td>

        <!-- Topic -->
        <td class="px-6 py-4 font-semibold">
            <?= htmlspecialchars($row['title']); ?>
        </td>

        <!-- Description -->
        <td class="px-6 py-4 text-gray-600">
            <?= htmlspecialchars($row['description']); ?>
        </td>

        <!-- Subject -->
        <td class="px-6 py-4">
            <?= htmlspecialchars($row['subject'] ?? '—'); ?>
        </td>

        <!-- Status -->
        <td class="px-6 py-4">
          <span  id="status-<?= $row['task_id']; ?>" class="px-3 py-1 text-xs rounded-full
          <?= $row['status'] === 'completed'? 'bg-green-100 text-green-700': 'bg-yellow-100 text-yellow-700'; ?>">
          <?= ucfirst($row['status']); ?>
         </span>
        </td>


        <!-- Start Date -->
        <td class="px-6 py-4 text-gray-500">
            <?= $row['start_date']; ?>
        </td>

        <!-- End Date -->
        <td class="px-6 py-4 text-gray-500">
            <?= $row['end_date']; ?>
        </td>

        <!-- Actions -->
        <td class="px-6 py-4 flex gap-4">
            <button
                onclick="openEditModal(
                    <?= $row['task_id']; ?>,
                    '<?= htmlspecialchars($row['title'], ENT_QUOTES); ?>',
                    '<?= htmlspecialchars($row['description'], ENT_QUOTES); ?>'
                )"
                class="text-blue-500 hover:underline">
                Edit
            </button>

            <form action="../backend/delete_task.php" method="POST">
                <input type="hidden" name="task_id" value="<?= $row['task_id']; ?>">
                <button onclick="return confirm('Delete this task?')"
                        class="text-red-500 hover:underline">
                    Remove
                </button>
            </form>
        </td>

        <!-- Mark Complete -->
        <td class="px-6 py-4">
         <?php if ($row['status'] === 'pending'): ?>
         <button onclick="completeTask(<?= $row['task_id']; ?>)" class="text-green-600 hover:underline font-medium">
         Mark as Complete
         </button>
         <?php else: ?>-
         <?php endif; ?>
        </td>


    </tr>
    <?php endwhile; ?>
<?php else: ?>
    <tr>
        <td colspan="10" class="text-center py-10 text-gray-500">
            No tasks found. Add your first task.
        </td>
    </tr>
<?php endif; ?>
</tbody>


    </table>
  </div>
</div>


     <?php include('close_layout.php') ?>

    <div id="taskModal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50">
      <div class="bg-white rounded-xl w-full max-w-md p-6">
        <h2 class="text-xl font-semibold mb-4">Add New Task</h2>

        <form action="../backend/tasks.php" method="POST">
          <div class="space-y-2">
              <label for="taskTitle" class="text-sm font-medium">Topic *</label>
              <input type="text" name="topic" id="taskTitle" required class="w-full px-3 py-2 rounded-lg border border-input bg-[#F7FAFF] focus:outline-none" placeholder="Enter task title"/>
            </div>

            <div class="space-y-2">
              <label for="taskDescription" class="text-sm font-medium">Description</label>
              <textarea id="taskDescription" rows="3" name="task_des"
                class="w-full px-3 py-2 rounded-lg border border-input bg-[#F7FAFF] focus:outline-none"
                placeholder="Add task details..."
              ></textarea>
            </div>

            <div class="space-y-2">
              <label for="taskSubject" class="text-sm font-medium">Subject *</label>
              <input type="text" id="taskSubject" name="subject" class="w-full px-3 py-2 rounded-lg border bg-[#F7FAFF] focus:outline-none" placeholder="e.g., Mathematics, Science"/>
            </div>

            <div class="space-y-2">
              <label for="taskDueDate" class="text-sm font-medium" >Start Date *</label>
              <input type="date" id="taskDueDate" name="start_date" class="w-full px-3 py-2 rounded-lg border bg-[#F7FAFF] focus:outline-none"/>
            </div>
            <div class="space-y-2">
              <label for="taskDueDate" class="text-sm font-medium" >End Date *</label>
              <input type="date" id="taskDueDate" name="end_date" class="w-full px-3 py-2 rounded-lg border bg-[#F7FAFF] focus:outline-none"/>
            </div>

          <div class="flex justify-end gap-3 mt-6">
            <button type="button" onclick="closeModal()" class="px-4 py-2 border rounded-lg">
              Cancel
            </button>
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
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

      Topic *<input id="edit_title" name="task_title" placeholder="Edit your topic" 
        class="w-full mb-3 px-3 py-2 border rounded-lg bg-[#F7FAFF]" required>

      Description *<textarea id="edit_description" name="task_dis" placeholder="Edit your details"
        class="w-full mb-3 px-3 py-2 border rounded-lg bg-[#F7FAFF]"></textarea>

      Subject *<input id="edit_category" name="categoty" placeholder="Edit your subject"
        class="w-full mb-4 px-3 py-2 border rounded-lg bg-[#F7FAFF]">

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

  <script src="script.js"></script>

  <script>
    function completeTask(task_id) {
    fetch('../backend/complete_task.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'task_id=' + task_id
    })
    .then(res => res.text())
    .then(() => {
        // Update status badge
        const status = document.getElementById('status-' + task_id);
        if (status) {
            status.textContent = 'Completed';
            status.className =
              'px-3 py-1 text-xs rounded-full bg-green-100 text-green-700';
        }

        // Remove row after 2 seconds
        setTimeout(() => {
            const row = document.getElementById('row-' + task_id);
            if (row) row.remove();
        }, 2000);
    });
}
  </script>

  </body>
</html>
