<?php
	require "header.php";
?>
		<div class="container m-5 mx-auto text-white">
			<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
				<div class="row">
					<div class="col-4 offset-2">
						<div class="form-group">
							<label for="username">Nom d'usuari (obligatori):</label>
							<input type="text" class="form-control" name="username" id="username" />
						</div>
						<div class="form-group">
							<label for="pass">Contrasenya (obligatori):</label>
							<input type="password" class="form-control" name="pass" id="pass" />
						</div>
						<div class="form-group">
							<label for="rp_pass">Repeteix la contrasenya (obligatori):</label>
							<input type="password" class="form-control" name="rp_pass" id="rp_pass" />
						</div>
						<div class="form-group">
							<label for="nombre">Nom (obligatori):</label>
							<input type="text" class="form-control" name="nombre" id="nombre" />
						</div>
						<div class="form-group">
							<label for="apellidos">Cognoms (obligatori):</label>
							<input type="text" class="form-control" name="apellidos" id="apellidos" />
						</div>
						<div class="form-group">
							<label for="nif">NIF (obligatori):</label>
							<input type="text" class="form-control" name="nif" id="nif" />
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="direccion">Adreça (obligatori):</label>
							<input type="text" class="form-control" name="direccion" id="direccion" />
						</div>
						<div class="form-group">
							<label for="codigo_postal">Codi postal (obligatori):</label>
							<input type="text" class="form-control" name="codigo_postal" id="codigo_postal" />
						</div>
					
<?php

require "config.php";
						$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("ERROR al connectar con la base de datos");
		}

		$sql = "SELECT id_poblacio, nom FROM poblacions ORDER BY nom";

					$result = $conn->query($sql);

		if ($result) {



					echo	"<div class=\"form-group\">
							<label for=\"poblacion\">Població (obligatori):</label>
							<select class=\"form-control\" name=\"poblacion\" id=\"poblacion\">
								<option value=\"\">Selecciona una opció</option>";

								$row = $result->fetch_assoc();
								while($row) {

					$opcio = $row["id_poblacio"];
					$poblacio = $row["nom"];
						echo		"<option value=\"$opcio\">$poblacio</option>";
							
						$row = $result->fetch_assoc();
				}
				echo "</select>
						</div>";
			}

						?>
						<div class="form-group">
							<label for="telefono">Telèfon:</label>
							<input type="text" class="form-control" name="telefono" id="telefono" />
						</div>
						<div class="form-group">
							<label for="codigo_postal">Email:</label>
							<input type="text" class="form-control" name="mail" id="mail" />
						</div>
						<div class="form-group text-right">
							<button type="submit" class="btn btn-default">Enviar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
