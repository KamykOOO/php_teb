<div>
    <div class="message">
        <?php
        if (!empty($params['before'])) {
            switch ($params['before']) {
                case 'created':
                    echo "Notatka została utworzona";
                    break;
            }
        }
        ?>
    </div>
    <b><?php
        echo $params['resulyList'] ?? "";
        ?></b>
</div>