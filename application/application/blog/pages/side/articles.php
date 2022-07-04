<?php

#
foreach (Definitions::selectDB($data['category']) as $element) { HTML::side_link('blog/' . $element['slug'], $element['name'], $element['date']); }