$(function() {
    applyPagination();
    function applyPagination() {
        $("#ajax_pagingsearc a").click(function() {
            var url = $(this).attr("href");
            $.ajax({
                type: "POST",
                data: "ajax=1",
                url: url,
                success: function(msg) {
                    $("#ajaxdata").html(msg);
                    applyPagination();
                }
            });
            return false;
        });
    }
});
