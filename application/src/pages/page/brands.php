<?php

#
foreach (Brand::selectAllDB() as $b) { HTML::card_two_column('https://via.placeholder.com/256', $b['name'], $b['description'], json_decode($b['tags'], true), $b['homepage']); }