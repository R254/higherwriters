<?php
include 'includes/dashboardHeader.php';

?>
<div class="content">
	<!-- This is where i will display account balances of the company. Paid to writers, clients deposits, earnings,   -->
	<div class="container-fluid">
		<h4>Dashboard</h4>
	<div class="row">
		<div class="col-md-4">
			<div class="d-box d-box-1">
				<div class="">
					<span>Earnings</span><br>
					<b>$ 50</b>
				</div>
				<div class="">
					Hello
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="d-box d-box-2">
				<div class="clearfix">
					<span>Client Deposits</span><br>
					<b>$ 50</b>
				</div>
				<div class="">
					Hello
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="d-box d-box-4">
				<div class="">
					<span>Complete Payments</span><br>
					<b>$ 50</b>
				</div>
				<div class="">
					Hello
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<div class="card card-d">
			  <div class="card-header">
			    Users' Statistics
			  </div>
			  <div class="card-body">
			    <iframe width="565.6212938005391" height="349.97037037037035" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSOuCvcCspraLukbk78zZmkPQCRwULlf-rpF41rOlP8fhKBY7s1pzXyL1IhZ8iEICJcZ4p1JM0TTXkA/pubchart?oid=1980768938&amp;format=interactive"></iframe>
			  </div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card card-d">
			  <div class="card-header">
			    Users' Activity
			  </div>
			  <div class="card-body">
			    <iframe width="565.6212938005391" height="349.97037037037035" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSOuCvcCspraLukbk78zZmkPQCRwULlf-rpF41rOlP8fhKBY7s1pzXyL1IhZ8iEICJcZ4p1JM0TTXkA/pubchart?oid=1980768938&amp;format=interactive"></iframe>
			  </div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">First</th>
		      <th scope="col">Last</th>
		      <th scope="col">Email</th>
		      <th scope="col">Specialization</th>
		      <th scope="col">Role</th>
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
		      <td><?php echo $row->proffession; ?></td>
		      <td><?php echo $row->role; ?></td>
		      <td>
		      	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#activate">Activate</button>
		      </td>
		      <td>
		      	<button type="button" class="btn btn-secondary">Edit</button>
		      </td>
		      <td>
		      	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
		      </td>
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