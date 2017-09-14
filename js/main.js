function loadTab(tabName) {
    $.get('/api/tab.php', {'tab': tabName}, function (tab) {
        $('#tab-container').html(tab);
    });
}

$(function() {
   $('[tab]').each(function() {
       $(this).on('click', function() {
           loadTab($(this).attr('tab'))
       })
   });
});

$(document).on('submit', '#average', function(e) {
    e.preventDefault();

    $.get($(this).attr('action'), $(this).serialize(), function(data) {
        $('#result').html(data);
    });
})