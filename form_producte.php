<?php
	require "header.php";
?>
		<div class="container m-5 mx-auto text-white">
			<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-4 offset-2">
						<div class="form-group">
							<label for="codi">Codi:</label>
							<input type="text" class="form-control" name="codi" id="codi" />
						</div>
						<div class="form-group">
							<label for="nom">Nom:</label>
							<input type="text" class="form-control" name="nom" id="nom" />
						</div>
						<div class="form-group">
							<label for="categoria">Categoria:</label>
							<select class="form-control" name="categoria" id="categoria">
								<option value="">Selecciona una opció</option>
								
								<?php
								require "config.php";
								$conn = new mysqli($servername, $username, $password, $dbname);
		
								if ($conn->connect_error) {
								die("ERROR al conectar con la BBDD");
								}

								$sql = "SELECT id_categoria, nom FROM categories ORDER BY nom";

								$result = $conn->query($sql);
			
								if ($result) {

								if ($result->num_rows > 0) {

								$row = $result->fetch_assoc();
								while ($row) {

								$nom = $row["nom"];
								$codi_categoria = $row["codi_categoria"];
							
								echo "<option value=\"$codi_categoria\">$nom</option>";
								$row = $result->fetch_assoc();
							}	}
						}
						$conn->close();
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="preu">Preu:</label>
							<input type="number" class="form-control" name="preu" id="preu" />
						</div>
						<div class="form-group">
							<label for="stock">Unitats en stock:</label>
							<input type="number" class="form-control" name="stock" id="stock" />
						</div>
						<div class="form-group text-right">
							<a href="productes.php" class="btn btn-outline-secondary mx-2">Tornar</a>
							<button type="submit" class="btn btn-default">Guardar</button>
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="imatge">Imatge:</label>
							<input type="file" class="form-control" name="imatge" id="imatge" />
						</div>
						<div class="text-center">
							<img src="images/productes/no-image.png" class="img-thumbnail" style="height: 250px;" />
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
