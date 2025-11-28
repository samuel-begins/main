<!--НИЖНЯЯ часть сайта-->

<?php
require 'includes/db.php';

// Загружаем последние отзывы
$stmt = $pdo->query("SELECT * FROM reviews ORDER BY id DESC LIMIT 10");
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
footer {
    margin-top: 100px;
    padding: 20px;
    background: brown;
}

.slider-container {
    position: relative;
    width: 350px;
    margin: 0 auto;
}

.review-slide {
    display: none;
    background: white;
    padding: 15px;
    border-radius: 12px;
    box-shadow: 0 0 10px #ccc;
}

.review-slide.active {
    display: block;
}

.slider-buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}

.slider-btn {
    background: #ff66a3;
    border: none;
    padding: 8px 12px;
    border-radius: 7px;
    cursor: pointer;
    color: white;
    font-size: 16px;
    transition: 0.3s;
}

.slider-btn:hover {
    background: #ff3d8b;
}
</style>

<footer>
    <h3>Отзывы клиентов:</h3>

    <div class="slider-container">

        <?php foreach ($reviews as $index => $r): ?>
            <div class="review-slide <?= $index === 0 ? 'active' : '' ?>">
                <strong><?= htmlspecialchars($r['username']) ?></strong>
                <p><?= htmlspecialchars($r['review']) ?></p>
                <small><?= $r['created_at'] ?></small>
            </div>
        <?php endforeach; ?>

        <div class="slider-buttons">
            <button class="slider-btn" id="prevBtn">❮</button>
            <button class="slider-btn" id="nextBtn">❯</button>
        </div>

    </div>

</footer>

<script>
let slides = document.querySelectorAll(".review-slide");
let index = 0;

document.getElementById("prevBtn").onclick = () => {
    slides[index].classList.remove("active");
    index = (index - 1 + slides.length) % slides.length;
    slides[index].classList.add("active");
};

document.getElementById("nextBtn").onclick = () => {
    slides[index].classList.remove("active");
    index = (index + 1) % slides.length;
    slides[index].classList.add("active");
};
</script>
