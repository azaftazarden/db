<html>
	<head>
	<title>Chupa Mundo</title>
	</head>

	<body bgcolor="white">
		<?php
			echo "connecting to db...";
			$link = pg_connect("dbname=latpro");
			echo "done";

			//coloque aqui a consulta que voce quer fazer
			$result = pg_exec($link, "SELECT SUM(preco_manteiga) FROM manteiga WHERE id NOT IN (SELECT id FROM compra_manteiga)");
			$numrows = pg_numrows($result);
		?>

    <!--coloque aqui as tabelas esperadas na ordem-->
		<table border="1">
			<tr>
				<th>valor total de manteiga em estoque</th>
			</tr>

			<?php
				//aqui tambem, coloque todas as tabelinhas que voce espera
				for($ri = 0; $ri < $numrows; $ri++) {
					echo "<tr>\n";
					$row = pg_fetch_array($result, $ri);
					echo " <td>", $row["valor total de manteiga em estoque"], "</td>
					</tr>
					";
				}
				pg_close($link);
			?>
		</table>
	</body>
</html>
