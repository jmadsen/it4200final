    <form action="?deleteimage" method="post" id="delete">                   
        <input type="hidden" name="id" id="id" value="">                              
        <input type="submit" value="Delete" style="position: fixed; left: -1000px;">                    
    </form>
   
   <?php
      #complete serverpath must be given like
      #example "/apache/htdocs/myfile.pdf" ( not "http:xyz.com/myfile.pdf" )
   
      $DelFilePath = $setup["/CS4000/phpgallery/images/$id"] . $fileName;
   
      # delete file if exists
      if (file_exists($DelFilePath)) { unlink ($DelFilePath); }
  ?>