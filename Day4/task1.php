 <?php
    $books = ["Clean Code", "The Pragmatic Programmer", "Design Patterns", "You Don’t Know JS", "Eloquent JavaScript"];
    ?>
 <div class="container mt-5">
     <h2 class="text-success mb-4">Book Titles</h2>
     <ul class="list-group">
         <?php foreach ($books as $book): ?>
             <li class="list-group-item"><?= $book ?></li>
         <?php endforeach; ?>
     </ul