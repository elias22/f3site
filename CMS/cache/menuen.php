<?php function newnav($MenuID) { global $cfg,$lang,$db,$user; if($MenuID==1) {?><div class="mh">Menu</div><div class="menu"><ul><li><a href="index.php">Main page</a></li><li><a href="?co=archive">The newest</a></li><li><a href="?co=cats&amp;id=4">Recommended sites</a></li><li><a href="?co=cats&amp;id=3">Photo gallery</a></li><li><a href="?co=users">Community</a></li><li><a href="?co=groups">User groups</a></li></ul></div><div class="mh">Statistics</div><div class="menu"><?php include './mod/panels/online.php'?></div><?php } else {?><div class="mh">Your account</div><div class="menu"><?php include './mod/panels/user.php'?></div><div class="mh">Poll</div><div class="menu"><?php include './mod/panels/poll.php'?></div><div class="mh">New content</div><div class="menu"><?php include './mod/panels/new.php'?></div><?php } } ?>