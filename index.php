<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Frequency Counter</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Word Frequency Counter</h1>
        <form action="process_word_counter.php" method="POST">
            <label for="inputText">Enter Text:</label>
            <textarea name="inputText" id="inputText" required></textarea>

            <label for="sortOrder">Sort Order:</label>
            <select name="sortOrder" id="sortOrder">
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
            </select>

            <label for="limit">Number of words to display:</label>
            <input type="number" name="limit" id="limit" min="1" required>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
