<?php
use Jamilwiki\Farm\WikiRegistry;

require_once __DIR__ . '/../../farm/WikiRegistry.php';

$registry = new WikiRegistry(__DIR__ . '/../../config/wikilist.php');
$wikis = $registry->all();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jamilwiki Admin</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 0.5rem; }
        th { background: #f4f4f4; text-align: left; }
    </style>
</head>
<body>
    <h1>Jamilwiki Admin Panel</h1>
    <p>Central registry of all wikis in this Jamilwiki installation.</p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Domain</th>
                <th>Database</th>
                <th>Status</th>
                <th>Admins</th>
                <th>Skin</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($wikis as $wiki): ?>
                <tr>
                    <td><?= htmlspecialchars($wiki['id']) ?></td>
                    <td><?= htmlspecialchars($wiki['name']) ?></td>
                    <td><?= htmlspecialchars($wiki['domain']) ?></td>
                    <td><?= htmlspecialchars($wiki['db']) ?></td>
                    <td><?= htmlspecialchars($wiki['status']) ?></td>
                    <td><?= htmlspecialchars(implode(', ', $wiki['admins'])) ?></td>
                    <td><?= htmlspecialchars($wiki['skin']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
