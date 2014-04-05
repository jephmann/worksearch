$('.delete').click(function (){
    var answer = confirm("Are you sure that you would like to delete this Prospect?");
    if (answer) {
        return true;
    }
    else
    {
        return false;
    }
});