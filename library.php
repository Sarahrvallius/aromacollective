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
        WHERE name LIKE :search
           OR brand LIKE :search
           OR notes LIKE :search
        ORDER BY name ASC
    ");

    // % means it can match part of a word
    $stmt->execute([
        ':search' => '%' . $search . '%'
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

<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-offwhite">
    <div class="container py-2">

        <!-- website name -->
        <a class="navbar-brand fw-semibold library-brand" href="index.php">Aroma Collective</a>

        <!-- navigation links -->
        <div class="ms-auto d-flex gap-3">
            <a class="text-decoration-none text-dark" href="#">About us</a>
            <a class="text-decoration-none text-dark fw-semibold" href="library.php">Perfumes</a>
            <a class="text-decoration-none text-dark" href="profile.php">Profile</a>
        </div>
    </div>
</nav>

<main class="bg-offwhite">
    <section class="py-5">
        <div class="container">

            <!-- title + search bar -->
            <div class="d-flex flex-column flex-lg-row align-items-lg-end justify-content-between gap-3 mb-4">
                <div>
                    <h1 class="m-0 library-title">Discover fragrances</h1>
                </div>

                <!-- search form (GET method) -->
                <form class="d-flex gap-2 library-search-form" method="GET" action="library.php">
                    <input
                        class="form-control library-search-input"
                        type="search"
                        name="search"

                        <!-- keep search text after reload -->
                        value="<?php echo htmlspecialchars($search); ?>"

                        placeholder="Search by name, brand, or notes..."
                    >
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>
            </div>
        </div>

        <!-- section where perfumes are shown -->
        <div class="library-panel">
            <div class="container">
                <div class="row g-4">

                    <?php if (count($filteredPerfumes) > 0): ?>

                        <!-- loop through all perfumes -->
                        <?php foreach ($filteredPerfumes as $perfume): ?>

                            <div class="col-6 col-md-3 col-lg-2">

                                <!-- link to single perfume page -->
                                <a
                                    href="perfumes.php?perfume=<?php echo htmlspecialchars($perfume['slug']); ?>"
                                    class="library-perfume-card d-block text-decoration-none"
                                >
                                    <img
                                        src="<?php echo htmlspecialchars($perfume['image']); ?>"

                                        <!-- image description -->
                                        alt="<?php echo htmlspecialchars($perfume['name']); ?>"

                                        class="library-perfume-image img-fluid w-100 d-block"
                                    >

                                    <!-- show perfume name -->
                                    <div class="library-perfume-name text-dark text-uppercase text-center mt-2">
                                        <?php echo htmlspecialchars($perfume['name']); ?>
                                    </div>
                                </a>
                            </div>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <!-- if nothing matches search -->
                        <div class="col-12">
                            <p class="text-center m-0">No fragrances found.</p>
                        </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="library-footer-panel mt-5">
        <div class="container d-flex justify-content-between align-items-center">

            <!-- brand name -->
            <div class="fw-semibold" style="font-family: 'Bodoni Moda', serif;">
                &copy; Aroma Collective
            </div>

            <!-- social links -->
            <div class="d-flex align-items-center gap-3">
                <span style="font-family: 'Open Sans', sans-serif;">Social media</span>

                <a href="#" class="text-dark library-social-link" aria-label="Instagram">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <a href="#" class="text-dark library-social-link" aria-label="Facebook">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>

                <a href="#" class="text-dark library-social-link" aria-label="X">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>
            </div>
        </div>
    </footer>

</main>

<?php
// includes footer
require_once 'assets/includes/footer.php';
?>
