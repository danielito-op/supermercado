<?php
	require "header.php";
?>
		<div class="container m-5 mx-auto">
			<div class="col-8 offset-2">
				<table class="table">        
					<tr> 
						<th>Producte</th> 
						<th>Categoria</th>
						<th>Preu</th>
						<th></th>
					</tr>
					<tr> 
						<?php

			
		 	require "config.php";

			$conn = new mysqli($servername, $username, $password, $dbname);
			

			if ($conn->connect_error) {
				die("ERROR al conectar con la BBDD");
			}
				
			if(!$_GET){
				$sql = "SELECT * FROM detall_productes";
			
			}
			else{
				$pillando = $_GET["cat"];
				$sql = "SELECT * FROM detall_productes WHERE codi_categoria = $pillando";
			}
			$result = $conn->query($sql);
			
			if ($result) {

				if ($result->num_rows > 0) {

				
						$row = $result->fetch_assoc();

					while ($row) {

					$nom = $row["nom"];
					$preu = $row["preu"];
					$codi = $row["codi"];
					$imatge = $row["imatge"];
					$codi_categoria = $row["codi_categoria"];
					
					if($codi_categoria == 1){
						$codi_categoria = "Arròs";
					}
					else if($codi_categoria == 2){
						$codi_categoria = "Begudes";
					}
					else if($codi_categoria == 3){
						$codi_categoria = "Drogueria";
					}
					else if($codi_categoria == 4){
						$codi_categoria = "Conserves";
					}
					else if($codi_categoria == 5){
						$codi_categoria = "Esmorzars";
					}
					else if($codi_categoria == 6){
						$codi_categoria = "Mascotes";
					}
					else if($codi_categoria == 7){
						$codi_categoria = "Lactis i ous";
					}
					else if($codi_categoria == 8){
						$codi_categoria = "Llegums";
					}
					else if($codi_categoria == 9){
						$codi_categoria = "Oli, vinagre i sal";
					}
					else if($codi_categoria == 10){
						$codi_categoria = "Pasta";
					}
					else if($codi_categoria == 11){
						$codi_categoria = "Salses i espècies";
					}
					else if($codi_categoria == 12){
						$codi_categoria = "Snacks i aperitius";
					}
					else{
						$codi_categoria = "Sopa i puré";
					}

					echo	"<td class=\"align-middle\">
							<img src=\"images/productes/no-image.png\" class=\"img-thumbnail mr-2\" style=\"height: 50px;\" />
							$nom
						</td>
						<td class=\"align-middle\">$codi_categoria</td>
						<td class=\"align-middle\">$preu €</td>
						<td class=\"align-middle\">
							<form class=\"form-inline\" action="?> <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> <?php echo "method=\"post\">
								<a href=\"form_producte.php?codi=$codi\" class=\"btn btn-primary\"><i class=\"fas fa-pencil-alt\"></i></a>
								<div class=\"form-group\">
									<input type=\"hidden\" name=\"codi\" value=\"$codi\" />
								</div>
								<button type=\"submit\" class=\"btn btn-primary\"><i class=\"fas fa-trash-alt\"></i></button>
							</form>
						</td> 
					</tr>";
				
					$row = $result->fetch_assoc();
				}
			}
		}
					?>
					</tr>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>
