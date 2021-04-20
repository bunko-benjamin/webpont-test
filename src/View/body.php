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
        <?php
            $from = count($numbers);
            if (in_array($from, $states)) {
                $limit = $steps[0];
            } else {
                $limit = $steps[1];
            }
        ?>
        <a href="/?from=1&limit=<?php echo ($from + $limit); ?>" data-from="<?php echo $from; ?>" data-limit="<?php echo $limit; ?>" id="submit"<?php if ($from >= 100) { ?> class="hidden"<?php } ?>>Load more</a>
    </div>
</div>
<script>
    var steps = <?php echo json_encode($steps); ?>;
    var states = <?php echo json_encode($states); ?>;
</script>
<script defer src="/src/js/jquery-3.5.0.min.js"></script>
<script defer src="/src/js/js.cookie.js"></script>
<script defer src="/src/js/site.js"></script>
</body>