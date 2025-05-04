<?php
//Connect to database
include('/var/www/config/db_connect.php');
$result = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TARUMT SHOP - Campus Essentials</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Particle Background (optional) -->
    <div id="particles-js"></div>

    <?php include('header.php'); ?>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-content">
                <h1>Welcome to <span>TARUMT</span> Store!</h1>
                <p class="tagline">Your campus one-stop shop for quality and affordable essentials</p>
                <a href="#featured-products" class="cta-button">Explore Products</a>
            </div>
        </section>

        <!-- Why Shop With Us -->
        <section class="benefits">
            <div class="container">
                <h2>Why Students Love Us</h2>
                <div class="benefits-grid">
                    <div class="benefit-card">
                        <i class="fas fa-wallet"></i>
                        <h3>Student Budget Friendly</h3>
                        <p>Special discounts for TARUMT students with valid ID</p>
                    </div>
                    <div class="benefit-card">
                        <i class="fas fa-truck"></i>
                        <h3>Fast Campus Delivery</h3>
                        <p>Get orders within 24h on campus (Mon-Fri)</p>
                    </div>
                    <div class="benefit-card">
                        <i class="fas fa-shield-alt"></i>
                        <h3>Quality Guaranteed</h3>
                        <p>7-day return policy on all items</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Products -->
        <section class="featured-products" id="featured-products">
            <div class="container">
                <h2><i class="fas fa-star"></i> Featured Products</h2>
                <div class="product-grid">
                    <?php while($row = $result->fetch_assoc()): ?>
                    <div class="product-card">
                        <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['name']; ?>">
                        <h3><?php echo $row['name']; ?></h3>
                        <p class="product-description"><?php echo $row['description']; ?></p>
                        <div class="price">RM<?php echo $row['price']; ?></div>
                        <div class="product-actions">
                            <a href="product.php?id=<?php echo $row['product_id']; ?>" class="view-button">View Details</a>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="testimonials">
            <div class="container">
                <h2><i class="fas fa-quote-left"></i> Student Reviews</h2>
                <div class="testimonial-slider">
                    <div class="testimonial active">
                        <div class="rating">★★★★★</div>
                        <p>"The graduation gown was perfect quality and arrived just in time for my convocation!"</p>
                        <div class="student-info">
                            <img src="image/student1.jpg" alt="Ahmad">
                            <span>Ahmad, Computer Science</span>
                        </div>
                    </div>
                    <div class="testimonial">
                        <div class="rating">★★★★☆</div>
                        <p>"Affordable prices compared to other shops. Will recommend to my juniors!"</p>
                        <div class="student-info">
                            <img src="image/student2.jpg" alt="Mei Ling">
                            <span>Mei Ling, Business Admin</span>
                        </div>
                    </div>
                </div>
                <div class="slider-controls">
                    <button class="prev"><i class="fas fa-chevron-left"></i></button>
                    <button class="next"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </section>

        <!-- Social Media -->
        <section class="social-media">
            <div class="container">
                <h2>Connect With Us</h2>
                <div class="social-links">
                    <a href="#" class="social-link instagram"><i class="fab fa-instagram"></i> @TARUMT_Shop</a>
                    <a href="#" class="social-link whatsapp"><i class="fab fa-whatsapp"></i> +60 12-345 6789</a>
                    <a href="#" class="social-link tiktok"><i class="fab fa-tiktok"></i> Campus Unboxing</a>
                </div>
                <div class="newsletter">
                    <h3>Get Campus Deals</h3>
                    <form>
                        <input type="email" placeholder="Your TARUMT email">
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>