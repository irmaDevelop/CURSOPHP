<html>
    <head>
        <title>Add Project</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
        crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h2>Add Project</h2>
        <form action="/projects/add" method="post">
            <label for="">Title</label>
            <input type="text" name="title"><br>
            <label for="">Description</label>
            <input type="text" name="description"><br>
            <button type="submit">Save</button>
        </form>
    </body>
</html>