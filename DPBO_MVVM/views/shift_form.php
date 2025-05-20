<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($shift) ? 'Edit Shift' : 'Add Shift'; ?></h2>
<form action="index.php?entity=shift&action=<?php echo isset($shift) ? 'update&id=' . $shift['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Shift Name:</label>
        <input type="text" name="shift_name" value="<?php echo isset($shift) ? $shift['shift_name'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>