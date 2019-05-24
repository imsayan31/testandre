<?php
/*
Plugin Name: Category Parent Children Selector
Plugin URI: http://wordpress.org/extend/plugins/category-parent-children-selector/
Description: Helps you in selecting parent-children categories.  
Version: 1.0.0
Author: WenZe Leong
Author URI: http://www.refinesolutions.com
Licence: GPL
*/

function category_parent_children_selector() {
    $taxonomies = apply_filters('category_parent_children_selector',array());
    for($x=0; $x < count($taxonomies); $x++) {
        $taxonomies[$x] = '#' . $taxonomies[$x] . 'div .selectit input';
    }
    $selector = implode(',', $taxonomies);
    if($selector == '') $selector = '.selectit input';
    $input_top_1 = '&nbsp;<input type=\"button\" value=\"First Level\" onclick=\"checkTopChildrenNodes(this, 1);\" />';
    $input_top_all = '&nbsp;<input type=\"button\" value=\"All\" onclick=\"checkTopChildrenNodes(this, 0);\" />';
    $input_1 = '&nbsp;<input type=\"button\" value=\"First Level\" onclick=\"checkChildrenNodes(this, 1);\" />';
    $input_all = '&nbsp;<input type=\"button\" value=\"All\" onclick=\"checkChildrenNodes(this, 0);\" />';

	echo '
		<script>
        //Add select buttons to all parents
        jQuery(document).ready(function() {
            jQuery("' . $selector . '").each(function() {
                var $lbl = jQuery(this).parent(".selectit");
                $parent_ul = $lbl.parent().parent();
                if(!$parent_ul.hasClass("topSelector")
                   && !$parent_ul.siblings(".selectit").children("input").length) {
                    $parent_ul.prepend("' . $input_top_all . '")
                              .addClass("topSelector");
                    if($parent_ul.children("li").children(".children").children("li").children(".selectit").children("input").length) {
                        $parent_ul.prepend("' . $input_top_1 . '");
                    }
                }
                if($lbl.siblings(".children").length) {
                    $lbl.after("' . $input_all . '");
                    if($lbl.siblings(".children").children("li").children(".children").children("li").children(".selectit").children("input").length) {
                        $lbl.after("' . $input_1 . '");
                    }
                }
            });
        });
        function checkChildrenNodes(obj, lvl) {
            var checkAll = true;
            var $obj = jQuery(obj);
            //Check all parent & children checkboxes are checked
            var $checkbox = $obj.siblings(".selectit").find("input");
            checkAll = checkAll && $checkbox.is(":checked");
            var $selector = getSelectorLevel($obj, lvl);
            $selector.each(function() {
                checkAll = checkAll && jQuery(this).is(":checked");
            });
            //Apply check/uncheck to parent & children checkboxes
            var finalCheck = checkAll? false : true;
            $checkbox.prop("checked", finalCheck);
            $selector.each(function() {
                jQuery(this).prop("checked", finalCheck);
            });
        }
        function checkTopChildrenNodes(obj, lvl) {
            var checkAll = true;
            var $obj = jQuery(obj);
            //Check all parent & children checkboxes are checked
            var $selector = getTopSelectorLevel($obj, lvl);
            $selector.each(function() {
                checkAll = checkAll && jQuery(this).is(":checked");
            });
            //Apply check/uncheck to parent & children checkboxes
            var finalCheck = checkAll? false : true;
            $selector.each(function() {
                jQuery(this).prop("checked", finalCheck);
            });
        }
        jQuery("' . $selector . '").change(function() {
            var $obj = jQuery(this);
            checkParentNodes($obj, $obj.is(":checked"));
        });
        function checkParentNodes($obj, checkState) {
            $parent = $obj.parent().parent().parent().siblings(".selectit").children("input");
            if($parent.length) {
                var anyCheck = false;
                $selector = getSelectorLevel($parent.parent(), 0);
                $selector.each(function() {
                    anyCheck = anyCheck || jQuery(this).is(":checked");
                });
                $parent.prop("checked", anyCheck);
                checkParentNodes($parent, checkState);
            }
        }
        function getSelectorLevel($obj, lvl) {             
            if(lvl == 1) { //next level children only
                return $obj.parent().children(".children").children("li").children(".selectit").children("input");
            } else { //all level children
                return jQuery("#" + $obj.parent().attr("id") + " .children li .selectit input");
            }
        }
        function getTopSelectorLevel($obj, lvl) {
            if(lvl == 1) {
                return $obj.parent().children("li").children(".selectit").children("input");
            } else {
                return jQuery("#" + $obj.parent().attr("id") + " li .selectit input");
            }
        }
        </script>
    ';
}
add_action('admin_footer', 'category_parent_children_selector');
?>
