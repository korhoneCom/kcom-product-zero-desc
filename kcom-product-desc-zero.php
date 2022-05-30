<?php
/**
 * @package kComProductDescZero
 */
/*
Plugin Name: kCom Product Desc Zero
Plugin URI: https://korhone.com/kcom-product-zero-desc/
Description: This plugin will list products with description size of 0.
Version: 1.0.0
Author: Jani Korhonen
Author URI: https://korhone.com
License: GPLv2 or later
Text Domain: kcom-product-desc-zero
*/
/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

if(!defined('ABSPATH')){die;}

add_action('admin_menu','kcom_product_desc_zero');

function kcom_product_desc_zero()
{
        add_menu_page('kCom Product Desc Zero','kCom Product Desc Zero','manage_options','kcom-product-desc-zero','zero_desc');
}
function zero_desc()
{
$args = array(
'numberposts' => -1,
  'post_type'   => 'product'
);
        $products = get_posts($args);
        print("<h1>kCom Product Desc Zero</h1>");
        foreach($products as $product)
        {
                if(strlen($product->post_content) == 0)
                {
                        $id=$product->ID;
                        $name=$product->post_title;
                        $url=get_site_url();
                        print("Product ID/Name: <a href='{$url}/wp-admin/post.php?post={$id}&action=edit'>{$id}</a> / {$name}<br>");
                }

        }
}
