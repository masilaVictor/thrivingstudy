			$getuser = get_user($conn);
				$i = 0;
				foreach($getuser as $key => $row2):
					if($i>5)
						break;
					$i++;
					?>
					<table>
						<tr>
							<th>User ID</th>
							<th>Username</th>
							<th>Country</th>
							<th>City</th>
							<th>Phone</th>
							<th>Education</th>
							<th>ID Card</th>
							<th>Status</th>
						</tr>
					</table>


			

				<?php endforeach; }?>