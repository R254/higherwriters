<?php
include 'includes/dashboardHeader.php';


?>
 <div class="content">

 	<div class="container-fluid">
 		<h3>All Users</h3>
 		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">First</th>
		      <th scope="col">Last</th>
		      <th scope="col">Email</th>
		      <th scope="col">Role</th>
		      <th scope="col">Specialization</th>		  
		      <th scope="col">Description</th>
		      <th scope="col">Country</th>
		      
		      <th scope="col"></th>
		      <th scope="col">Actions</th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php while ($row = $q->fetch(PDO::FETCH_OBJ)): ?>
		    <tr>
		      <th><?php echo $row->user_id; ?></th>
		      <td><?php echo $row->f_name; ?></td>
		      <td><?php echo $row->l_name; ?></td>
		      <td><?php echo $row->email; ?></td>
		      <td><?php echo $row->role; ?></td>
		      <td><?php echo $row->proffession; ?></td>		      
		      <td><?php echo $row->description; ?></td>
		      <td><?php echo $row->country; ?></td>
		      <td><button type="button" class="btn btn-warning">Activate</button></td>
		      <td><button type="button" class="btn btn-secondary">Edit</button></td>
		      <td><a href="delete.php?id=<?php echo $row->user_id;?>" name="delete" class="btn btn-danger">Delete</a></td>
		    </tr>
		    <?php endwhile;?>
		  </tbody>
		</table>
 	</div>

 </div>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>