<body>
<h3><?php echo $title; ?></h3>
<div class="container">
    <div class="grid">
        <?php foreach ($numbers as $number) { ?>
            <div class="grid-item">
                <div class="grid-inner"><?php echo $number; ?></div>
            </div>
        <?php } ?>
    </div>
    <div class="button">
        <button type="button">Load more</button>
    </div>
</div>
</body>