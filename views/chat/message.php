<div class=" msg-wrap">
        <div class="media msg ">
            <div class="media-body">
                <small class="pull-right time"><?= $this->message[0]["date"]?></small>
                <h5  class="media-heading"><?= $this->message[0]["author"]?></h5>
                <small class="col-lg-10"><?= htmlspecialchars($this->message[0]["text"])?></small>
            </div>
        </div>
</div>