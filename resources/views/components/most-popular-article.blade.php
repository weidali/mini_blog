<div class="mt-4">
    <div class="row pt-2">
      <div class="col-12">
        <p class="fs-4 border-bottom mb-4">Самые популярные статьи</p>
      </div>
    </div>
    <div class="row my-2" id="popularArticles" style="display: none;"></div>
</div>

<script>
  function formatDate(dateString) {
    const myDate = new Date(dateString);

    if (isNaN(myDate)) {
        return 'Некорректная дата';
    }

    return myDate.toLocaleString('ru-RU', {
        year: 'numeric',
        month: 'long',
        day: 'numeric', 
    });
}

  document.addEventListener("DOMContentLoaded", async function () {
      try {
        const response = await $.ajax({
            url: '/api/articles/most-popular',
            type: 'GET'
        });

      const popularArticlesContainer = document.getElementById('popularArticles');

        if (response.length > 0) {
          response.forEach((article, index) => {
            const articleElement = `
            <div class="col-md-6 d-flex align-items-stretch">
              <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <p class="mb-0">${article.title}</p>
                  <div class="row">
                    <div class="col-md my-3">
                        <svg height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/></svg>
                        <span id="js-view-count" class="view-count px-2">${article.views}</span>
                    </div>
                    <div class="col-md my-3">
                        ♥ <span class="like-count js-like-count px-2">${article.likes}</span>
                    </div>
                    <div class="col-md my-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-quote" viewBox="0 0 16 16"><path d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105"/><path d="M7.066 6.76A1.665 1.665 0 0 0 4 7.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 0 0 .6.58c1.486-1.54 1.293-3.214.682-4.112zm4 0A1.665 1.665 0 0 0 8 7.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 0 0 .6.58c1.486-1.54 1.293-3.214.682-4.112z"/></svg>
                      <span class="like-count js-like-count px-2">${article.comments_count}</span>
                    </div>
                    </div>
                  <div>
                  <a href="/articles/${article.slug}" class="stretched-link"></a>
                </div>
                <div class="text-body-secondary">
                  <p class="card-text"><small class="text-body-secondary">Опубликовано ${formatDate(article.published_at)}</small></p>
                </div>
              </div>
            </div>
            `;

            // popularArticlesContainer.append(articleElement);
            popularArticlesContainer.insertAdjacentHTML('beforeend', articleElement);
          });
          // popularArticlesContainer.show();
          popularArticlesContainer.style.display = 'inline-flex';

        } else {
            console.error('Недостаточно данных для отображения популярных статей.');
        }
      } catch (error) {
          console.error('Ошибка при загрузке данных:', error);
      }
  });
</script>


