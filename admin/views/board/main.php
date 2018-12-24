<ul class="ul">
<li><a href="/admin/?page=create">new</a></li>
<li><a href="/admin/?page=create">delte</a></li>
<li><a href="/admin/?page=create">edit</a></li>
</ul>
<main class="main">
creating games

<form action="/admin/?page=board&action=create" method="POST" class="form">
    <textarea cols="80" rows="10" placeholder="вноситe текст" name="sentences"></textarea>
    <input type="submit" value="генерировать задания" name="taskBtn">
</form>
</main>