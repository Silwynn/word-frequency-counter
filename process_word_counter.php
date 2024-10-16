<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Frequency Results</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Word Frequency Results</h1>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $inputText = strtolower(trim($_POST['inputText']));
            $sortOrder = $_POST['sortOrder'];
            $limit = (int)$_POST['limit'];

            $stopWords = array(
                'the', 'and', 'in', 'of', 'to', 'a', 'is', 'that', 'it', 'on', 'with', 'as', 'for', 'was', 'by', 'are'
            );

            function tokenizeText($text) {
                $text = preg_replace('/[^\w\s]/', '', $text);
                return explode(' ', $text);
            }

            function calculateWordFrequencies($words, $stopWords) {
                $wordFreq = array();
                foreach ($words as $word) {
                    $word = trim($word);
                    if ($word != "" && !in_array($word, $stopWords)) {
                        if (array_key_exists($word, $wordFreq)) {
                            $wordFreq[$word]++;
                        } else {
                            $wordFreq[$word] = 1;
                        }
                    }
                }
                return $wordFreq;
            }

            function sortWordFrequencies($wordFreq, $sortOrder) {
                if ($sortOrder == 'asc') {
                    asort($wordFreq);
                } else {
                    arsort($wordFreq);
                }
                return $wordFreq;
            }

            $words = tokenizeText($inputText);
            $wordFrequencies = calculateWordFrequencies($words, $stopWords);
            $sortedWordFrequencies = sortWordFrequencies($wordFrequencies, $sortOrder);
            $displayedWordFrequencies = array_slice($sortedWordFrequencies, 0, $limit);

            if (!empty($displayedWordFrequencies)) {
                echo "<table><tr><th>Word</th><th>Frequency</th></tr>";
                foreach ($displayedWordFrequencies as $word => $frequency) {
                    echo "<tr><td>$word</td><td>$frequency</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No words found in the input text.</p>";
            }
        } else {
            echo "<p>Error: No input text provided.</p>";
        }
        ?>

        <a href="index.php" class="back-link">Back to Word Counter</a>
    </div>
</body>
</html>
