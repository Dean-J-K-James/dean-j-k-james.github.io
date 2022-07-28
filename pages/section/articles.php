<?php

#
foreach (Blog::selectAll($CONFIG->CATEGORY) as $element) { HTML::side_link('blog/' . $element->BLOG_SLUG, $element->TITLE, $element->DATE); }