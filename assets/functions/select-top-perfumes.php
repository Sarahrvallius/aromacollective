<?php
// Display top perfumes (highest average rating) for the index page
$sqlTopPerfumes = "
SELECT p.slug, p.name, p.image, AVG(r.rating) AS avg_rating, COUNT(r.id) AS review_count
FROM perfumes p
INNER JOIN reviews r ON r.perfume_id = p.id
GROUP BY p.id, p.slug, p.name, p.image
ORDER BY avg_rating DESC, review_count DESC
LIMIT 3
";

$stmtTopPerfumes = $dbh->query($sqlTopPerfumes);
$topPerfumes = $stmtTopPerfumes->fetchAll();
