<main class="main">
            <div class="senten" id="sentence">
        <?php if(count($items) > 0): ?>
                <?php for($i = 0; $i < count($items)-1; $i++): ?>
                    
                    <?php if($items['quiz'] == $items[$i]):?>
                        <a class="word inactive" id="empty" href="#"></a>
                    <?php else:?>
                        <a class="word" href="#" id="id<?=$i+1?>"><?=$items[$i]?></a>
                    <?php endif;?>
                <?php endfor;?>
            </div>

            <div class="options" id="options">
                <?php for($i = 0; $i < count($options); $i++):?>
                    <a class="option" href="#" id="<?=$i?>" onclick="getMe(this);"><?=$options[$i]?></a>
                <?php endfor;?>
            </div>

            <div class="actions" id="actions">
                <button onclick="check(<?=$addon?>);">проверить</button>
                <button onclick="reset();">Сбросить</button>
            </div>

        <?php else: ?>
            <p class="red">requested task has not been found!</p>
        <?php endif;?>
        <div class="stats" id="stats">
        	
        	<h3>Stats for a gamer!</h3>
        	
        	
        	
        </div>
</main>