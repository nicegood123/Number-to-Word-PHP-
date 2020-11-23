<?php require 'functions.php'; ?>
<html>

<head>
  <title>Lab Exam</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="content">
    <h3 class="title">Laboratory Examination</h3>

    <form method="POST">
      <h4 align="center">Numbers to Word Converter</h4>
      <span class="span-value">
        <label for="value">Enter a value: </label>
        <input type="text" name="value" class="value">
      </span>
      <label for="combobox" class="combobox">Select the process: </label><br>
      <select name="type" class="type">
        <option disabled selected> -- Select --</option>
        <option value="oddeven">Odd/Even</option>
        <option value="noinwords">Numbers in Words</option>
      </select>
      <input type="submit" name="submit" value="Submit" class="btn-submit">
    </form>

    <div class="output" <?php echo $status; ?>>
      <p class="result-numbers">Number: <?php getValue(); ?></p>
      <p class="in-words-label"><?php echo label(); ?></p>
      <p class="result-selected-process"><?php echo selectedProcess(); ?></p>

    </div>

  </div>
</body>

</html>