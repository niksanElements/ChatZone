<div class="main">
    <link href="content/css/chat.css" rel="stylesheet">
    <div id="message-tap" class="col-lg-4 col-md-4 col-sm-4 pre-scrollable">

    </div>
    <nav class="navbar navbar-bottom col-lg-12 col-md-12 col-sm-12">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="navbar col-lg-12 col-md-12 col-sm-12" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-menu-hamburger"></span>Friends<span class="caret"></span></a>
                        <ul  id="friends"  class="dropdown-menu dropdown-cart"role="menu">

                        </ul>
                        <div id="conversation-taps" class="col-lg-12 col-md-12 col-sm-12"></div>
                    </li>
                </ul>
                <div id="send-field" class="send-wrap col-lg-12 col-md-12 col-sm-12">
                    <textarea id="send-text" class="form-control send-message col-lg-12 col-md-12 col-sm-12" rows="3" placeholder="Write a reply..."></textarea>
                </div>
                <div class="btn-panel">
                    <div id="send-btn" class=" col-lg-4 text-right btn send-message-btn pull-right" role="button">
                        <i class="fa fa-plus"></i> Send Message</div>
                </div>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
<script src="content/js/libs/require.js" data-main="content/js/chat"></script>
<script src="content/js/models/chat/tap.js" data-main="content/js/chat"></script>
 </div>