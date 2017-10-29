var raw = function () {

    return {

        //main function to initiate the module
        init: function () {
          
            var nEditing = null;

            $('#acquire').click(function (e) {
                e.preventDefault();
                window.location = 'acquire.php'
            });
        }

    };

}();