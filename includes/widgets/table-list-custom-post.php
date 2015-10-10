<?php

class FlexiCustomPostTableList
{
    // property declaration
    private $post_type = 'itech_portfolio';
    private $tag_type;
    private $step_num;
    // Pagination: How many items in a single page to list
    private $show_num;
    private $page;
    private $table_id;
    
    // method declaration
    public function __construct($step_num, $post_name, $show_num = 100, $page = 1, $table_id, $tag_type = 'waving_portfolio_tag') {
      $this->step_num = $step_num;
      $this->post_name = $post_name;
      $this->show_num = $show_num;
      $this->page = $page;
      $this->tag_type = $tag_type;
      $this->table_id = $table_id;
    }
    
    public function BuildTable()
    {
      $taxonomies = array( 
          $this->tag_type
      );

      $tag_array = get_terms($taxonomies);
      ?>

      <fieldset>
        <legend><strong>(Step <?php echo $this->step_num; ?>)</strong>:Choose source of the mixed Portfolio:</legend>
        <div> 

          <div>  
            <h4>Select multiple <?php echo ucfirst($this->post_name); ?> sources</h4>
          </div>

          <table id="<?php echo $this->table_id; ?>" class="display compact" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th><input type="checkbox" name="all_posts" class="all_posts" value="true" >All</th>
                <th>Tags</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Tags</th>
              </tr>
            </tfoot>
            <tbody id="the-list" >
            <?php
              foreach($tag_array as $tag) {
            ?>
                  <tr>
                    <td><?php echo '<input type="checkbox" class="tags" name="post_ids[]" value="'.$tag->name.'" />' ?></td>
                    <td><?php echo ucfirst( $tag->name); ?></td>
                    
                  </tr>
              <!-- LOOP: Usual Post Template Stuff Here-->

            <?php } ?>
                </tbody>
              </table>
            </div>
          </fieldset>

      <nav>
      <?php previous_posts_link('&laquo; Newer') ?>
      <?php next_posts_link('Older &raquo;') ?>
      </nav>

      <?php 
        $wp_query = null; 
    }
    
}

?>