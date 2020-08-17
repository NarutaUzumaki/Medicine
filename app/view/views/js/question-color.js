$('.question').each((index, element) => {
    console.log(element);
    $(element).on('click', () => {
        $(element).toggleClass('color');
    });
});