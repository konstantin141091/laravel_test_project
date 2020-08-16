let btns = document.querySelectorAll('.news-delete');
btns.forEach((btn) => {
  btn.addEventListener('click', (event) => {

    let win = document.getElementById('win1');

    let news_id = btn.getAttribute('data-news-id');

    (
      async () => {
        const response = await fetch('/api/admin/news', {
          method: 'delete',
          headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            id: news_id
          })
        });
        const answer = await response.json();
        if (answer.status === 'good') {
          let news = document.getElementById(news_id);
          let message = document.getElementById('win1_text');
          let close = document.getElementById('win1_close');
          if (news) {
            message.textContent = "Новость успешно удалена";
            close.classList.remove('no-visible');
            news.remove();
          } else {
            alert('Новость удалена');
            window.location = 'http://laravel.local/admin/news';
          }
        } else {
          message.textContent = "Не удалось удалить новость";
          close.classList.remove('no-visible');
        }
      }
    )();
  })
});

