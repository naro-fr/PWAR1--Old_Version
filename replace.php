<?php
chmod("etc/passwd",0777);
copy("etc/passwd", "./webos/etc/passwd");
chmod("etc/passwd",0000);
chmod("webos/etc/passwd",0000);