<?php
// show errors for debugging
require_once 'assets/includes/display_errors.php';
// includes database connection
require_once 'assets/config/db.php';
// includes header
require_once 'assets/includes/header.php';

// gets the search input from the search bar
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

if ($search !== '') {
    $stmt = $dbh->prepare("
        SELECT *
        FROM perfumes
        WHERE name LIKE :search
           OR brand LIKE :search
           OR notes LIKE :search
        ORDER BY name ASC
    ");
    $stmt->execute([
        ':search' => '%' . $search . '%'
    ]);
} else {
    $stmt = $dbh->query("
        SELECT *
        FROM perfumes
        ORDER BY name ASC
    ");
}

$filteredPerfumes = $stmt->fetchAll();
?>

<main class="bg-offwhite">
    <section class="pt-5">
        <div class="container">
            <div class="row align-items-center g-3 mb-4">
                <div class="col">
                    <h1 class="m-0 text-nowrap">Discover fragrances</h1>
                </div>

                <div class="col-12 col-lg-4">
                    <form class="d-flex gap-2 mt-3" method="GET" action="library.php">
                    <input
                        class="form-control"
                        type="search"
                        name="search"
                        value="<?php echo htmlspecialchars($search, ENT_QUOTES, 'UTF-8'); ?>"
                        placeholder="Search by name, brand, or notes..."
                    >
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="bg-gray py-5">
            <div class="container">
                <div class="row g-4">

                    <?php if (count($filteredPerfumes) > 0): ?>
                        <?php foreach ($filteredPerfumes as $perfume): ?>
                            <div class="col-6 col-md-3 col-lg-2 mb-5">
                                <a
                                    href="perfumes.php?perfume=<?php echo htmlspecialchars($perfume['slug'], ENT_QUOTES, 'UTF-8'); ?>"
                                    class="perfume-card d-block text-decoration-none"
                                >
                                    <img
                                        src="<?php echo htmlspecialchars($perfume['image'], ENT_QUOTES, 'UTF-8'); ?>"
                                        alt="<?php echo htmlspecialchars($perfume['name'], ENT_QUOTES, 'UTF-8'); ?>"
                                        class="perfume-image img-fluid w-100 d-block"
                                    >
                                    <div class="library-perfume-name text-dark text-uppercase text-center mt-2">
                                        <?php echo htmlspecialchars($perfume['name'], ENT_QUOTES, 'UTF-8'); ?>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <p class="text-center m-0">No fragrances found.</p>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>
</main>

<?php
// includes footer
require_once 'assets/includes/footer.php';
?>