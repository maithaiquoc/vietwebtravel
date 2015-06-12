<?php error_reporting(0) ?>
<?php if($num_links > 0){ ?>
<ul class="pagination" id="list">
    <li><a href="#" id="prev" onclick="prev();">&laquo;</a></li> <!-- dau << -->
    <?php for($i = 1; $i <= ceil($num_links); $i++){ ?>
        <li <?php if($i == 1) echo "class='active'" ?> ><a href="#" id="<?php echo $i ?>" onclick="$(this.parentNode).prevAll().removeClass('active'); $(this.parentNode).nextAll().removeClass('active'); $(this.parentNode).addClass('active'); getTableAdsManager('<?php echo $i ?>');"><?php echo $i ?></a></li> <!-- them 1 lop vao parent, xoa tat ca cac lop truoc do va sau do -->
    <?php } ?>
    <li><a href="#" id="next" onclick="next();">&raquo;</a></li> <!-- dau >> -->
</ul>
<?php } ?>