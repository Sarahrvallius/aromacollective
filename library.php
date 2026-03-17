<?php
// show errors for debugging
require_once 'assets/includes/display_errors.php';
// includes database connection
require_once 'assets/config/db.php';
// includes header
require_once 'assets/includes/header.php';

// perfume list used for the library page and search
$perfumes = [
    [
        'name' => 'Jo Malone Wood Sage & Sea Salt',
        'brand' => 'Jo Malone London',
        'notes' => 'sea salt sage woody fresh',
        'image' => 'Images/Jomalone1.jpg',
        'link' => 'perfumes.php?perfume=woodsage'
    ],
    [
        'name' => 'Jo Malone Nectarine Blossom & Honey',
        'brand' => 'Jo Malone London',
        'notes' => 'nectarine honey fruity floral',
        'image' => 'Images/Jomalone2.jpg',
        'link' => 'perfumes.php?perfume=nectarine'
    ],
    [
        'name' => 'Byredo Bibliotheque',
        'brand' => 'Byredo',
        'notes' => 'woody fruity leather',
        'image' => 'Images/byredo.jpg',
        'link' => 'perfumes.php?perfume=bibliotheque'
    ],
    [
        'name' => 'Diptyque Do Son',
        'brand' => 'Diptyque',
        'notes' => 'floral tuberose white flowers',
        'image' => 'Images/dyptique.jpg',
        'link' => 'perfumes.php?perfume=doson'
    ],
    [
        'name' => 'Loewe 001',
        'brand' => 'Loewe',
        'notes' => 'fresh musk woody',
        'image' => 'Images/Loewe (2).jpg',
        'link' => 'perfumes.php?perfume=loewe001'
    ],
    [
        'name' => 'Replica Whispers in the Library',
        'brand' => 'Maison Margiela',
        'notes' => 'woody vanilla warm',
        'image' => 'Images/replica.jpg',
        'link' => 'perfumes.php?perfume=replica'
    ],
    [
        'name' => 'Clove Tonka 08',
        'brand' => 'Le Labo',
        'notes' => 'spicy amber warm',
        'image' => 'Images/Clove Tonka 08.jpg',
        'link' => 'perfumes.php?perfume=clovetonka'
    ],
    [
        'name' => 'Encre Noir',
        'brand' => 'Lalique',
        'notes' => 'woody vetiver dark',
        'image' => 'Images/Encre Noir.jpg',
        'link' => 'perfumes.php?perfume=encrenoir'
    ],
    [
        'name' => "Prada L'Homme",
        'brand' => 'Prada',
        'notes' => 'fresh iris clean',
        'image' => 'Images/Pradamilano.jpg',
        'link' => 'perfumes.php?perfume=pradlhomme'
    ],
    [
        'name' => 'Tilo Skin 99.9%',
        'brand' => 'Tilo',
        'notes' => 'musk skin soft clean',
        'image' => 'Images/Tiloskin99.9.jpg',
        'link' => 'perfumes.php?perfume=tiloskin'
    ],
    [
        'name' => "Terre D'Hermès",
        'brand' => 'Hermès',
        'notes' => 'citrus earthy vetiver',
        'image' => 'Images/Terre Hermes.jpg',
        'link' => 'perfumes.php?perfume=terrehermes'
    ],
    [
        'name' => 'PHY Social',
        'brand' => 'PHY',
        'notes' => 'fresh clean musk',
        'image' => 'Images/PHY social.jpg',
        'link' => 'perfumes.php?perfume=physocial'
    ]
];

// gets the search input from the search bar
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// filters perfumes based on name, brand and notes
if ($search !== '') {
    $filteredPerfumes = [];

    foreach ($perfumes as $perfume) {
        $haystack = strtolower($perfume['name'] . ' ' . $perfume['brand'] . ' ' . $perfume['notes']);
        $searchTerm = strtolower($search);

        if (strpos($haystack, $searchTerm) !== false) {
            $filteredPerfumes[] = $perfume;
        }
    }
} else {
    $filteredPerfumes = $perfumes;
}
?>

<nav class="navbar navbar-expand-lg bg-offwhite">
    <div class="container py-2">
        <a class="navbar-brand fw-semibold library-brand" href="index.php">Aroma Collective</a>

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
            <div class="d-flex flex-column flex-lg-row align-items-lg-end justify-content-between gap-3 mb-4">
                <div>
                    <h1 class="m-0 library-title">Discover fragrances</h1>
                </div>

                <form class="d-flex gap-2 library-search-form" method="GET" action="library.php">
                    <input
                        class="form-control library-search-input"
                        type="search"
                        name="search"
                        value="<?php echo htmlspecialchars($search, ENT_QUOTES, 'UTF-8'); ?>"
                        placeholder="Search by name, brand, or notes..."
                    >
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>
            </div>
        </div>

        <div class="library-panel">
            <div class="container">
                <div class="row g-4">

                    <?php if (count($filteredPerfumes) > 0): ?>
                        <?php foreach ($filteredPerfumes as $perfume): ?>
                            <div class="col-6 col-md-3 col-lg-2">
                                <a
                                    href="<?php echo htmlspecialchars($perfume['link'], ENT_QUOTES, 'UTF-8'); ?>"
                                    class="library-perfume-card d-block text-decoration-none"
                                >
                                    <img
                                        src="<?php echo htmlspecialchars($perfume['image'], ENT_QUOTES, 'UTF-8'); ?>"
                                        alt="<?php echo htmlspecialchars($perfume['name'], ENT_QUOTES, 'UTF-8'); ?>"
                                        class="library-perfume-image img-fluid w-100 d-block"
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

    <footer class="library-footer-panel mt-5">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="fw-semibold" style="font-family: 'Bodoni Moda', serif;">
            &copy; Aroma Collective
        </div>

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