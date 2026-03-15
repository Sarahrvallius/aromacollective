<?php
// show errors for debugging
require_once 'assets/includes/display_errors.php';
// includes database connection
require_once 'assets/config/db.php';
// includes header
require_once 'assets/includes/header.php';

// selected perfume from the library page
$selectedPerfume = $_GET['perfume'] ?? 'woodsage';

// perfume data used on the perfume page
$perfumes = [
    'woodsage' => [
        'brand' => 'Jo Malone London',
        'name' => 'Wood Sage & Sea Salt',
        'subtitle' => 'A fresh coastal woody fragrance',
        'category' => 'Woody',
        'image' => 'Images/Jomalone1.jpg',
        'description' => 'A fresh and airy fragrance inspired by the British coast. Soft sea salt and sage create a clean, elegant and slightly windswept feeling.',
        'top' => 'Ambrette seed',
        'heart' => 'Sea salt',
        'base' => 'Sage',
        'rating' => 4,
        'reviews' => [
            [
                'user' => 'Fraglover',
                'rating' => 5,
                'text' => 'Clean, soft and elegant. It feels like fresh air and expensive linen.',
            ],
            [
                'user' => 'Emi99',
                'rating' => 4,
                'text' => 'Very pretty and easy to wear. I wish it lasted a little longer on my skin.',
            ]
        ]
    ],

    'nectarine' => [
        'brand' => 'Jo Malone London',
        'name' => 'Nectarine Blossom & Honey',
        'subtitle' => 'A juicy fruity floral scent',
        'category' => 'Fruity',
        'image' => 'Images/Jomalone2.jpg',
        'description' => 'A juicy, playful and bright fragrance with fruity sweetness and a soft honeyed warmth.',
        'top' => 'Cassis',
        'heart' => 'Acacia honey',
        'base' => 'Peach',
        'rating' => 4,
        'reviews' => [
            [
                'user' => 'LinaScent',
                'rating' => 4,
                'text' => 'Happy, cheerful and feminine. Smells like sunshine to me.'
            ],
            [
                'user' => 'AnnaM',
                'rating' => 4,
                'text' => 'Sweet but still elegant. One of the nicest fruity scents.'
            ]
        ]
    ],

    'bibliotheque' => [
        'brand' => 'Byredo',
        'name' => 'Bibliothèque',
        'subtitle' => 'A warm fruity woody fragrance',
        'category' => 'Woody',
        'image' => 'Images/byredo.jpg',
        'description' => 'Warm, soft and slightly mysterious. Inspired by old books, polished wood and velvety fruit.',
        'top' => 'Peach, plum',
        'heart' => 'Violet, peony',
        'base' => 'Leather, patchouli, vanilla',
        'rating' => 2,
        'reviews' => [
            [
                'user' => 'SensitiveNose',
                'rating' => 2,
                'text' => 'It smells like an old mans sweaty hoodie to me. I really wanted to like it but it is a nope.'
            ],
            [
                'user' => 'Nora',
                'rating' => 4,
                'text' => 'Elegant, cozy and unique. I love the soft leather in the drydown but it totally lacks lasting power.'
            ]
        ]
    ],

    'doson' => [
        'brand' => 'Diptyque',
        'name' => 'Do Son',
        'subtitle' => 'A delicate white floral fragrance',
        'category' => 'Floral',
        'image' => 'Images/dyptique.jpg',
        'description' => 'A delicate floral fragrance with airy white flowers and a very refined feel.',
        'top' => 'Orange blossom',
        'heart' => 'Tuberose',
        'base' => 'Musk',
        'rating' => 4,
        'reviews' => [
            [
                'user' => 'Maja88',
                'rating' => 4,
                'text' => 'Very chic and feminine. The tuberose is soft and beautiful.'
            ]
        ]
    ],

    'loewe001' => [
        'brand' => 'Loewe',
        'name' => 'Loewe 001',
        'subtitle' => 'A clean musky woody fragrance',
        'category' => 'Fresh',
        'image' => 'Images/Loewe (2).jpg',
        'description' => 'Minimal, clean and intimate. A soft woody scent with a modern elegance.',
        'top' => 'Citrus',
        'heart' => 'Jasmine',
        'base' => 'Musk, sandalwood',
        'rating' => 3,
        'reviews' => [
            [
                'user' => 'SoftAura',
                'rating' => 3,
                'text' => 'Understated and classy. Smells expensive without trying too hard.'
            ]
        ]
    ],

    'replica' => [
        'brand' => 'Maison Margiela',
        'name' => 'Whispers in the Library',
        'subtitle' => 'A cozy woody vanilla fragrance',
        'category' => 'Woody',
        'image' => 'Images/replica.jpg',
        'description' => 'A warm and cozy fragrance inspired by old wooden libraries and dusty books.',
        'top' => 'Pepper',
        'heart' => 'Vanilla',
        'base' => 'Cedarwood',
        'rating' => 4,
        'reviews' => [
            [
                'user' => 'Booklover',
                'rating' => 4,
                'text' => 'Smells like an old library and warm wood. Very comforting.'
            ]
        ]
    ],

    'clovetonka' => [
        'brand' => 'Le Labo',
        'name' => 'Clove Tonka 08',
        'subtitle' => 'A spicy warm amber fragrance',
        'category' => 'Spicy',
        'image' => 'Images/Clove Tonka 08.jpg',
        'description' => 'A spicy and warm fragrance with clove and tonka bean.',
        'top' => 'Clove',
        'heart' => 'Tonka bean',
        'base' => 'Amber',
        'rating' => 4,
        'reviews' => [
            [
                'user' => 'ScentFan',
                'rating' => 4,
                'text' => 'Warm and spicy, perfect for colder weather.'
            ]
        ]
    ],

    'encrenoir' => [
        'brand' => 'Lalique',
        'name' => 'Encre Noir',
        'subtitle' => 'A dark earthy vetiver fragrance',
        'category' => 'Woody',
        'image' => 'Images/Encre Noir.jpg',
        'description' => 'A dark and mysterious woody fragrance with strong vetiver.',
        'top' => 'Cypress',
        'heart' => 'Vetiver',
        'base' => 'Musk',
        'rating' => 5,
        'reviews' => [
            [
                'user' => 'DarkScent',
                'rating' => 5,
                'text' => 'Deep, woody and elegant. One of the best vetiver fragrances.'
            ]
        ]
    ],

    'pradlhomme' => [
        'brand' => 'Prada',
        'name' => "Prada L'Homme",
        'subtitle' => 'A clean elegant iris fragrance',
        'category' => 'Fresh',
        'image' => 'Images/Pradamilano.jpg',
        'description' => 'A clean and sophisticated fragrance built around iris.',
        'top' => 'Neroli',
        'heart' => 'Iris',
        'base' => 'Amber',
        'rating' => 5,
        'reviews' => [
            [
                'user' => 'ElegantMan',
                'rating' => 5,
                'text' => 'Clean, classy and extremely wearable.'
            ]
        ]
    ],

    'tiloskin' => [
        'brand' => 'Tilo',
        'name' => 'Skin 99.9%',
        'subtitle' => 'A soft intimate skin scent',
        'category' => 'Musk',
        'image' => 'Images/Tiloskin99.9.jpg',
        'description' => 'A soft skin scent designed to smell like clean warm skin.',
        'top' => 'Bergamot',
        'heart' => 'White musk',
        'base' => 'Amber',
        'rating' => 3,
        'reviews' => [
            [
                'user' => 'Minimalist',
                'rating' => 3,
                'text' => 'Very subtle and intimate scent.'
            ]
        ]
    ],

    'terrehermes' => [
        'brand' => 'Hermès',
        'name' => "Terre d'Hermès",
        'subtitle' => 'A citrus earthy masculine classic',
        'category' => 'Citrus',
        'image' => 'Images/Terre Hermes.jpg',
        'description' => 'A powerful earthy citrus fragrance.',
        'top' => 'Orange',
        'heart' => 'Pepper',
        'base' => 'Vetiver',
        'rating' => 4,
        'reviews' => [
            [
                'user' => 'ClassicGuy',
                'rating' => 4,
                'text' => 'A timeless masculine classic.'
            ]
        ]
    ],

    'physocial' => [
        'brand' => 'PHY',
        'name' => 'PHY Social',
        'subtitle' => 'A modern clean everyday fragrance',
        'category' => 'Fresh',
        'image' => 'Images/PHY social.jpg',
        'description' => 'A modern clean fragrance designed for social settings.',
        'top' => 'Citrus',
        'heart' => 'Floral notes',
        'base' => 'Musk',
        'rating' => 3,
        'reviews' => [
            [
                'user' => 'FreshVibes',
                'rating' => 3,
                'text' => 'Light, modern and easy to wear.'
            ]
        ]
    ]
];

if (!isset($perfumes[$selectedPerfume])) {
    $selectedPerfume = 'woodsage';
}

$perfume = $perfumes[$selectedPerfume];

// calculate average rating from reviews
$reviewCount = count($perfume['reviews']);
$totalRating = 0;

foreach ($perfume['reviews'] as $review) {
    $totalRating += $review['rating'];
}

$averageRating = $reviewCount > 0 ? round($totalRating / $reviewCount, 1) : 0;

// displays filled and empty stars based on rating
function renderStars($rating) {
    $output = '';

    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            $output .= '<span class="perfumes-star perfumes-star-filled">★</span>';
        } else {
            $output .= '<span class="perfumes-star">★</span>';
        }
    }

    return $output;
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
        <div class="container perfumes-page-container">
            <div class="mb-4">
                <a href="library.php" class="text-decoration-none text-dark">← Back to library</a>
            </div>

            <div class="text-center mb-4">
                <div class="perfumes-brand mb-2"><?php echo htmlspecialchars($perfume['brand'], ENT_QUOTES, 'UTF-8'); ?></div>
                <h1 class="perfumes-title mb-2"><?php echo htmlspecialchars($perfume['name'], ENT_QUOTES, 'UTF-8'); ?></h1>
                <p class="perfumes-subtitle text-muted mb-3">
                    <?php echo htmlspecialchars($perfume['subtitle'], ENT_QUOTES, 'UTF-8'); ?>
                </p>

                <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                    <span class="perfumes-category-badge px-3 py-1">
                        <?php echo htmlspecialchars($perfume['category'], ENT_QUOTES, 'UTF-8'); ?>
                    </span>
                    <span><?php echo count($perfume['reviews']); ?> reviews</span>
                </div>
            </div>

            <div class="text-center mb-4">
                <img
                    src="<?php echo htmlspecialchars($perfume['image'], ENT_QUOTES, 'UTF-8'); ?>"
                    alt="<?php echo htmlspecialchars($perfume['name'], ENT_QUOTES, 'UTF-8'); ?>"
                    class="perfumes-hero-image img-fluid"
                >
            </div>

            <div class="text-center mb-5">
                <div class="mb-2"><?php echo renderStars(round($averageRating)); ?></div>
                <div><?php echo $averageRating; ?> / 5 stars</div>
            </div>

            <div class="row justify-content-center mb-5">
                <div class="col-12 col-lg-8">
                    <div class="perfumes-info-box p-4 p-md-5">
                        <p class="mb-4">
                            <?php echo htmlspecialchars($perfume['description'], ENT_QUOTES, 'UTF-8'); ?>
                        </p>

                        <div>
                            <h2 class="h4 mb-3">Notes</h2>
                            <p class="mb-2"><strong>Top notes:</strong> <?php echo htmlspecialchars($perfume['top'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <p class="mb-2"><strong>Heart notes:</strong> <?php echo htmlspecialchars($perfume['heart'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <p class="mb-0"><strong>Base notes:</strong> <?php echo htmlspecialchars($perfume['base'], ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mb-5">
                <a href="#write-review" class="btn btn-outline-dark px-4 py-2">Write a review</a>
            </div>

            <section class="mb-5">
                <h2 class="text-center mb-4">See what people have to say about this fragrance</h2>

                <div class="row justify-content-center g-4">
                    <?php foreach ($perfume['reviews'] as $review): ?>
                        <div class="col-12 col-lg-8">
                            <div class="perfumes-review-card p-4">
                                <div class="d-flex gap-3 align-items-start">
                                    <div class="perfumes-profile-circle"></div>
                                    <div>
                                        <div class="fw-semibold mb-1">
                                            <?php echo htmlspecialchars($review['user'], ENT_QUOTES, 'UTF-8'); ?>
                                        </div>
                                        <div class="mb-2"><?php echo renderStars($review['rating']); ?></div>
                                        <p class="mb-0">
                                            <?php echo htmlspecialchars($review['text'], ENT_QUOTES, 'UTF-8'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="row justify-content-center" id="write-review">
                <div class="col-12 col-lg-8">
                    <div class="perfumes-review-form-box p-4 p-md-5">
                        <h2 class="h4 mb-4 text-center">Share your thoughts about this fragrance</h2>

                        <form>
                            <div class="mb-3">
                                <label class="form-label">Your name</label>
                                <input type="text" class="form-control" placeholder="Enter your name">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Your rating</label>
                                <select class="form-select">
                                    <option>5 stars</option>
                                    <option>4 stars</option>
                                    <option>3 stars</option>
                                    <option>2 stars</option>
                                    <option>1 star</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Your review</label>
                                <textarea class="form-control" rows="5" placeholder="Write your thoughts about this fragrance..."></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-dark px-4 py-2">Post review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>
</main>

<?php
// includes footer
require_once 'assets/includes/footer.php';
?>
