<?php
	require "header.php";
?>
		<div class="container m-5 mx-auto">
			<div class="row">
				<div class="col-2 offset-1">
					<div class="list-group">
						
						<a href="comprar.php?cat=1" class="list-group-item list-group-item-action">Arròs</a>
						<a href="comprar.php?cat=2" class="list-group-item list-group-item-action">Begudes</a>
						<a href="comprar.php?cat=3" class="list-group-item list-group-item-action">Drogueria</a>
						<a href="comprar.php?cat=4" class="list-group-item list-group-item-action">Conserves</a>
						<a href="comprar.php?cat=5" class="list-group-item list-group-item-action">Esmorzars</a>
						<a href="comprar.php?cat=6" class="list-group-item list-group-item-action">Mascotes</a>
						<a href="comprar.php?cat=7" class="list-group-item list-group-item-action">Lactis i ous</a>
						<a href="comprar.php?cat=8" class="list-group-item list-group-item-action">Llegums</a>
						<a href="comprar.php?cat=9" class="list-group-item list-group-item-action">Oli, vinagre i sal</a>
						<a href="comprar.php?cat=10" class="list-group-item list-group-item-action">Pasta</a>
						<a href="comprar.php?cat=11" class="list-group-item list-group-item-action">Salses i espècies</a>
						<a href="comprar.php?cat=12" class="list-group-item list-group-item-action">Snacks i aperitius</a>
						<a href="comprar.php?cat=13" class="list-group-item list-group-item-action">Sopa i puré</a>
				</div>
				</div>
				<?php

			
		 	$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "supermercat";

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

				echo "<div class=\"col-8\">
					<h3 class=\"text-white\">Els nostres productes</h3>
					<table class=\"table\">        
						<tr> 
							<th>Producte</th> 
							<th>Categoria</th>
							<th class=\"text-right\">Preu</th>
							<th></th>
						</tr>";
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

					echo	"<tr> 
							<td class=\"align-middle\">
								<img src=\"$imatge\" class=\"img-thumbnail mr-2\" style=\"height: 50px;\" />
								$nom
							</td>

							<td class=\"align-middle\">$codi_categoria</td>

							<td class=\"align-middle text-right\">$preu €</td>
							<td class=\"align-middle\">
								<form class=\"form-inline\" action=\"carrito.php\" method=\"post\">
									<div class=\"form-group\">
										<input type=\"hidden\" name=\"codi\" value=\"$codi\" />
										<input type=\"number\" class=\"form-control form-control-sm mr-2\" name=\"quantitat\" min=\"1\" value=\"1\" style=\"width: 50px;\" />
									</div>
									<button type=\"submit\" class=\"btn btn-primary\"><i class=\"fas fa-cart-plus\"></i></button>
								</form>
							</td> 
						</tr>";
					$row = $result->fetch_assoc();
					}
					
					echo "</table>";

				} else {
					echo "<p>No hay nah!</p>";
				}
			}

			$conn->close();
		?>
				</div>
			</div>
		</div>
	</body>
</html>
