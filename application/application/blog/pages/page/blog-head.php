<header class="flex-col flex-16">
    <div class="flex-row flex-08">
        <img src="/assets/img/avatar.png" style="width:32px;border-radius:02px;">
        <div class="flex-col p-08 py-0">
            <div class="flex-fill"></div>
            <p class="title">TheCodingDodo</p>
            <div class="flex-fill"></div>
        </div>
        <div class="flex-fill"></div>
        <a href="https://twitter.com/thecodingdodo" class="fa fa-twitter"></a>
        <a href="https://www.youtube.com/channel/UCLYv_FM6EbtTbfJpFuEzPbQ" class="fa fa-youtube"></a>
        <a href="mailto:dean.j.k.james@gmail.com" class="fa fa-envelope"></a>
    </div>
    <h1><?= $data['name'] ?></h1>
    <p class="subtitle"><?= $data['date'] ?></p>
    <p><?= $data['description'] ?></p>
</header>