<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Shift List</h2>
<a href="index.php?entity=shift&action=add" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Shift</a>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Shift Name</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($shiftList as $shift): ?>
    <tr>
        <td class="border p-2"><?php echo $shift['shift_name']; ?></td>
        <td class="border p-2">
            <a href="index.php?entity=shift&action=edit&id=<?php echo $shift['id']; ?>" class="text-blue-500">Edit</a>
            <a href="index.php?entity=shift&action=delete&id=<?php echo $shift['id']; ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>