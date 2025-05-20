<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($staff) ? 'Edit Staff' : 'Add Staff'; ?></h2>
<form action="index.php?entity=staff&action=<?php echo isset($staff) ? 'update&id=' . $staff['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Name:</label>
        <input type="text" name="name" value="<?php echo isset($staff) ? $staff['name'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Department:</label>
        <select name="department_id" class="border p-2 w-full" required>
            <?php foreach ($departments as $dept): ?>
            <option value="<?php echo $dept['id']; ?>" <?php echo isset($staff) && $staff['department_id'] == $dept['id'] ? 'selected' : ''; ?>><?php echo $dept['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label class="block">Shift:</label>
        <select name="shift_id" class="border p-2 w-full" required>
            <?php foreach ($shifts as $shift): ?>
            <option value="<?php echo $shift['id']; ?>" <?php echo isset($staff) && $staff['shift_id'] == $shift['id'] ? 'selected' : ''; ?>><?php echo $shift['shift_name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>