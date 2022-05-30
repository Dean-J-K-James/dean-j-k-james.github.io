<?php

#Gets the form data for the page being processed.
$form = Form::selectDB($_POST['page']);

#If the data id is 0, insert as a new record, otherwise update existing.
$data = ($_POST['id'] == 0) 
        ? $form['class']::insertDB($_POST) 
        : $form['class']::updateDB($_POST);

#
foreach (json_decode($form['post-process'], true) as $file)
{
    require 'contents/' . $file . '.php';
}