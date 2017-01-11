<?php foreach ($this->messages as $message): ?>
<div class=" msg-wrap">
    <div class="media msg ">
        <div class="media-body">
            <small id="date-message" class="pull-right time"><?= $message["date"]?></small>
            <h5  class="media-heading"><?= $message["userName"]?></h5>
            <small class="col-lg-10"><?= $message["text"]?></small>
        </div>
    </div>
</div>
<?php endforeach; ?>
