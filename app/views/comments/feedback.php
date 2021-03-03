<?php require APPROOT . '/views/inc/head.php'; ?>

<div class="p-3 d-flex flex-column align-items-center">
    <h2 class="feedbackHead">KLIENTŲ ATSILIEPIMAI</h2>
    <article>
        <table class="table table-dark table-striped" id="commentTable">
            <thead>
                <tr>
                    <th scope="col" class="p-3">VARDAS</th>
                    <th scope="col" class="p-3">KOMENTARAS</th>
                    <th scope="col" class="p-3">DATA</th>
                </tr>
            </thead>
            <tbody id="commentRows"></tbody>
        </table>
    </article>
</div>


<?php if (!ifUserIsLoggedIn()) : ?>
    <section class="d-flex flex-column align-items-center mb-4">
        <div>
            <span class="feedbackRegister">Norite parašyti komentarą? <a class="" href="<?php echo URLROOT; ?>/users/register">Užsiregistruokite</a>!</span>
        </div>
    </section>
    <?php else : ?>
        <section class="d-flex flex-column align-items-center">
            <h4 class="feedbackHead">RAŠYTI KOMENTARĄ:</h4>
            <form id="feedbackFormCont" action='' method='post'>
                <div class="container">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="userName" id="userName" placeholder="Jūsų vardas.." value="<?php echo $data['username']->name . " " . $data['username']->lastname; ?>">
                        <small class="error-alert"></small>
                    </div>
                    <div class="mb-3">
                        <textarea type="text" class="form-control" name="commentBody" id="commentBody" placeholder="Jūsų komentaras.." rows="7"></textarea>
                        <small class="error-alert"></small>
                    </div>
                    <button type="submit" class="btn btn-dark mt-3" id="commentBtn">KOMENTUOTI</button>
                </div>
            </form>
        </section>
    <?php endif; ?>


    <script>
        const addCommentForm = document.getElementById('feedbackFormCont');
        const submitComment = document.getElementById('commentBtn');
        const tableBody = document.getElementById('commentRows')
        const commentBody = document.getElementById('commentBody');
        const usernameBody = document.getElementById('userName');

        <?php if (ifUserIsLoggedIn()) : ?>
            addCommentForm.addEventListener('submit', addComment);
        <?php endif; ?>

        fetchComments();

        function addComment(event) {
            event.preventDefault();
            clearErrors();
            const addCommentFormData = new FormData(addCommentForm);

            fetch('<?php echo URLROOT . '/comments/addComment/'; ?>', {
                    method: 'Post',
                    body: addCommentFormData
                }).then(resp => resp.json())
                .then(data => {
                    console.log(data);
                    if (data.success) {
                        successfulPost();
                    } else {
                        unsuccessfulPost(data.errors);
                    }
                }).catch(error => console.error(error));
        }

        function fetchComments() {
            fetch('<?php echo URLROOT . '/comments/getAllComments/'; ?>')
                .then(resp => resp.json())
                .then(data => {
                    showComments(data.comments);
                });
        }

        function createComment(item) {
            return `<td class="p-4">${item.author}</td>
                <td class="p-4">${item.comment_body}</td>
                <td class="p-4">${item.created_at}</td>`;
        }

        function showComments(commentsArr) {
            tableBody.innerHTML = "";
            commentsArr.forEach(function(comment) {
                tableBody.innerHTML += createComment(comment);
            });
        }

        function unsuccessfulPost(errors) {
            console.log(errors);
            if (errors.usernameErr) {
                usernameBody.classList.add('is-invalid');
                usernameBody.nextElementSibling.innerText = errors.usernameErr;
            }
            if (errors.commentBodyErr) {
                commentBody.classList.add('is-invalid');
                commentBody.nextElementSibling.innerText = errors.commentBodyErr;
            }
        }

        function successfulPost() {
            commentBody.value = '';
            usernameBody.nextElementSibling.innerText = '';
            commentBody.nextElementSibling.innerText = '';
            fetchComments();
        }

        function clearErrors() {
            const error = addCommentForm.querySelectorAll('.is-invalid');
            error.forEach(errorInput => errorInput.classList.remove('is-invalid'));
        }
    </script>

    <?php require APPROOT . '/views/inc/footer.php'; ?>