<?php
/**
 * Page Template for UPWIECON 2026
 * This file serves as a starting point for new pages to ensure 
 * consistent styling and structure.
 */

// 1. Include the global header
include 'header.php';
?>

<!-- 2. Page Hero Section -->
<section class="committee-hero">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold mb-3">
                    <i class="fas fa-star me-2"></i>
                    PAGE TITLE
                </h1>
            </div>
        </div>
    </div>
</section>

<!-- 3. Main Content Section -->
<main class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Add your page-specific content here -->
                <div class="card shadow-sm rounded-4 p-4 p-md-5">
                    <h2 class="h3 fw-bold mb-4">Section Heading</h2>
                    <p>Start building your page content here. This template ensures that you have the correct header,
                        footer, and theme-consistent styling already in place.</p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
// 4. Include the subfooter (Venue & Important Dates)
include 'subFooter.php';

// 5. Include the global footer
include 'footer.php';
?>