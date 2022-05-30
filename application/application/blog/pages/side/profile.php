<div class="flex-col flex-04">
    <p class="title">Last Modified</p>
    <p class="subtitle">25-05-2022</p>
</div>
<div class="flex-col flex-04">
    <p class="title">Categories</p>
    <div class="flex-row flex-04">
        <?php
        foreach (['Tag 1', 'Tag 2'] as $tag)
        {
            echo '<div class="tag">' . ucwords(str_replace('-', ' ', $tag)) . '</div>';
        }
        ?>
    </div>
</div>
<div class="flex-col flex-04">
    <p class="title">Published By</p>
    <p class="subtitle">Dean James</p>
</div>
<div class="flex-col flex-04">
    <p class="title">Links</p>
    <div class="flex-row flex-08">
        <a href="" class="fa fa-twitter"></a>
        <a href="" class="fa fa-youtube"></a>
    </div>
</div>