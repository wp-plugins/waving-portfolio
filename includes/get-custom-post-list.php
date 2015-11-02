<?php 

  // Include wp-load
  $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
  require_once( $parse_uri[0] . 'wp-load.php' );
  
  require 'widgets/table-list-custom-post.php';
  
  // Gallery effects
  $themes = array(
      'dark'=>'Dark Theme',
      'light'=>'Light Theme'
  );
?>

<html>
<head>
  
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  
  <style>
    body{
      font-family: 'Roboto', sans-serif;
      font-size:12px;
    }
    table, td, tr
    {
      font-size:small;
      text-align:center;
    }
    select
    {
      margin: 10;
      padding: 10;
      font-family: inherit;
    }
    button
    {
      padding: 10;
      margin: 5px;
      font-family: 'Roboto';
    }
  </style>
</head>
<body>
  <form>


    <fieldset>
        <legend><strong>(Step 1)</strong>:Customize portfolio</legend>
          <label><strong>Select the theme: </strong></label>
          <select id="closify-effect">
            <?php 
              foreach($themes as $key=>$effect)
              {
                echo '<option value="'.$key.'">'.$effect.'</option>';
              }
            ?>
          </select>
          <br>
          <label><strong>Dimension control: </strong></label>
          <input style="width:80px;padding:10;margin:10" id="waving_width" step="10" size="6" type="number" placeholder="Width" />
          <input style="width:80px;padding:10;margin:10" id="waving_height" step="10" size="6" type="number"  placeholder="Height"/>
          <br><br>
          <label><strong>Show all categories button: </strong></label>
          <input type="checkbox" id="show_all_btn"> Show all button
          <br><br>
          <label><strong>Show category button: </strong></label>
          <input type="checkbox" id="show_cat_btn"> Show categories
          <br><br>
          <label><strong>Disable hyper-links: </strong></label>
          <input type="checkbox" id="disable_click"> Disable hyperlinks
    </fieldset>
    <br><br>
    <?php
    
    // Print posts table
      $table_id1 = "wavingPostTable";
      $post_table = new FlexiCustomPostTableList('2', 'Waving Portfolio', 100, 1, $table_id1);
      $post_table->BuildTable();
    ?>
    
    <button onclick="insert()">Insert</button>
  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script type="text/javascript" src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#<?php echo $table_id1;?>').DataTable();
        
        $('input[type="checkbox"]').click(function(el){
          console.log(el.toElement.className);
            if($('.all_posts').is(":checked")){
                $('.tags').prop('checked', true);
            }
            else if(el.toElement.className == 'all_posts'){
              
                $('.tags').prop('checked', false);
            }
            
        });
        
    });
    
    function insert()
    {
      shortCodeOpen = '[waving ';
      postTags = 'tags="';
      theme = 'theme="';
      width = 'width="';
      height = 'height="';
      showCat = 'showCat="';
      clicking = 'clicking="';
      all_attr = 'all="';
      
      // Parse waving width
      if($( "#waving_width" ).val() != "")
        width = width+ $( "#waving_width" ).val() + '" ';
      else
        width="";
        
      // Parse waving height
      if($( "#waving_height" ).val()!="")
        height = height+ $( "#waving_height" ).val() + '" ';
      else
        height = ""
        
      // Parse 
      if($('#show_all_btn')[0].checked){
        showCat = showCat + 'true" ';
      }else{
        showCat = showCat + 'false" ';
      }
      
      // Parse 
      if($('#disable_click')[0].checked)
      {
        clicking = clicking + 'false" ';
      }else{
        clicking = clicking + 'true" ';
      }
      
      // Parse 
      if($('#show_all_btn')[0].checked)
      {
        all_attr = all_attr + 'true" ';
      }else{
        all_attr = all_attr + 'false" ';
      }
      
      // insert closify ids
      $('input[type=checkbox]').each(function () {
           if (this.checked && this.className == "tags") {
               postTags = postTags + $(this).val() +","; 
           }
      });
      
      // remove last extra comma
      // remove last extra comma
      if(postTags != 'tags="'){
        postTags = postTags.substring(0, postTags.length - 1);
        postTags = postTags + '" ';
      }else{
        postTags = '';
      }

      
      // Parse the selected effect
      theme = theme + $( "#closify-effect option:selected" ).val();
      theme = theme + '" ';
      
      
      parent.insert_data(shortCodeOpen+postTags+theme+width+height+showCat+clicking+all_attr+']');
      parent.tinyMCE.activeEditor.windowManager.close(window);
    }
    
  </script>
</body>