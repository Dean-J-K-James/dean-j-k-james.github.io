<?php

$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';

foreach (Definitions::selectDB($name) as $definition)
{
    HTML::card_two_column(
            APPPATH . '/assets/contents/' . $definition['slug'] . '/thumbnail.png',
            $definition['name'],
            $definition['description'],
            'Last Updated: ' . $definition['date'],
            [],
            "blog/" . $definition['slug']);
}