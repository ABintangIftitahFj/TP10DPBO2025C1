<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Staff List</h2>
<a href="index.php?entity=staff&action=add" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Staff</a>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Name</th>
        <th class="border p-2">Department</th>
        <th class="border p-2">Shift</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($staffList as $staff): ?>
    <tr>
        <td class="border p-2"><?php echo $staff['name']; ?></td>
        <td class="border p-2"><?php echo $staff['department_name']; ?></td>
        <td class="border p-2"><?php echo $staff['shift_name']; ?></td>
        <td class="border p-2">
            <a href="index.php?entity=staff&action=edit&id=<?php echo $staff['id']; ?>" class="text-blue-500">Edit</a>
            <a href="index.php?entity=staff&action=delete&id=<?php echo $staff['id']; ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>