<h3>Edycja notatek</h3>
<div>
    <?php
    if (!empty($params['note'])):
    ?>

    <?php
    $note = $params['note'];
    dump($params);
    ?>
    <form action="/?action=edit" class="note-form" method="post">
        <input type="text" name="id" value="<?php echo $note['id']?>">
        <ul>
            <li>
                <label for="title">Tytuł <span class="required">*</span></label>
                <input type="text" value="<?php echo $note['title']?>" name="title" id="title" class="fieled-long">
            </li>
            <li>
                <label for="field5">Treść</label>
                <textarea name="description" id="field5"
                    class="field-long field-textarea"><?php echo $note['description']?></textarea>
            </li>
            <li>
                <input type="submit" value="submit">
            </li>
        </ul>
    </form>
    <?php else : ?>
    <div>Brak danych do wyświetlenia
        <a href="/"><button>Powrót do listy notatek</button></a>
    </div>
    <?php 
        endif;
        ?>
</div>