<?php
  function complementDNA($dna) {
    $complement = "";
    $length = strlen($dna);

    for ($i = 0; $i < $length; $i++) {
      $base = substr($dna, $i, 1);

      switch ($base) {
        case 'A':
          $complement .= 'T';
          break;
        case 'T':
          $complement .= 'A';
          break;
        case 'C':
          $complement .= 'G';
          break;
        case 'G':
          $complement .= 'C';
          break;
        default:
          // If an unknown base is encountered, return an empty string.
          return "";
      }
    }

    return $complement;
  }

  // Check if the form was submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dna = $_POST["dna"];
    $complement = complementDNA($dna);
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Complementary DNA Sequence</title>
  </head>
  <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Enter a DNA sequence:
      <input type="text" name="dna">
      <input type="submit" value="Submit">
    </form>

    <?php if (isset($complement)): ?>
      <p>The complement of <?php echo htmlspecialchars($dna); ?> is <?php echo htmlspecialchars($complement); ?></p>
    <?php endif; ?>
  </body>
</html>