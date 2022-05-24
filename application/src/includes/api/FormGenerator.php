<?php

/**
 * 
 */
class FormGenerator
{

    /**
     * 
     */
    public static function render($form, $data = null)
    {
        foreach ($form as $element)
        {
            self::renderElement($element, $data);
        }
    }

    /**
     * 
     */
    private static function renderElement($element, $data)
    {
        $lbl = isset($element['lbl']) ? $element['lbl'] : '';
        $nme = isset($element['nme']) ? $element['nme'] : '';
        $typ = isset($element['typ']) ? $element['typ'] : '';
        $cls = isset($element['cls']) ? $element['cls'] : '';
        $opt = isset($element['opt']) ? $element['opt'] : [];
        $val = isset($element['val']) ? $element['val'] : '';
        $atr = isset($element['atr']) ? $element['atr'] : '';

        $value = isset($data) ? htmlspecialchars(isset($data[$nme]) ? $data[$nme] : $val) : $val;

        echo '<div class="form-group flex-col flex-08">';

        switch ($typ)
        {
            case 'text':
            case 'password':
            case 'number':
            case 'hidden':
            case 'file':
                self::generateInput($lbl, $nme, $typ, $cls, $opt, $val, $atr, $value);
                break;
            case 'button':
                self::generateButton($lbl, $nme, $typ, $cls, $opt, $val, $atr, $value);
                break;
            case 'select':
                self::generateSelect($lbl, $nme, $typ, $cls, $opt, $val, $atr, $value);
                break;
            case 'textarea':
                self::generateTextArea($lbl, $nme, $typ, $cls, $opt, $val, $atr, $value);
                break;
            case 'tip':
                self::generateTip($lbl, $nme, $typ, $cls, $opt, $val, $atr, $value);
                break;
        }

        echo '</div>';
    }

    /**
     * 
     */
    private static function generateInput($lbl, $nme, $typ, $cls, $opt, $val, $atr, $value)
    {
        echo ''
        . '<label for="' . $nme . '">' . $lbl . '</label>'
        . '<input type="' . $typ . '" id="' . $nme . '" name="' . $nme . '" value="' . $value . '" ' . $atr . '>';
    }

    /**
     * 
     */
    private static function generateSelect($lbl, $nme, $typ, $cls, $opt, $val, $atr, $value)
    {
        echo ''
        . '<label for="' . $nme . '">' . $lbl . '</label>'
        . '<select id="' . $nme . '" name="' . $nme . '">';

        for ($i = 0; $i < count($opt); $i++)
        {
            $sel = ($value == $opt[$i]["val"] ? 'selected' : '');
            echo '<option value="' . $opt[$i]["val"] . '" ' . $sel . '>' . $opt[$i]["lbl"] . '</option>';
        }

        echo ''
        . '</select>';
    }

    /**
     * 
     */
    private static function generateTextArea($lbl, $nme, $typ, $cls, $opt, $val, $atr, $value)
    {
        echo ''
        . '<label for="' . $nme . '">' . $lbl . '</label>'
        . '<textarea id="' . $nme . '" name="' . $nme . '" class="tinymce" ' . $atr . ' rows="16">' . $value . '</textarea>';
    }

    /**
     * 
     */
    private static function generateButton($lbl, $nme, $typ, $cls, $opt, $val, $atr, $value)
    {
        echo ''
        . '<div id="submit-button" class="' . $cls . '" name="' . $nme . '" value="' . $val . '">' . $lbl . '</div>';
    }

    /**
     * 
     */
    private static function generateTip($lbl, $nme, $typ, $cls, $opt, $val, $atr, $value)
    {
        echo '<div class="tip"> ' . $lbl . '</div>';
    }

}
