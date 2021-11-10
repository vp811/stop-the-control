<?php  if(is_page()){
  dynamic_sidebar('sidebar');
}elseif(is_archive()){
  dynamic_sidebar('archive-sidebar');
} ?>
