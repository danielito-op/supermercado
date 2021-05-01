<?php
	require "header.php";
	require "config.php";
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
								$codi_categoria = $row["id_categoria"];
							
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
							<img src="images/productes/no-image.png" class="img-thumbnail" style="height: 250px" />
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
<?php
$conn = new mysqli($servername, $username, $password, $dbname);
		
								if ($conn->connect_error) {
								die("ERROR al conectar con la BBDD");
								}
								
		

if (!empty($_POST)) {

$uploadOk = 1;

		$codi = $_POST["codi"];
		$categoria = $_POST["categoria"];
		$nom = $_POST["nom"];
		$preu = $_POST["preu"];
		$unitats_stock = $_POST["stock"];

			$nom_producte = $_FILES["imatge"]["name"];
            $rutaTmp = $_FILES["imatge"]["tmp_name"];
            $tamanyo = $_FILES["imatge"]["size"];
            $tipo = $_FILES["imatge"]["type"];
            $Extensio = substr($nom_producte, strpos($nom_producte, "."));


				$Any = date("Y");
				$Mes = date("m");
				$Dia = date("d");
				$NumAleatori = mt_rand(10000,99999);
				$rutaDestino = "images/productes/".$Any.$Mes.$Dia.$NumAleatori.$Extensio;

	if($Extensio != ".jpg" && $Extensio != ".png" && $Extensio != ".pdf" && $Extensio != ".rar" && $Extensio != ".zip") {
    echo "No tan deprisa despistao, solamente puedes subir archivos de tipo jpg, png, pdf, rar o zip no me seas guarro i usa un convertidor o algo.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "No se ha subido nada, date por avisado.";
} else {

  if (move_uploaded_file($rutaTmp, $rutaDestino)) {
                
        $resultat = "INSERT INTO productes (codi, categoria, nom, preu, unitats_stock, imatge) VALUES ('$codi', '$categoria', '$nom', '$preu', '$unitats_stock', '$rutaDestino')";

			echo $resultat;
     }
 }


		

		$result = mysqli_query($conn, $resultat);

		if (!$result) {
			echo "ERROR al insertar los datos";
		} else {
			echo "Datos insertados correctamente";
		}

		$conn->close();
	}
?>
