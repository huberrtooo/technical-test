jQuery(document).ready(function ($) {
    console.log('work!');

    let booksData = '';
    function handleButtonClick() {

        if (booksData) {

            console.log('Books data:', booksData);

        } else {

            $.ajax({
                url: ajax_object.ajax_url,
                type: 'GET',
                data: {
                    action: 'get_books',
                },
                success: function (response) {
                    booksData = response;
                    console.log('Books data:', booksData);
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });

        }
    }

    $('.ajax-task').on('click', handleButtonClick);
});
