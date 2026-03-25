<?php
// show errors for debugging
require_once 'assets/includes/display_errors.php';
// includes database connection
require_once 'assets/config/db.php';
// includes header
require_once 'assets/includes/header.php';

// gets the search input from the search bar
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// if user typed something - filter results
if ($search !== '') {
    // search in database (name brand notes)
    $stmt = $dbh->prepare("
        SELECT *
        FROM perfumes
        WHERE name LIKE :search_name
           OR brand LIKE :search_brand
           OR notes LIKE :search_notes
        ORDER BY name ASC
    ");
    // % means it can match part of a word
    $stmt->execute([
        ':search_name' => '%' . $search . '%',
        ':search_brand' => '%' . $search . '%',
        ':search_notes' => '%' . $search . '%'
    ]);
} else {
    // if no search - show all perfumes
    $stmt = $dbh->query("
        SELECT *
        FROM perfumes
        ORDER BY name ASC
    ");
}

// get the results from database
$filteredPerfumes = $stmt->fetchAll();
?>

<!-- title + search bar -->
<main class="bg-offwhite">
    <section class="pt-5">
        <div class="container">
            <div class="row align-items-center g-3 mb-4">
                <div class="col">
                    <h1 class="m-0 text-nowrap">Discover fragrances</h1>
                </div>

                <div class="col-12 col-lg-4">
                    <!-- search form (GET method) -->
                    <form class="d-flex gap-2 mt-3" method="GET" action="library.php">
                        <input
                            class="form-control"
                            type="search"
                            name="search"
                            value="<?php echo $search; ?>"
                            placeholder="Search by name, brand, or notes...">
                        <button class="btn btn-outline-dark" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- section where perfumes are shown -->
        <div class="bg-gray py-5">
            <div class="container">
                <div class="row g-3">
                    <?php if (count($filteredPerfumes) > 0): ?>
                        <!-- loop through all perfumes -->
                        <?php foreach ($filteredPerfumes as $perfume): ?>
                            <div class="col-6 col-md-3 col-lg-2">
                                <!-- link to single perfume page -->
                                <a
                                    href="perfumes.php?perfume=<?php echo $perfume['slug']; ?>"
                                    class="perfume-card d-block text-decoration-none">
                                    <img
                                        src="<?php echo $perfume['image']; ?>"
                                        alt="<?php echo $perfume['name']; ?>"
                                        class="perfume-image img-fluid w-100 d-block">
                                    <!-- show perfume name -->
                                    <div class="library-perfume-name text-dark text-uppercase text-center mt-2">
                                        <?php echo $perfume['name']; ?>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                        <!-- if nothing matches search -->
                    <?php else: ?>
                        <div class="col-12">
                            <p class="text-center m-0">No fragrances found.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Perfume pages navigation -->
        <section class="bg-gray">
            <div class="container pb-4 pt-3">
                <h2 class="visually-hidden">Pagination for perfume list</h2>
                <div class="d-flex justify-content-center gap-2">
                    <a href="#"><i class="fa-solid fa-angle-left fs-5 text-body-tertiary"></i></a>
                    <a href="#" class="text-dark small fw-bold text-decoration-none">1</a>
                    <a href="#" class="text-dark small text-decoration-none">2</a>
                    <a href="#" class="text-dark small text-decoration-none">3</a>
                    <p class="text-dark small">...</p>
                    <a href="#" class="text-dark small text-decoration-none">46</a>
                    <a href="#"><i class="fa-solid fa-angle-right fs-5 text-dark"></i></a>
                </div>
            </div>
        </section>
    </section>
</main>

<?php
// includes footer
require_once 'assets/includes/footer.php';
?>
