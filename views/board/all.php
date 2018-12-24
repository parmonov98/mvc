

<main class="main">

    <div class="sentences">
        <?php for($i = 0; $i < count($items); $i++): ?>
            <div class="sentence" id="sentence">
                <div class="cell id"><?=$i+1?></div>
                <div class="cell content"><?=$items[$i]['content']?></div>
                <div class="cell content"><?=$items[$i]['quiz']?></div>
                <div class="cell content"><a href="/?page=board&id=<?=$items[$i]['id']?>">Open</a></div>
            </div>
        <?php endfor;?>
    </div>

            
    
</main>