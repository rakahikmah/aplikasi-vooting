<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>program vooting sederhana</title>
</head>
<body>
<?php 
$host = "localhost";
$user ="root";
$pwd ="";
$db = "book";


//PENGUTAK-ATIK==RAKA HIKMAH
//SUMBER PEMBELAJARAN REFERENSI APLIKASI
// BUKU PINTAR PEMOGRAMAN PHP DODIT SUPRIATO




$conn = @mysql_connect($host,$user,$pwd) or die ("Gagal tersambubg ke database server");
mysql_select_db($db,$conn);
?>

<table border="0" style="border-collapse:collapse" bordercolor="#111111" width="100%" height="56">
	<tr>
		<td width="100%" height="26">
			<b><font face="verdana"> Sejauh mana anda mengenal PHP? </font></b>
		</td>
	</tr>
	<form action="vooting.php" method="post">
		<tr>
			<td width="100%" height="26">
				<table border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse" bordercolor="#78602c" width="100%">
					<tr>
						<td width="100%" bgcolor="#F9F4E8">
							<?php
							$qr =@mysql_query("SELECT kriteria,kriteriaid FROM vooting ORDER BY kriteria",$conn) or die
							("kriteria vooting salah !");

							while ($row = mysql_fetch_array($qr)) {
								echo "<input type=radio name=pilihan value=$row[kriteriaid]>&nbsp;&nbsp;&nbsp;<u>$row[kriteria]</u><br>";
							}

							?>
							&nbsp;
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<td width="100%" height="26">
			<input type="submit" name="submit" value="Vote">
		</td>
	</form>
	<tr>
		<td width="100%" height="61">
			<b> <font face="Verdana">Hasil Poling</font></b> <hr noshade color="#000000" size="1">
		</td>
	</tr>
	<tr>
		<td width="100%" height="26">
			<table border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse" width="100%" height="32" 
			bordercolor="#e8f1e0">

			<?php
			// field value bertambah 1 setiap kali vooting dilakukan sesuau dengan kriteria yang dipilih
			$qr=@mysql_query("UPDATE vooting SET value=value+1 WHERE kriteriaid='$_POST[pilihan]'",$conn) or die ("kriteria vooting salah");
			//perhitungan presentase dari total kriteria
			$qr =@mysql_query("SELECT SUM(value) AS TotalPersen FROM vooting",$conn) or die("query tidak bisa dilakukan
				karna ada kesalahan");
			$row = mysql_fetch_array($qr);
			$Total=$row["TotalPersen"];

			$qr=@mysql_query("SELECT MAX(value) AS NilaiMax FROM vooting",$conn) or die("query tidak bisa dilakukan karna adal kesalahan");
			$row = mysql_fetch_array($qr);
			$pengali=100/$row["NilaiMax"];

			// menampilkan data yang diurutkan berdasarkan kriteria 
			$qr =@mysql_query("SELECT kriteria,value FROM vooting ORDER BY kriteria",$conn) or die("query tidak bisa dilakukan karna ada kesalahan !");

			while ($row = mysql_fetch_array($qr)) {
				$Persen = round($row["value"]*$pengali,0);
				$ValPersen = round($row["value"]/$Total*100,2);
				echo "<tr><td width=25% height=22>$row[kriteria]</td> <td width=75% height=18>";
				echo "<table border=1 cellpadding=0 cellspacing=0 style='border-collapse:collapse' width=$Persen% height=18>";
				echo "<td><td width=100% bgcolor=#CCFF66 align=center>$ValPersen%</td>";
				echo "<tr></table></td></tr>";
			}

			?>

			</table>
		</td>
	</tr>
</table>


</body>
</html>
