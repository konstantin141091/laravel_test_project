let btns = document.querySelectorAll('.news-delete');
btns.forEach((btn) => {
  btn.addEventListener('click', (event) => {
    event.preventDefault();
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
          if (news) {
            alert('Новость удалена');
            news.remove();
          } else {
            alert('Новость удалена');
            window.location = 'http://laravel.local/admin/news';
          }
        } else {
          alert('что-то пошло не так');
        }
      }
    )();
  })
});

