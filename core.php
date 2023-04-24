<?php
function buffer_start()
{
    ob_start("parse");
}

function buffer_end()
{
    ob_end_flush();
}

function parse($html)
{   
    function rewrite_host($url)
    {
        if (is_array($url))
        {
            $ret = array();
            foreach ($url as $single_url)
            {
                $ret[] = $rewrite_host($single_url);
            }
            return $ret;
        }

        if (str_starts_with($url, 'http')) {
            return "https://img.dragoncloud.win/img/" . urlencode($url) . "/optimise";
        } else {
            return $url;
        }
        
        
    }

    require_once(dirname(__FILE__) . '/simple_html_dom/simple_html_dom.php');

    $document = str_get_html($html);
    
    $img_tags = $document->find('img');
            

    foreach ($img_tags as $img)
    {
        $img->src = rewrite_host($img->src);
        if ($img->hasAttribute("data-original"))
        {
            $img->setAttribute("data-original", rewrite_host($img->getAttribute("data-original")));
        }
    }

    $html = $document->save();

    return $html;
}