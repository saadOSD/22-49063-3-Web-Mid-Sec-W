<?php if (isset($doctor['photo'])): ?>
<img src="images/<?= $doctor['photo'] ?>" width="150">
<?php endif; ?>
<h3><?= $doctor['name'] ?></h3>
<?php if (isset($doctor['specialty'])): ?>
<p><strong>Specialty:</strong> <?= $doctor['specialty'] ?></p>
<?php endif; ?>
<?php if (isset($doctor['qualification'])): ?>
<p><strong>Qualification:</strong> <?= $doctor['qualification'] ?></p>
<?php endif; ?>
<?php if (isset($doctor['experience'])): ?>
<p><strong>Experience:</strong> <?= $doctor['experience'] ?></p>
<?php endif; ?>
<a href="index.php" class="btn">Back</a>
