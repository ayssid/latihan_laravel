<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/*
 * Register custom macros
 */

/*
 * Macro untuk divider
 * @return string html
 */
HTML::macro('divider', function(){
   return '<hr class="uk-article-divider">'; 
});

/*
 * Macro for uikit label
 * @return string html
 */
Form::macro('labelUk', function($name, $placeholder){
    return Form::label($name, $placeholder, array('class' => 'uk-form-label'));
});

/*
 * Macro for UIKIT text
 * @return string html
 */
Form::macro('textUk', function($name, $placeholder = null, $icon = null){
    $html='';
    if($icon)
    {
        $html .= '<div class="uk-form-icon"> <i class="'.$icon.'"></i>';
    }
    else
    {
        $html .= '<div class="uk-form-controls">';
    }
    
    $html .= Form::text($name, NULL, array('placeholder' => $placeholder));
    $html .= '</div>';
    return $html;
});

/*
 * Macro untuk menampilkan tombol submit
 * @return string html
 */

Form::macro('submitUk', function($title){
    return '<input type="submit" value="'.$title.'" class="uk-button uk-button-primary"> ';
});

/*
 * Macro untuk membuat tombol tambah
 * @param $path string url to route (if any)
 * @return string generate anchor
 */
Html::macro('buttonAdd', function ($path = null){
    if($path)
    {
        $url = $path;
    }
    else
    {
        $url = explode('.', Route::currentRouteName());
        array_pop($url);
        array_push($url, 'create');
        $url = implode('.', $url);
        $url = route($url);
    }
    
    return '<a class="uk-button uk-button-primary" href="'.$url.'">Tambah</a>';
});