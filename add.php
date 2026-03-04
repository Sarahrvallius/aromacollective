<?php
// show errors for debugging
require_once 'assets/includes/display_errors.php';
//includes database connection
require_once 'assets/config/db.php';
//register information to database
require_once 'assets/functions/insert.php';
// inkluderar header
require_once 'assets/includes/header.php';
?>

<main>
    <form action="add.php" method="post">

        <div class="row g-3 mb-3">
            <div class="col-12 col-md-6">
                <label for="firstname" class="form-label small fw-bold text-uppercase">First name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" required>
            </div>

            <div class="col-12 col-md-6">
                 <label for="lastname" class="form-label small fw-bold text-uppercase">Last name</label>
                 <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label small fw-bold text-uppercase">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label small fw-bold text-uppercase">Gender (optional)</label>
            <select class="form-select" id="gender" name="gender">
                <option selected disabled>Choose...</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="non-binary">Non-binary</option>
                <option value="other">Other</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="password" class="form-label small fw-bold text-uppercase">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
        </div>

        <button type="submit" class="btn w-100 py-3 fw-bold text-uppercase" style="background-color: #7E1A01; color: #F2F1EE; border-radius: 0;">
            Create account
        </button>
        
    </form>
</main>

<?php
require_once 'assets/includes/footer.php'; //includes footer
?>