<!-- Search Form -->
<form method="get" action="index.php" style="margin-bottom:15px;">
    <input type="hidden" name="c" value="doctor">
    <input type="hidden" name="a" value="list">

    <input
        type="text"
        name="search"
        placeholder="Search by doctor name or specialty"
        style="padding:8px;width:60%;"
        value="<?= $_GET['search'] ?? '' ?>"
    >

    <button class="btn" type="submit">Search</button>

    <!-- Back Button -->
    <a href="index.php" class="btn" style="text-decoration:none;">Back</a>
</form>

<!-- Doctor List -->
<div class="grid">

<?php if (count($doctors) == 0): ?>
    <div class="card">
        <p style="color:red;text-align:center;">
            No doctor found
        </p>
    </div>
<?php endif; ?>

<?php foreach ($doctors as $d): ?>
<div class="card">
    <h3><?= $d['name'] ?></h3>
    <p><?= $d['specialty'] ?></p>

    <a href="index.php?c=doctor&a=profile&id=<?= $d['id'] ?>" class="btn">
        Profile
    </a>

    <form method="post" action="index.php?c=doctor&a=select">
        <input type="hidden" name="name" value="<?= $d['name'] ?>">
        <input type="hidden" name="specialty" value="<?= $d['specialty'] ?>">
        <input type="hidden" name="fee" value="<?= $d['fee'] ?? '0' ?>">
        <button class="btn">Book</button>
    </form>
</div>
<?php endforeach; ?>

</div>
