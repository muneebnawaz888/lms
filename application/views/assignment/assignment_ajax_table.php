<table id="mytable" class="table table-striped">
  <thead>
    <tr>
      <th>Assingemnt Name</th>
      <th>Assingemnt Duration</th>
      <th>Assingemnt Marks</th>
      <th>Assingemnt Description</th>
      <th>Assingemnt Status</th>
      <?php if(in_array('updateAssingemnt', $user_permission) || in_array('deleteAssingemnt', $user_permission)): ?>
      <th>Action</th>
      <?php endif; ?>
    </tr>
  </thead>
  <tbody  >
    
    
  </tbody>
  
</table>