<?php
    if(isset($_POST['importfile'])){
        // read json file
        $data = file_get_contents($_FILES['importfile']['tmp_name']);
        $_SESSION['data'] = $data;
     }
?>
<!DOCTYPE html>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="importfile" id="inportfile" onchange="this.form.submit()" accept="application/json" style="display:none"/> 
        <button id="import">Import</button>
        <script>
        $('#import').click(function(){ $('#inportfile').trigger('click'); });
        </script>
    </form>
    <script src="index.js" />
</body>