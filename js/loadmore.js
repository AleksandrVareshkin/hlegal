jQuery(function ($) {
    $('.js-loadmore').click(function () {
        $(this).text('Загружаю...'); // изменяем текст кнопки, вы также можете добавить прелоадер
        var data = {
            'action': 'loadmore',
            'query': true_posts,
            'page': current_page
        };
        $.ajax({
            url: ajaxurl, // обработчик
            data: data, // данные
            type: 'POST', // тип запроса
            success: function (data) {
                if (data) {
                    $('.js-loadmore').text('More publications').before(data); // вставляем новые посты
                    current_page++; // увеличиваем номер страницы на единицу
                    if (current_page == max_pages) $(".js-loadmore").remove(); // если последняя страница, удаляем кнопку
                } else {
                    $('.js-loadmore').remove(); // если мы дошли до последней страницы постов, скроем кнопку
                }
            }
        });
    });
});