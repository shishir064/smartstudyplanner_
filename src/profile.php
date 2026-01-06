<?php
session_start();
include '../backend/db_connect.php';

$user_id = $_SESSION['user_id'];

// Fetch user data
$sql = "SELECT username, email FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>
<?php include('open_layout.php') ?>
    <div class="flex justify-between">
      <h1 class="text-black text-4xl font-semibold  px-3 py-4 rounded-lg ">My Profile</h1>        
    </div>
    <div class=" min-h-[420px] max-h-[420px] bg-white rounded-xl shadow flex justify-center">
      <div class="w-full max-w-3xl px-6">
        <form action="../backend/edit_profile.php" method="POST" class="space-y-4">

      
         <div>
        <label class="block font-medium">Username</label>
        <input
          type="text"
          name="username"
          value="<?php echo htmlspecialchars($user['username']); ?>"
          class="w-full border rounded-lg px-4 py-2"
          required
        />
        </div>

        <div>
        <label class="block font-medium">Email</label>
        <input
          type="email"
          name="email"
          value="<?php echo htmlspecialchars($user['email']); ?>"
          class="w-full border rounded-lg px-4 py-2"
          required
        />
        </div>

        <div>
        <label class="block font-medium">New Password</label>
        <input
          type="password"
          name="password"
          placeholder="Leave blank to keep old password"
          class="w-full border rounded-lg px-4 py-2"
        />
        </div>

        <button
        type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
        Update Profile
        </button>

        </form>
      </div>
    </div>


   <?php include('close_layout.php') ?>

  </body>
</html>

