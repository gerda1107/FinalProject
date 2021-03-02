<?php require APPROOT . '/views/inc/head.php';
print_r($_POST);
print_r($data);
?>

<h2>ATSILIEPIMAI</h2>
<section>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">VARTOTOJO VARDAS</th>
                <th scope="col">KOMENTARAS</th>
                <th scope="col">KOMENTARO DATA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
        </tbody>
    </table>
</section>

<?php if (!ifUserIsLoggedIn()) : ?>
    <div>
        <span>Norite parašyti komentarą? <a class="" href="<?php echo URLROOT; ?>/users/register">Užsiregistruokite</a>!</span>
    </div>
<?php else : ?>
    <h4>Rašyti komentarą:</h4>
    <section class="d-flex justify-content-center align-items-center">
        <form id="feedbackFormCont" action='' method='post'>
            <div class="container">
                <div class="mb-3">
                    <input type="text" class="form-control" name="userName" id="userName" placeholder="Jūsų vardas.." value="<?php echo $data['username']->name . " " . $data['username']->lastname; ?>">
                </div>
                <div class="mb-3">
                    <textarea type="text" class="form-control" name="commentBody" id="commentBody" placeholder="Jūsų komentaras.." rows="7"></textarea>
                </div>
                <button type="submit" class="btn btn-dark mt-3" id="commentBtn">KOMENTUOTI</button>
            </div>
        </form>
    </section>

    <script>
        const addCommentForm = document.getElementById('feedbackFormCont');
        const submitComment = document.getElementById('commentBtn');

        addCommentForm.addEventListener('submit', addComment);

        function addComment(event) {
            event.preventDefault();
            console.log('add Comment pls');
        }
    </script>
<?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>