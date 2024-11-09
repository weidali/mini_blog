<div id="comment-form">
	<form id="commentForm" data-article-id="{{ $article->id }}">
		<div class="mb-3">
			<label class="form-label font-weight-bold">Оставить комментарий</label>
			<input placeholder="Тема сообщения" type="text" class="form-control" id="subject" name="subject" required>
		</div>
		<div class="mb-3">
			<textarea placeholder="Текст сообщения" class="form-control" id="body" name="body" rows="4" type="text" required></textarea>
		</div>
		<button type="submit" class="btn btn-secondary mb-3">Отправить</button>
	</form>
</div>

<div id="success-message" style="display: none;" class="alert alert-secondary" role="alert">
	Ваше сообщение успешно отправлено
  </div>

<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function () {
	$('#commentForm').on('submit', function (e) {
        e.preventDefault();
		const articleId = {{ $article->id }};
		const url = `/api/articles/${articleId}/comments`;

		let formData = {
            subject: $('#subject').val(),
            body: $('#body').val(),
            article_id: articleId
        };

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function (response) {
                $('#comment-form').hide();
                $('#success-message').show();
            },
            error: function (xhr, status, error) {
                alert('Ошибка при отправке комментария: ' + error);
            }
        });
    });
});
</script>
