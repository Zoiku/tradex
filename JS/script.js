$(window).on('load', () => {
    // To improve user experience while data is fetched from the API a loading screen animation displayed while page loads
    $('.loading-page').hide();
    $('.loaded-page').css('display', 'block');

    // The confirm dialog allows for users to make their confirmation as they click on the stock to add or delete. If yes, the program proceeds. If no it does not.
    $('.delete-stock').click(() => {
        if(confirm("Do you want to delete stock?")){
            return true;
        } else {
            return false;
        }
    })

    $('.deleteAll').click(() => {
        if(confirm("Are you sure you want to delete all stocks? Process is irreversible")){
            return true;
        } else {
            return false;
        }
    })
});

