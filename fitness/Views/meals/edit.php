<form method="post" action="?action=save">
 <?php include __DIR__ . '/../shared/_Errors.php'; ?>
<table class="table">
    <tr>
       <td><input type="text" name="Name" class="form-control" placeholder="Name" value="<?=$model['Name']?>" /></td>
       <td><input type="text" name="Time" class="form-control" placeholder="Time" value="<?=$model['Time']?>" /></td>
       <td><input type="text" name="Callories" class="form-control" placeholder="Callories" value="<?=$model['Callories']?>" /></td>
       <td>
         <input type="submit" value="Submit" class="btn btn-primary"/>
         <input type="hidden" name="id" value="<?=$model['id']?>" /> 
       </td>
    </tr>
</table>
</form>   
